<?php
//RemovePostFromGroup($GroupId,5); //Check group is mine or remove from public groups $configuration['groups']['public'].
function RemovePostFromGroup($GroupId, $PostId)
{
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($TargetGroup)) {
      if ($TargetGroup->getOwnerId() == '0') {
        //the group is system (check if it is public);
        if (CheckGroupIsPublic($GroupId)) {
          //the group is public:
          $PostToRemove = PostQuery::create()->filterById($PostId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
          if (isset($PostToRemove)) {
            $db = mysql_connect($configuration['db']['host'], $configuration['db']['user'], $configuration['db']['pass']) or die("Database connect error");
            mysql_select_db($configuration['db']['name'], $db);
            $result = mysql_query("set names 'utf8'");
            $result = mysql_query("DELETE FROM group_post where post_id=\"{$PostId}\" and group_id=\"{$GroupId}\"");
            mysql_close($db);
          } else {
            //error
            die('No such post.');
          }
        } else {
          //error
          die('The group is not public.');
        }
      } elseif ($TargetGroup->getOwnerId() == $_SESSION['UserId']) {
        //the group is mine - add user to this group;
        $PostToRemove = PostQuery::create()->filterById($PostId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
        if (isset($PostToRemove)) {
            $db = mysql_connect($configuration['db']['host'], $configuration['db']['user'], $configuration['db']['pass']) or die("Database connect error");
            mysql_select_db($configuration['db']['name'], $db);
            $result = mysql_query("set names 'utf8'");
            $result = mysql_query("DELETE FROM group_post where post_id=\"{$PostId}\" and group_id=\"{$GroupId}\"");
            mysql_close($db);
        } else {
          //error
          die('No such post.');
        }
      } else {
        //the group is not yours;
        die('The group is not yours and is not public.');
      }
    }
  }
}
?>
