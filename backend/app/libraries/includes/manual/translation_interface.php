<?php
/*
Dictionary request from translators. 
*/
if (!isset($_POST['my_lang_is']) and ($_SESSION['LANG'] != 'en')) {
  $smarty->display('Head.tpl.html');
  $smarty->display("BodyBegin.tpl.html");
  echo "<center><font style=\"font-size: 24px\">{$dic['my_lang_is']} translation interface. Revision #{$dic_revision}</font><br><br>
<font style=\"font-size: 14px\">
Please select whether you want to be listed in site credits - enter \"yes\"<br> or \"no\" in (show_maintainer_in_site_credits_yes_or_no) option.<br><br>

<font style=\"font-size: 24px\">Thank you!</font>

</center>
<br><br><i>(ID)=> English variant, that needs your translation.</i><br><br></font>";
  $translate_dic = $dic;
  require_once("{$configuration['backend']['dictionary']}/en.php");
  echo "<form id=\"translate\" name=\"translate\" method=\"post\" action=\"/dic\"><table width=\"910\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r";
  foreach ($dic as $key => $value) {
    //if(($key!="")and($key!=='translation_maintainer_email')) {
    if ($key != "") {
      //set empty value to english variant
      if (!isset($translate_dic["$key"])) {
        $translate_dic["$key"] = $value;
      }
      echo "<tr><td width=\"500\" valign=\"top\"><font style=\"font-size: 14px\">($key) => <b>$value</font></b></td><td width=\"10\">&nbsp;</td><td width=\"400\"><textarea name=\"$key\" id=\"$key\" cols=\"45\" rows=\"6\">{$translate_dic["$key"]}</textarea></td></tr>\r";
    } elseif ($key == 'translation_maintainer_email') {
      $_SESSION['translation_maintainer_email'] = $translate_dic["$key"];
      echo "<input type=\"hidden\" name=\"$key\" id=\"$key\" value=\"{$translate_dic["$key"]}\"/>\r";
    }
  }
  echo '<tr><td width=\"500\" valign=\"top\">&nbsp;</td><td width=\"10\">&nbsp;</td><td width=\"400\"><br><input type="submit" value="Update" /></td></tr></table></form>';
} elseif (isset($_POST['my_lang_is'])) {
  if (array_diff_assoc($_POST, $dic)) {
    $Language             = new Language();
    $LastLanguageData     = $Language->GetSingle(array(array("Code", "=", $LANG), array("Domain", "=", $configuration['domain'])), "Revision", false);
    $LastLanguageRevision = $LastLanguageData->Revision;
    $Language->Code       = $LANG;
    $Language->Revision   = ($LastLanguageRevision + 1);
    $Language->Dictionary = base64_encode(serialize($_POST));
    $Language->Domain     = $configuration['domain'];
    if ($Language->Save()) {
      //email differences to admins
      $dic_diff = "\r\n";
      foreach (array_diff_assoc($_POST, $dic) as $key => $value) {
        $dic_diff .= "{$key} => {$value}\r\n";
      }
      $dic_diff .= "\r\n \r\nPlease login to translation interface at http://{$LANG}.{$configuration['domain']}/dic to update translation if needed. Thank you.\r\n";
      $mail = Mail::factory("mail");
      $headers = array(
        "From"         => "{$configuration['noreply_email']}",
        "Mime-Version" => "1.0",
        "Content-Type" => "text/plain; charset=UTF-8",
        "Bcc"          => "{$configuration['domain_owner_email']}",
        "Subject"      => "{$LANG}.{$configuration['domain']} translation diff.",
      );
      $body = "{$LANG} language translation diff:\r\n {$dic_diff}";
      $mail->send($_SESSION['translation_maintainer_email'], $headers, $body);
      $NewRevision                           = ($LastLanguageRevision + 1);
      $_SESSION['system_message']            = "Updated to revision #$NewRevision.";
      $_SESSION['system_message_navigation'] = 'back';
      PrintSystemMessage();
    }
  } else {
    $_SESSION['system_message'] = "Nothing changed.";
    $_SESSION['system_message_navigation'] = 'back';
    PrintSystemMessage();
  }
} else {
  $_SESSION['system_message'] = "English language is maintained manually.";
  $_SESSION['system_message_navigation'] = 'back';
  PrintSystemMessage();
}
$smarty->display("BodyEnd.tpl.html");

?>
