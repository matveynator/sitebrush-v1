<?php
/*
   The group is system;
 */
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

	/*
	   Ok you are in superuser group:  
	   Request to change page name, tags and title: /?properties
Rename: page, title or tags request:
	 */
	if ((isset($_POST['RenameId'])) and (is_numeric($_POST['RenameId']))) {
		$Purifier = new HTMLPurifier($configuration['HTMLPurifier_Config']);
		$Security = new Brain_Security();
		$Security->VerifyTitle($_POST['Title']);
		$Security->VerifyTags($_POST['Tags']);
		if(isset($_POST['uri'])){
			$Security->VerifyPageName($_POST['uri']);
		}
		$Page = PostQuery::create()->findPk($_POST['RenameId']);
		if ($Page) {
			if ((isset($_POST['uri'])) and ($_POST['uri'] != "")) {
				$OldUri = $Page->getRequestUri();
				if ((dirname($OldUri))!='/') {
					$NewUri = dirname($OldUri) . "/" . $_POST['uri'];
				} else {
					$NewUri = "/" . $_POST['uri'];
				}
				if (($OldUri != $NewUri) and ($OldUri != '/')) {

					/*
					   Check if new uri allready exist:
					 */
					if (PostQuery::create()->filterByType('Wiki')->filterByRequestUri($NewUri)->filterByDomain($configuration['domain'])->findOne()) {
						$_SESSION['system_message'] = "Target exists, please copy and paste manually.";
						$_SESSION['system_message_navigation'] = "back";
						PrintSystemMessage();
					}

					$Moved = TRUE;

					/*
					   Move all page revisions:
					 */
					$SubRevisions = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($OldUri)->filterByDomain($configuration['domain'])->find();
					foreach ($SubRevisions as $SubRevision) {
						$SubRevision->setRequestUri($NewUri);
						$SubRevision->Save();
					}

					/*
					   Create redirect if needed:
					 */
					$Redirect = UriQuery::create()->filterByOldUri($OldUri)->filterByNewUri($NewUri)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
					if (!$Redirect) {
						$Uri = new Uri();
						$Uri->setOldUri($OldUri);
						$Uri->setNewUri($NewUri);
						$Uri->setDate(time());
						$Uri->setStatus('Active');
						$Uri->setDomain($configuration['domain']);
						$Uri->Save();
						UpdateCache($NewUri);
					}
					unset($Redirect);

					/*
					   Get all sub uri pages:
					 */
					$SubPages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri("{$OldUri}/%")->filterByDomain($configuration['domain'])->find();
					foreach ($SubPages as $SubPage) {

						/*
						   Get all sub request uris and update them with higher level uri that we changed.
						 */
						$FullOldUri = $SubPage->getRequestUri();
						$FullNewUri = $NewUri . substr($FullOldUri, strlen($OldUri));
						$SubPage->setRequestUri($NewUri . substr($SubPage->getRequestUri(), strlen($OldUri)));
						$SubPage->Save();
						UpdateCache($NewUri . substr($SubPage->getRequestUri(), strlen($OldUri)));

						/*
						   Create redirect if needed:
						 */
						$Redirect = UriQuery::create()->filterByOldUri($FullOldUri)->filterByNewUri($FullNewUri)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
						if (!$Redirect) {
							$Uri = new Uri();
							$Uri->setOldUri($FullOldUri);
							$Uri->setNewUri($FullNewUri);
							$Uri->setDate(time());
							$Uri->setStatus('Active');
							$Uri->setDomain($configuration['domain']);
							$Uri->Save();
						}
						unset($Redirect);
					}
				} else {
					$Moved = FALSE;
				}
			}

			/*
			   Set the rest data:
			 */
			$Page->setTitle(htmlspecialchars($Purifier->purify($_POST['Title'])));
			$Page->setTags(htmlspecialchars($Purifier->purify($_POST['Tags'])));
			$Page->Save();
			UpdateCache();

			if((isset($Moved))and ($Moved == TRUE)) {
				Jump($NewUri);
			} else {
				Jump($_SESSION['REQUEST_URI']);
			}
		}
		//$User = UserQuery::create()->findPk($_SESSION['UserId']);
	}





	$Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
	$smarty->assign('Action', 'WikiRename');
	if ($Page) {
			$smarty->assign('PageTitle', $Page->getTitle());
		$smarty->assign('Tags', $Page->getTags());
		$smarty->assign('RenameId', $Page->getId());
	} else {
		JumpBack();
	}
	if ($url_path[1] == basename($_SESSION['REQUEST_URI'])) {
		$smarty->assign('FirstLevelPage', TRUE);
	} else {
		$smarty->assign('FirstLevelPage', FALSE);
	}
	$smarty->assign('Title', 'Свойства страницы.');
	$smarty->assign('PageName', basename($_SESSION['REQUEST_URI']));
	$smarty->assign('PrePageUri', $_SESSION['REQUEST_URI']);
	$smarty->assign('PrePrePageUri', dirname($_SESSION['REQUEST_URI']));
	header('HTTP/1.0 404 Not Found');
	$smarty->display("SiteBrushHead.tpl.html");
	$smarty->display("Properties.tpl.html");
	$smarty->display('SiteBrushMenu.tpl.html');
} else {
	$_SESSION['system_message'] = "Доступ запрещен.";
	PrintSystemMessage('ok', '/');
}
?>
