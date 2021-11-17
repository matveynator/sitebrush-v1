<?php
/*
Profile area
*/
if (isset($_POST['change_email'])) {
  //check if user with this email exists?
  $user = new User();
  $OneUser = UserQuery::create()->filterById($_SESSION['userId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if ($OneUser->Email == $_POST['email']) {
    $_SESSION['system_message'] = "{$dic['email']} {$_POST['email']} <br>{$dic['allready_taken']}.";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  }
  //check if email format is valid:
  if (!validEmail($_POST['email'])) {
    //pecl install mail
    $_SESSION['system_message'] = "{$dic['email']} {$_POST['email']} {$dic['invalid_please_correct']}.";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  } else {
    $OldUser = UserQuery::create()->filterById($_SESSION['userId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if ($OldUser->Password !== sha1($_POST['password'])) {
      $_SESSION['system_message'] = "{$dic['password']} {$dic['error']}!";
      $_SESSION['system_message_navigation'] = "back";
      PrintSystemMessage();
    }
    $OldUser->Email = $_POST['email'];
    $OldUser->Activated = 'false';
    $OldUser->VerificationCode = md5(mt_rand());
    $_SESSION['Email'] = $_POST['email'];
    if ($OldUser->Save()) {
      //set email link
      $mail = Mail::factory("mail");
      $headers = array(
        "From" => "{$configuration['noreply_email']}",
        "Mime-Version" => "1.0",
        "Content-Type" => "text/plain; charset=UTF-8",
        "Subject" => "{$dic['activation_of']} {$_SESSION['Email']}",
      );
      $body = "{$configuration['url']}/activate/{$OldUser->VerificationCode} \r\n" . "{$dic['pl_fol_link']}.";
      $mail->send("{$_POST['email']}", $headers, $body);
      $_SESSION['system_message'] = "{$dic['follow_email_instr']}.";
      $_SESSION['system_message_navigation'] = "back";
      $smarty->assign('PageId', $_SESSION['PageId']);
      PrintSystemMessage();
    }
  }
}
if (isset($_POST['change_password'])) {
  //empty?
  if (!isset($_POST['password_old']) or !isset($_POST['password_new_1']) or !isset($_POST['password_new_2'])) {
    $_SESSION['system_message'] = "{$dic['passwords_empty']}.";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  }
  //mistyped?
  if ($_POST['password_new_1'] != $_POST['password_new_2']) {
    $_SESSION['system_message'] = "{$dic['passwords_mismatch']}.";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  }
  //invalid pass?
  $user = new User();
  $OldUser = UserQuery::create()->filterById($_SESSION['userId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if ($OldUser->Password !== sha1($_POST['password_old'])) {
    $_SESSION['system_message'] = "{$dic['password']} {$dic['error']}!";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  }
  //ok?
  $OldUser->Password = sha1($_POST['password_new_1']);
  $OldUser->Save();
  $_SESSION['system_message'] = "{$dic['password']} {$dic['updated']}.";
  $_SESSION['system_message_navigation'] = "back";
  PrintSystemMessage();
}
if (isset($_POST['delete_account'])) {
  //empty?
  if ($_POST['password'] == "") {
    $_SESSION['system_message'] = "{$dic['passwords_empty']}.";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  }
  //invalid pass?
  $user = new User();
  $OldUser = UserQuery::create()->filterById($_SESSION['userId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if ($OldUser->Password != sha1($_POST['password'])) {
    $_SESSION['system_message'] = "{$dic['password']} {$dic['error']}!";
    $_SESSION['system_message_navigation'] = "back";
    PrintSystemMessage();
  }
  //ok?
  $OldUser->Status = "Deleted";
  $OldUser->Save();
  //destroy session and logout
  session_destroy();
  $_SESSION['system_message'] = "{$dic['thank_you_good_bye']}";
  $_SESSION['system_message_navigation'] = "home";
  PrintSystemMessage();
}
$smarty->assign('LoggedIn', $_SESSION['loggedIn']);
$smarty->assign('Email', $_SESSION['Email']);
?>
