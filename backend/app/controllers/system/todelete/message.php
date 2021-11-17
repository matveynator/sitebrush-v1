<?php

if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {

  /*
  Mark message as read
  */
  if (((isset($_POST['id'])) and (is_numeric($_POST['id']))) and ((isset($_POST['status'])) and ($_POST['status'] == "read"))) {
    $Message = MessageQuery::create()->filterById($_POST['id'])->filterByTo($_SESSION['UserId'])->filterByUnread(TRUE)->filterByStatus("Active")->findOne();
	if(isset($Message)) {
		$Message->setUnread(FALSE);
		$Message->Save();
		exit();
	}	
  }

  /*
  Send new message:
  */
  if (((isset($_POST['To'])) and (is_numeric($_POST['To']))) and ((isset($_POST['Message'])) and ($_POST['Message'] != ""))) {
    
    $Purifier = new HTMLPurifier($configuration['HTMLPurifier_Messenger']);
    $SecureText = $Purifier->purify($_POST['Message']);
    
    //Destination user:
    $ToUser = UserQuery::create()->filterById($_POST['To'])->filterByStatus("Active")->filterByDomain($configuration['domain'])->findOne();
    if ($ToUser) {
      //Message body:
      $Message = new Message();
      $Message->setType('Message');
      $Message->setTo($_POST['To']);
      $Message->setFrom($_SESSION['UserId']);
      $Message->setText($SecureText);
      $Message->setDomain($configuration['domain']);
      $Message->setStatus('Active');
      $Message->setUnread(TRUE);
      $Message->setDate(time());
      $Message->Save();
      
      //Destination user:
      $ToUser->addMessage($Message);
      $ToUser->Save();
      
      //From user:
      $FromUser = UserQuery::create()->findPk($_SESSION['UserId']);
      $FromUser->addMessage($Message);
      $FromUser->Save();
    }
    Jump("/messenger/input/{$_POST['To']}");
  } else {
    JumpBack();
  }
} else {
  JumpBack();
}

?>
