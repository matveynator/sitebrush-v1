<?php

$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

	$Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($configuration['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
	$RevisionsAmmount = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($configuration['REQUEST_URI'])->filterByDomain($configuration['domain'])->count();
	if($RevisionsAmmount) {
		$smarty->assign('RevisionsAmmount', $RevisionsAmmount);
	}
//OШИБКА!!- пожирает всю память! надо сделать запрос поконкретнее чтобы все целиком не дергало

/*
 if ($configuration['REQUEST_URI']==='/') {
$ThreadPages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri("/%")->filterByDomain($configuration['domain'])->filterByStatus("Active")->find();
	} else {
		$ThreadPages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri("{$configuration['REQUEST_URI']}/%")->filterByDomain($configuration['domain'])->filterByStatus("Active")->find();
	}
*/
	if (count($ThreadPages) > 0) {
		foreach ($ThreadPages as $ThreadPage) {
			$RequestUri = $ThreadPage->getRequestUri();
			$UriList[$RequestUri] = $RequestUri;
		}
		$SubAmmount = count(array_unique($UriList));
	} else {
		$SubAmmount = 0;
	}
	$smarty->assign('Action', 'Wiki');
	$smarty->assign('RequestUri', $configuration['REQUEST_URI']);
	$smarty->assign('NewUniqSubUri', NewUniqSubUri());
	$smarty->assign('SubUriAmmount', $SubAmmount);
	if ($Page) {
		$smarty->assign('PageExists', TRUE);
		$smarty->assign('Title', $Page->getTitle());
		$smarty->assign('Tags', $Page->getTags());
		$smarty->assign('PageVersion', $Page->getVersion());

		$smarty->assign('PageId', $Page->getId());
	} else {
		$Revisions = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($configuration['REQUEST_URI'])->filterByDomain($configuration['domain'])->find();
		if ((count($Revisions)) > 0) {
			$smarty->assign('DeletedRevisions', count($Revisions));
		}
		$smarty->assign('PageExists', FALSE);
	}
	$smarty->assign('PrePageUri', dirname($configuration['REQUEST_URI']));
	if ($Page) {
		$smarty->display("Head.tpl.html");
		echo "<body>";
                $smarty->display('SiteBrushMenu.tpl.html');
		echo $Page->getText();
		echo "</body></html>";
		exit();
	} else {
		$Uri = UriQuery::create()->filterByOldUri($configuration['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByDate('desc')->findOne();
		if ($Uri) {
			$NewUri = $Uri->getNewUri();
			$smarty->assign('Title', '301: Перенаправление.');
			header('HTTP/1.0 404 Not Found');
			$smarty->display("SiteBrushHead.tpl.html");
			echo "<div class='alert alert-block'><h4 class='alert-heading'>Внимание: по данному адресу осуществляется перенаправление на <a href=\"{$NewUri}\">$NewUri</a>.</h4> Вы можете <a href='?edit'>создать новую страницу</a> и разорвать это перенаправление.</div>";
			$smarty->display('SiteBrushMenu.tpl.html');
			exit();
		} else {
			$User = UserQuery::create()->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
			if (!$User) {
				$_SESSION['system_message'] = 'У сайта пока что нету администратора. Пожалуйста создайте учетную запись администратора.';
				PrintSystemMessage('создать учетную запись', '/?join');
			} else {
				$smarty->assign('Title', $dic['404_error_small_d']);
				$smarty->assign('RequestUri', $configuration['REQUEST_URI']);
				header('HTTP/1.0 404 Not Found');
				$smarty->display("SiteBrushHead.tpl.html");
				$smarty->display("404.tpl.html");
				$smarty->display('SiteBrushMenu.tpl.html');
			}
		}
	}
} else {
	$Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($configuration['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
	$smarty->assign('Action', 'Wiki');
	if ($Page) {
		$smarty->assign('PageExists', TRUE);
		$smarty->assign('Title', $Page->getTitle());
		$smarty->assign('Tags', $Page->getTags());
		$smarty->assign('PageVersion', $Page->getVersion());
		$smarty->assign('PageId', $Page->getId());
		$Authors = $Page->getUsers();
		$PageAuthors = '';
		foreach ($Authors as $Author) {
			$PageAuthors .= "{$Author->getNickName()}({$Author->getFirstName()} {$Author->getLastName()}), ";
		}
		$smarty->assign('Author', $PageAuthors);
	} else {
		$smarty->assign('PageExists', FALSE);
	}
	$smarty->assign('PrePageUri', dirname($configuration['REQUEST_URI']));
	if (!$Page) {

		/*
		   If page was moved - redirect to new page:
		 */
		$Uri = UriQuery::create()->filterByOldUri($configuration['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByDate('desc')->findOne();
		if ($Uri) {
			Jump($Uri->getNewUri());
		} else {
			$User = UserQuery::create()->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
			if (!$User) {
				$_SESSION['system_message'] = 'У сайта пока что нету администратора. Пожалуйста создайте учетную запись администратора.';
				PrintSystemMessage('создать учетную запись', '/?join');
			} else {
				$smarty->assign('Title', $dic['404_error_small_d']);
				$smarty->assign('RequestUri', $configuration['REQUEST_URI']);
				header('HTTP/1.0 404 Not Found');
				$smarty->display("SiteBrushHead.tpl.html");
				$smarty->display("404.tpl.html");
				$smarty->display('SiteBrushMenu.tpl.html');
			}
		}
	} else {
		$smarty->display("Head.tpl.html");
		"<body>";
		$smarty->display('SiteBrushMenu.tpl.html');
		echo $Page->getText();
		//$smarty->display('SiteBrushMenu.tpl.html');
		echo "</body></html>";
	}
}

?>
