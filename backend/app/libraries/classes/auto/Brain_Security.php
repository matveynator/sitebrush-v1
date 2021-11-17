<?php 
if (!isset($configuration)) {
  exit('No direct script access allowed');
}

/**
 * Security actions class
 *
 * @name           Brain_Security
 * @subpackageof   Brain Framework
 * @path  	   libraries/classes
 * @category       Security
 * @author         Matthew Gladkikh
 * @link           http://brain.dev/user_guide/libraries/classes/Brain_Security.html
 *
 * required variables: 
 * $configuration, $dic
 */
//some strange hack:
class Brain_Security
{
  /*
  Default function:
  */
  function Brain_Security()
  {
    global $configuration, $dic;
    $this->configuration = $configuration;
    $this->dic = $dic;
    $this->name = get_class($this);
  }

  /*
  Default unit test
  */
  function Test()
  {
    /*
      Prepare to make unit tests: 
    */
  }

  function VerifyTitle($InsecureInput)
  {
    if ((strlen($InsecureInput)) > 512) {
      $_SESSION['system_message'] = $this->dic['Title_too_long_d'];
      PrintSystemMessage();
    }
  }

  function VerifyTags($InsecureInput)
  {
    if ((strlen($InsecureInput)) > 2000) {
      $_SESSION['system_message'] = $this->dic['Too_many_keywords_d'];
      PrintSystemMessage();
    } 
  }

  function VerifyPageName($InsecureInput)
  {
    if ($InsecureInput) {
      //check nickname length:
      if ((strlen($InsecureInput)) > 64) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Too_long_page_name_d'];
        PrintSystemMessage();
      }
      //check nickname is valid:
      if (preg_match('/[^0-9A-Za-z_\-\.]/', $InsecureInput)) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Invalid_chars_in_page_name_d'];
        PrintSystemMessage();
      }
    }
  }

  
  function VerifyInvite($InsecureInput)
  {
    //check invite length:
    if ((strlen($InsecureInput)) > 256) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_invite_d'];
      PrintSystemMessage();
    }
    //check invite in db:
    $Invite = InviteQuery::create()->filterByHash($InsecureInput)->filterByStatus("Active")->filterByDomain($this->configuration['domain'])->findOne();
    if (!$Invite) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Invite_is_allready_used_d'];
      $_SESSION['invited'] = FALSE;
      PrintSystemMessage();
    } else {
      $_SESSION['invited'] = TRUE;
    }
  }
  
  function VerifyPasswords($InsecureInput)
  {
    //check password length:
    if (((strlen($InsecureInput['1'])) > 256) or ((strlen($InsecureInput['1'])) > 256)) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_password_d'];
      PrintSystemMessage();
    }
    //check if password is empty:
    if (!($InsecureInput['1'])) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Empty_fist_password_d'];
      PrintSystemMessage();
    } elseif (!($InsecureInput['2'])) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Please_reenter_password_d'];
      PrintSystemMessage();
    }
    //check if passwords are the same:
    if ($InsecureInput['1'] != $InsecureInput['2']) {
      $_SESSION['system_message'] = $this->dic['Pass_do_not_match_d'];
      PrintSystemMessage();
    }
  }

  function VerifyPassword($InsecureInput)
  {
    //check password length:
    if ((strlen($InsecureInput)) > 256) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_password_d'];
      PrintSystemMessage();
    }
    //check if password is empty:
    if (!($InsecureInput)) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Empty_pass_error_d'];
      PrintSystemMessage();
    }


  }
  
  function VerifyOldPassword($InsecureInput)
  {
    //check password length:
    if ((strlen($InsecureInput)) > 256) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_password_d'];
      PrintSystemMessage();
    }
    //check if password is empty:
    if (!($InsecureInput)) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Empty_pass_error_d'];
      PrintSystemMessage();
    }
    $User = UserQuery::create()->findPk($_SESSION['UserId']);
    if ($User->getPassword() != (hash('md5', $InsecureInput))) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Pass_is_incorrect_d'];
      PrintSystemMessage();
    }
  }
  
  function VerifyOldPasswordByEmail($Password, $Email)
  {
    $this->VerifyOldEmail($Email);
    //check password length:
    if ((strlen($Password)) > 256) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_password_d'];
      PrintSystemMessage();
    }
    //check if password is empty:
    if (!($Password)) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Empty_pass_error_d'];
      PrintSystemMessage();
    }
    $User = UserQuery::create()->filterByEmail($Email)->filterByStatus("Active")->filterByDomain($this->configuration['domain'])->findOne();
    if ($User->getPassword() != (hash('md5', $Password))) {
      $_SESSION['forgotten_email']=$Email;
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Pass_is_incorrect_d'];
      PrintSystemMessage();
    }
  }
  
  function VerifyNewPassword($InsecureInput)
  {
    
    //check password length:
    if ((strlen($InsecureInput['old'])) > 256) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_password_d'];
      PrintSystemMessage();
    }
    //check if password is empty:
    if (!($InsecureInput['old'])) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Empty_pass_error_d'];
      PrintSystemMessage();
    }
    $User = UserQuery::create()->findPk($_SESSION['UserId']);
    if ($User->getPassword() != (hash('md5', $InsecureInput['old']))) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Pass_is_incorrect_d'];
      PrintSystemMessage();
    }
    
    //check password length:
    if (((strlen($InsecureInput['1'])) > 256) or ((strlen($InsecureInput['1'])) > 256)) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Too_long_password_d'];
      PrintSystemMessage();
    }
    //check if password is empty:
    if (!($InsecureInput['1'])) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Empty_pass_error_d'];
      PrintSystemMessage();
    } elseif (!($InsecureInput['2'])) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Please_reenter_password_d'];
      PrintSystemMessage();
    }
    //check if passwords are the same:
    if ($InsecureInput['1'] != $InsecureInput['2']) {
      $_SESSION['system_message'] = $this->dic['Pass_do_not_match_d'];
      PrintSystemMessage();
    }
  }
  


  function VerifyCaptcha($InsecureInput)
  {
    global $smarty;
    if ((strlen($InsecureInput)) > 15) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['Human'] = FALSE;
      $_SESSION['system_message'] = $this->dic['Too_many_symbols_d'];
      PrintSystemMessage();
    }
    if ($InsecureInput != $_SESSION['captcha']) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['Human'] = FALSE;
      $_SESSION['system_message'] = $this->dic['CAPTCHA_error_d'];
      PrintSystemMessage();
    } else {
      $_SESSION['Human'] = TRUE;
      $smarty->assign('Human', 'yes');
    }
  }
  
  function VerifyNickName($InsecureInput)
  {
    if ($InsecureInput) {
      //check nickname length:
      if ((strlen($InsecureInput)) > 24) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Nickname_too_long_d'];
        PrintSystemMessage();
      }
      //check nickname is valid:
      if (preg_match('/[^0-9A-Za-z_\-]/', $InsecureInput)) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Nickname_invalid_symbols_error_d'];
        PrintSystemMessage();
      }
      //check nickname in db:
      $User = UserQuery::create()->filterByNickName($InsecureInput)->filterByStatus("Active")->filterByDomain($this->configuration['domain'])->findOne();
      if ($User) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Nickname_allready_registered_d'];
        PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Nickname_empty_error_d'];
      PrintSystemMessage();
    }
  }


  function VerifyColor($InsecureInput)
  {
    if ($InsecureInput) {
      //check nickname length:
      if ((strlen($InsecureInput)) > 7) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Color_invalid_symbols_d'];
        PrintSystemMessage();
      }
      //check nickname is valid:
      if (preg_match('/[^0-9A-Za-z\#]/', $InsecureInput)) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Color_invalid_symbols_d'];
        PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Color_invalid_symbols_d'];
      PrintSystemMessage();
    }
  }
 
 
  function VerifyNewEmail($InsecureInput)
  {
    if ($InsecureInput) {
      
      //check if email format is valid:
      if (!validEmail($InsecureInput)) {
        //pecl install mail
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
        PrintSystemMessage();
      }
      //check email in db:
      $User = UserQuery::create()->filterByEmail($InsecureInput)->filterByStatus("Active")->filterByDomain($this->configuration['domain'])->findOne();
      if ($User) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['This_email_allready_registered_d'];
        PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
      PrintSystemMessage();
    }
  }

  function VerifyNewAdminEmail($InsecureInput)
  {
    if ($InsecureInput) {

      //check if email format is valid:
      if (!validEmail($InsecureInput)) {
        //pecl install mail
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
        PrintSystemMessage();
      }
      //check email in db:
      $User = UserQuery::create()->filterByEmail($InsecureInput)->filterByStatus("Active")->filterByDomain($this->configuration['domain'])->findOne();
      if ($User) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['This_email_allready_registered_d'];
        PrintSystemMessage();
      }
      if ((!isset($_SESSION['Permited_Email']))or($_SESSION['Permited_Email']!=$InsecureInput)) {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['This_email_is_not_for_admin_user_please_use_dns_d'];
      PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
      PrintSystemMessage();
    }
  }


  function VerifyEmail($InsecureInput)
  {
    if ($InsecureInput) {

      //check if email format is valid:
      if (!validEmail($InsecureInput)) {
        //pecl install mail
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
        PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
      PrintSystemMessage();
    }
  }

  function VerifyDnsEmail($InsecureInput)
  {
    if ($InsecureInput) {

      //check if email format is valid:
      if (!validEmail($InsecureInput)) {
        //pecl install mail
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Admin_email_dns_format_error_d'];
        PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Admin_email_dns_format_error_d'];
      PrintSystemMessage();
    }
  }



  function VerifyOldEmail($InsecureInput)
  {
    if ($InsecureInput) {
      
      //check if email format is valid:
      if (!validEmail($InsecureInput)) {
        //pecl install mail
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
        PrintSystemMessage();
      }
      //check email in db:
      $User = UserQuery::create()->filterByEmail($InsecureInput)->filterByStatus("Active")->filterByDomain($this->configuration['domain'])->findOne();
      if (!$User) {
        $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
        $_SESSION['system_message'] = $this->dic['No_user_with_such_email_d'];
        PrintSystemMessage();
      }
    } else {
      $_SESSION['error_count'] = ($_SESSION['error_count'] + 1);
      $_SESSION['system_message'] = $this->dic['Email_format_error_d'];
      PrintSystemMessage();
    }
  }
}
