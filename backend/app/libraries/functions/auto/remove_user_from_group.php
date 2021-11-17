<?php

function RemoveUserFromGroup($GroupId, $UserId)
{
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($TargetGroup)) {
      if ($TargetGroup->getOwnerId() == '0') {
        //the group is system;
        $SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
        if (AmIInGroup($SuperUserGroup->getId())) {
          //ok you are in superuser group - remove user from group:
          $UserToRm = UserQuery::create()->findPK($UserId);
          if (isset($UserToRm)) {
            $db = mysql_connect($configuration['db']['host'], $configuration['db']['user'], $configuration['db']['pass']) or die("Database connect error");
            mysql_select_db($configuration['db']['name'], $db);
            $result = mysql_query("set names 'utf8'");
            $result = mysql_query("DELETE FROM user_group where user_id=\"{$UserId}\" and group_id=\"{$GroupId}\"");
            mysql_close($db);
          } else {
            die('No such user');
          }
        } else {
          //error
          die('You are not in superuser group.');
        }
      } elseif ($TargetGroup->getOwnerId() == $_SESSION['UserId']) {
        //the group is mine;
        $UserToRm = UserQuery::create()->findPK($UserId);
        if (isset($UserToRm)) {
          $db = mysql_connect($configuration['db']['host'], $configuration['db']['user'], $configuration['db']['pass']) or die("Database connect error");
          mysql_select_db($configuration['db']['name'], $db);
          $result = mysql_query("set names 'utf8'");
          $result = mysql_query("DELETE FROM user_group where user_id=\"{$UserId}\" and group_id=\"{$GroupId}\"");
          mysql_close($db);
        }
      } else {
        //the group is not yours;
        die('The group is not yours.');
      }
    }
  }
}
?>
