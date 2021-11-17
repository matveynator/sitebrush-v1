<?php
/*
   Print system message to a user.
 */
function PrintSystemMessage($name="назад", $url="") {
	global $smarty,$dic,$configuration;
	//if system message exists - show it!
	if(isset($_SESSION['system_message'])) {
		$smarty->assign('SystemMessage',$_SESSION['system_message']);
		$smarty->assign('SystemMessageButtonName', $name);
		$smarty->assign('SystemMessageButtonUrl', $url);
		$smarty->assign('Title', "Системное сообщение:");
		$smarty->display("SiteBrushHead.tpl.html");
		$smarty->display('SystemMessage.tpl.html');
		$smarty->display('SiteBrushMenu.tpl.html');
		unset($_SESSION['system_message']);
		exit();
	}
}
?>
