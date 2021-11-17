<?php
//the group is system;
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {
	//ok you are in superuser group:
	/*
	   Update wiki text request:
	 */


	if ((isset($_POST['Text']) and ($_POST['Text'] != ""))) {

		$OldPage = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->orderByVersion('desc')->findOne();
		$OldActivePage = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByVersion('desc')->findOne();

		//allways auto grab files:
		$SecureText = preg_replace_callback("/(\(\'|\(\"|\(|\'|\")(\S*\.({$configuration['extension']['grab']}))(\"|\'|\)|\'\)|\"\))/i", GrabAllCallback, $_POST['Text']);
		//$SecureText = $_POST['Text'];
		if (($OldPage) and ((hash('md5', $SecureText)) != (hash('md5', $OldPage->getText())))) {

			/*
			   Add new page with incremented version:
			 */
			$NewPage = new Post();
			$NewPage->setType('Wiki');
			$NewPage->setRequestUri($_SESSION['REQUEST_URI']);
			$NewPage->setText($SecureText);
			if (isset($OldActivePage)) {
				$NewPage->setTitle($OldActivePage->getTitle());
				$NewPage->setTags($OldActivePage->getTags());
			}
			$NewPage->setDomain($configuration['domain']);
			$NewPage->setVersion($OldPage->getVersion() + 1);
			$NewPage->setStatus('Active');
			$NewPage->setDate(time());
			$NewPage->Save();
			$User = UserQuery::create()->findPk($_SESSION['UserId']);
			$User->addPost($NewPage);
			$User->Save();
			UpdateFromTemplate($SecureText);
			UpdateCache();
			Jump($_SESSION['REQUEST_URI']);
		} elseif (!$OldPage) {

			/*
			   Add new page:
			 */
			$NewPage = new Post();
			$NewPage->setType('Wiki');
			$NewPage->setRequestUri($_SESSION['REQUEST_URI']);
			$NewPage->setText($SecureText);
			$NewPage->setDomain($configuration['domain']);
			$NewPage->setVersion('1');
			$NewPage->setStatus('Active');
			$NewPage->setDate(time());
			$NewPage->Save();
			$User = UserQuery::create()->findPk($_SESSION['UserId']);
			$User->addPost($NewPage);
			$User->Save();
			UpdateFromTemplate($SecureText);
			UpdateCache();
			Jump($_SESSION['REQUEST_URI']);
		} else {

			/*
			   Do not add page:
			 */
			Jump($_SESSION['REQUEST_URI']);

			/*
			   $_SESSION['system_message'] = "Not modified: {$_SESSION['REQUEST_URI']}";
			   $_SESSION['system_message_navigation'] = "back";
			   PrintSystemMessage();
			 */
		}
	}




	$Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
	$smarty->assign('Action', 'WikiEdit');
	if ($Page) {
		$smarty->assign('Title', $Page->getTitle());
		$smarty->assign('Tags', $Page->getTags());
		$smarty->assign('PageText', $Page->getText());
	} else {
		$PreUri=$configuration['PathUri']['dirname'];
		$Page=PostQuery::create()->filterByType('Wiki')->filterByRequestUri($PreUri)->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
		while (!$Page) {
			$PreUri=dirname($PreUri);
			$Page=PostQuery::create()->filterByType('Wiki')->filterByRequestUri($PreUri)->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
			if ($PreUri=='/') {
				break;	
			}
		}
		if ($Page) {
			$smarty->assign('Title', $Page->getTitle());
			$smarty->assign('Tags', $Page->getTags());
			$smarty->assign('PageText', $Page->getText());
		}
	}
	$smarty->assign('PageName', basename($_SESSION['REQUEST_URI']));
	$smarty->assign('FormAction', '');
	$smarty->assign('PrePageUri', $_SESSION['REQUEST_URI']);
	$smarty->assign('PrePrePageUri', dirname($_SESSION['REQUEST_URI']));
	$smarty->display("WikiHead.tpl.html");
	$smarty->display("Wiki.tpl.html");
} else {
	//error
	if ((!isset($_SESSION['LoggedIn'])) or ($_SESSION['LoggedIn'] == FALSE)) {
		$_SESSION['edit-login-edit'] = TRUE;
	}
	Jump('?login');
}
?>
