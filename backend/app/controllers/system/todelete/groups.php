<?php
if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
  //GetMyGroupData($GroupId); //DONE make an array of all your groups or just requested one.
  //!!!! перепроверить чо то непашет!!!  $Groups=GetMyGroupData();
  //AddUserToGroup($GroupId,5); //DONE Check group is mine or check I am a supersuser to add to system groups.
  //RemoveUserFromGroup($GroupId,305); //DONE Check group is mine or check I am a supersuser to remove to system groups.
  //AddPostToGroup($GroupId,5); //DONE Check group is mine or add to public groups $configuration['groups']['public'].
 //AddPostToOneGroup($GroupId,$PostId);
  //RemovePostFromGroup($GroupId,5); //DONE Check group is mine or remove from public groups $configuration['groups']['public'].
  //CreateMyGroup($Title); //DONE Create personal (user) group with human readable $Title.
  //RemoveMyGroup($GroupId); //DONE Delete my group with $GroupId
  //CanIReadThis($PostId); //DONE Check that I am in the same group with post.
  //CanIEditThis($PostId); //Check that post is mine.
  //AmIInGroup($GroupId); // DONE
  //AmITheGroupOwner($GroupId); //DONE
  $Me          = UserQuery::create()->findPK($_SESSION['UserId']);
  $GroupsIAmIn = GroupQuery::create()->filterByUser($Me)->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
  $MyGroups    = GroupQuery::create()->filterByOwnerId($Me->getId())->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
  


  $smarty->assign('Action', 'Groups');
  // $smarty->assign('MyGroups', $Groups);
  $smarty->display("Head.tpl.html");
  $smarty->display("BodyBegin.tpl.html");
  
    $Me = UserQuery::create()->findPK($_SESSION['UserId']);
    $MyGroups = GroupQuery::create()->filterByUser($Me)->filterByOwnerId(array($Me->getId(), 0))->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    if (isset($MyGroups)) {
      foreach ($MyGroups as $MyGroup) {
        if ($MyGroup->getName() != $configuration['groups']['names']['public']['Abuse']['Name']) {
          $groups[] = array('id'=>$MyGroup->getId(), 'value'=>$MyGroup->getName());
        }
      }
      echo "<pre>";
      print_r($groups);
    }
  
  //print_r($i);
  //print_r($Groups);
  //  print_r($Groups);
  //  $smarty->display("Groups.tpl.html");
  $smarty->display("BodyEnd.tpl.html");
}
?>
