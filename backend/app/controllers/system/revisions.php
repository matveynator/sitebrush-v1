<?php
/*
   The group is system;
 */
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup))and(AmIInGroup($SuperUserGroup->getId()))) {
	/*
	   Ok you are in superuser group:  
	 */

	/*
	   Request to view page revisions: /page/$url_path[2]/?revisions
	 */
	$Pages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->orderByVersion('desc')->find();
	$CurrentPage = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
	$smarty->assign('Action', 'WikiRevisions');
	$smarty->assign('PageName', basename($_SESSION['REQUEST_URI']));
	$smarty->assign('PrePageUri', $_SESSION['REQUEST_URI']);
	$smarty->assign('PrePrePageUri', dirname($_SESSION['REQUEST_URI']));
	if ($CurrentPage) {
		$smarty->assign('CurrentVersion', $CurrentPage->getVersion());
		$smarty->assign('PageVersion', $CurrentPage->getVersion());
	}
	foreach ($Pages as $Page) {
		if ($Page->getTitle() == "") {
			$Title = 'Страница без названия.';
		} else {
			$Title = $Page->getTitle();
		}
		$Authors = $Page->getUsers();
		$PageAuthors='';
		foreach ($Authors as $Author) {
			$PageAuthors .= "{$Author->getEmail()} ";
		}

		/*
		   If deleted - show name of user who deleted your page:
		 */
		if (($Page->getDeleterId() != "") and ($Page->getStatus() == "Deleted")) {
			$Terminator = UserQuery::create()->findPk($Page->getDeleterId());
			$Revisions[] = array(
					'Id'      => $Page->getId(),
					'Version' => $Page->getVersion(),
					'Date'    => date('d-m-Y H:i:s',
						$Page->getDate()),
					'Title'      => $Title,
					'Authors'    => $PageAuthors,
					'Status'     => $Page->getStatus(),
					'Terminator' => $Terminator->getEmail(),
					'RequestUri' => $Page->getRequestUri(),
					);
		} else {
			$Revisions[] = array(
					'Id'      => $Page->getId(),
					'Version' => $Page->getVersion(),
					'Date'    => date('d-m-Y H:i:s',
						$Page->getDate()),
					'Title'      => $Title,
					'Authors'    => $PageAuthors,
					'Status'     => $Page->getStatus(),
					'RequestUri' => $Page->getRequestUri(),
					);
		}
	}
	if (isset($Revisions)) {
		$smarty->assign('Revisions', $Revisions);
	}
	header('HTTP/1.0 404 Not Found');
	$smarty->assign('Title', 'Список изменений страницы:');
	$smarty->display("SiteBrushHead.tpl.html");
	$smarty->display("Revisions.tpl.html");
	$smarty->display('SiteBrushMenu.tpl.html');
} else {
	$_SESSION['system_message'] = "Доступ запрещен.";
	PrintSystemMessage('ok', '/');
}

?>
