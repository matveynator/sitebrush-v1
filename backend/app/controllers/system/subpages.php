<?php
/*
   The group is system;
 */
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup))and(AmIInGroup($SuperUserGroup->getId()))) {
	/*
	   Ok you are in superuser group:  
	 */
	$Pages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'] . "%")->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->find();
	if (count($Pages) > 0) {
		foreach ($Pages as $Page) {
			$RequestUri = $Page->getRequestUri();
			$UriList[$RequestUri] = $RequestUri;
		}
		$RequestedPage = $_SESSION['REQUEST_URI'];
		$UniqUriList = array_unique($UriList);
		$smarty->assign('Title', "структура сайта");
		$smarty->display("SiteBrushHead.tpl.html");
		PlotTree(ExplodeTree($UniqUriList, "/", TRUE));
		$smarty->display('SiteBrushMenu.tpl.html');
		echo '</div></body></html>';
		exit();
	}

} else {
        $_SESSION['system_message'] = "Доступ запрещен.";
        PrintSystemMessage('ok', '/');
}
?>
