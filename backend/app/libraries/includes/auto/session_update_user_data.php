<?php
/*
   Error handlers: (if bruteforced)
 */
if ((isset($_SESSION['error_count'])) and ($_SESSION['error_count'] >= 3)) {
	$_SESSION['Human']       = FALSE;
	$_SESSION['error_total'] = ($_SESSION['error_total'] + $_SESSION['error_count']);
	$_SESSION['error_count'] = 0;
}

if (!isset($_SESSION['error_count'])) {
	$_SESSION['error_count'] = 0;
}

if (!isset($_SESSION['error_total'])) {
	$_SESSION['error_total'] = 0;
}

if ((isset($_SESSION['Human'])) and ($_SESSION['Human'] == TRUE)) {
	$smarty->assign('Human', 'yes');
}

/*
   Update user session information Assign user data from database to $_SESSION and to Smarty:
 */
if (isset($_SESSION['LoggedIn']) and ($_SESSION['LoggedIn'] == TRUE) and ($_SESSION['UserId'])) {
	$smarty->assign('LoggedIn', TRUE);

	//create default user system groups:
	//  require("{$configuration['backend']['libraries']}/includes/manual/create_default_user_groups.php");
	$User = UserQuery::create()->findPk($_SESSION['UserId']);
	if (!$User) {

		/*
		   Logout if no such user:
		 */
		LogOut();
		Jump('/');
	} else {
		if ($User->getStatus() == "Deleted") {

			/*
			   Logout if user deleted:
			 */
			LogOut();
			Jump('/');
		} else {
			$UserGroups = $Group = GroupQuery::create()->filterByOwnerId($_SESSION['UserId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
			//echo "<pre>";
			//print_r($UserGroups);
			foreach ($UserGroups as $UserGroup) {
				$MyGroups[] = $UserGroup->getName();
			}
			if (isset($MyGroups)) {
				$_SESSION['Groups']             = $MyGroups;
			}
			$_SESSION['UserId']             = $User->getId();
			$_SESSION['Email']              = $User->getEmail();
			$_SESSION['NickName']           = $User->getNickName();
			$_SESSION['FirstName']          = $User->getFirstName();
			$_SESSION['LastName']           = $User->getLastName();
			$_SESSION['Gender']             = $User->getGender();
			$_SESSION['Phone']              = $User->getPhone();
			$_SESSION['DateOfRegistration'] = $User->getDateOfRegistration();
			$_SESSION['DateOfBirth']        = $User->getDateOfBirth();
			$_SESSION['LastVisitTime']      = $User->getLastVisitTime();
			$_SESSION['GrinvichTimeOffset'] = $User->getGrinvichTimeOffset();
			$_SESSION['Activated']          = $User->getActivated();
			$_SESSION['SessionId']          = $User->getSessionId();
			$_SESSION['Language']           = $User->getLanguage();
			$_SESSION['AvatarId']           = $User->getAvatarId();
			$_SESSION['Profile']            = $User->getProfile();
			$_SESSION['QuotaBytes']         = $User->getQuotaBytes();
			$_SESSION['QuotaBytesUsed']     = $User->getQuotaBytesUsed();
			$_SESSION['QuotaOriginals']     = $User->getQuotaOriginals();
			$_SESSION['QuotaOriginalsUsed'] = $User->getQuotaOriginalsUsed();
			$_SESSION['AutoGrab']           = $User->getAutoGrab();
			$_SESSION['DomainToGrab']       = $User->getDomainToGrab();
		}
	}

	$User->setLastVisitTime(time());
	$User->save();
}

/*
   Update smarty with data from $_SESSION and filter some insecure items:
 */
foreach ($_SESSION as $key => $value) {
	//INSECURE! Add filter of error_count and error_total to wheel group;
	if ($key != 'captcha') {
		$SmartySession[$key] = $value;
	}
}
if (isset($SmartySession)) {
	$smarty->assign("_SESSION", $SmartySession);
}

/*echo "<pre>";
  print_r($_SESSION);
  print_r($_SERVER);
//die;
 */

//freeze static version of website:
$Domain = DomainQuery::create()->filterByName($configuration['domain'])->filterByStatus('Active')->findOne();
if ((isset($Domain))and($Domain->getFreezed() == TRUE)) {
	$_SESSION['Freezed'] = TRUE;
	$smarty->assign('Freezed', '1');
} else {
	unset($_SESSION['Freezed']);
}

?>
