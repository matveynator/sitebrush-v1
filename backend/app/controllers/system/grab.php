<?php



//the group is system;
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

	$remote_url=urldecode($_GET['grab']);
	if ((!empty($remote_url))and(filter_var($remote_url, FILTER_VALIDATE_URL))) 
	{
		$html = file_get_html($remote_url);
		$baseUrl=$remote_url;
		//convert to utf8
		//iconv(mb_detect_encoding($html, mb_detect_order(), true), "UTF-8", $html);


		//allways auto grab files:
		$html = preg_replace_callback("/(\(\'|\(\"|\(|\'|\")(\S*\.({$configuration['extension']['grab']}))(\"|\'|\)|\'\)|\"\))/i", GrabAllCallback, $html);

	//	echo $html;
	//	exit();
		$smarty->assign('PageText', $html);
		$smarty->assign('FormAction', "?edit");
		$smarty->display("WikiHead.tpl.html");
		$smarty->display("Wiki.tpl.html");
		exit();
	} else {
		header('HTTP/1.0 404 Not Found');
		$smarty->assign('Title', 'Копирование сайта.');
		$smarty->display("SiteBrushHead.tpl.html");
		$smarty->display("Grab.tpl.html");
		$smarty->display('SiteBrushMenu.tpl.html');
	}
} else {
	$_SESSION['system_message'] = "Вам необходимо <a href='?login'>авторизоваться</a>.";
	PrintSystemMessage('ok', '?login');
}

?>

