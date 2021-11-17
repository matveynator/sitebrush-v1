<?php
/*
The group is system;
*/
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

  /*
  Ok you are in superuser group:  
  */
  /*
  Undelete specific revision request:
  */
  if ((isset($_GET['undelete'])) and (is_numeric($_GET['undelete']))) {
    $Page = PostQuery::create()->findPk($_GET['undelete']);
    $User = UserQuery::create()->findPk($_SESSION['UserId']);
    $Page->setStatus('Active');
    $Page->Save();
    UpdateCache();
    Jump($_SESSION['REQUEST_URI']);
  }
} else {
  //error
  $smarty->assign('Title', $dic['Error_Ins_Rights_d']);
  $smarty->display('Head.tpl.html');
  $smarty->display('Error_Ins_Rights.tpl.html');
  exit();
}

?>
