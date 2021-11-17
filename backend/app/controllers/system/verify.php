<?php
/*
   This is the controller to join and create account in the service.
 */
//if (!isset($_SESSION['invited']) or ($_SESSION['invited'] == FALSE)) {
//  Jump('/invitation');
//}
if (!isset($_SESSION['LoggedIn']) or ($_SESSION['LoggedIn'] == FALSE)) {
	if ($configuration['AdminUserRegistered'] == FALSE) {
		exec("dig +short +trace a {$configuration['domain']} |grep 'A ' |awk '{print$2}' ", $TracedARecord, $TracedAReturnCode);
		if($TracedAReturnCode==0) {
			if ((isset($TracedARecord['0'])) and ($TracedARecord['0'] == $configuration['ip'])) {
				$Domain = DomainQuery::create()->filterByStatus('Active')->filterByName($configuration['domain'])->findOneOrCreate();
				if ($Domain->getEmailSecret()=='') {
					$EmailSecret = substr(hash('md5', mt_rand()), 5, 15);
					$Domain->setEmailSecret($EmailSecret);
					$Domain->Save();
				} else {
					echo $EmailSecret = $Domain->getEmailSecret();
					
				}


			}
		}
		if (((isset($TracedARecord['0'])) and ($TracedARecord['0'] != $configuration['ip'])) or (!isset($TracedARecord['0']))) {
			$Domain = DomainQuery::create()->filterByStatus('Active')->filterByName($configuration['domain'])->findOneOrCreate();
			if ((!isset($Domain)) or ($Domain->getEmailSecret() == '')) {
				$EmailSecret = substr(hash('md5', mt_rand()), 5, 15);
				$Domain->setEmailSecret($EmailSecret);
				$Domain->Save();
			} else {
				$EmailSecret = $Domain->getEmailSecret();
			}

			exec("dig +short +trace txt {$EmailSecret}.{$configuration['domain']} |grep 'TXT ' |awk -F'\"' '{print$2}' ", $email_out, $email_code);

			//echo $cname_out['0'] . "<br>";
			if ((isset($cname_out['0'])) and ($cname_out['0'] == "{$configuration['master_domain']}.")) {
				if (isset($email_out['0'])) {

					/*
					   Security checks:
					 */
					$Insecure = new Brain_Security();
					$Insecure->VerifyDnsEmail($email_out['0']);
					$_SESSION['Permited_Email'] = $email_out['0'];
				} else {
					$cname_entry_to_add = "{$CnameSecret} IN CNAME {$configuration['master_domain']}. <img border='0' width='16' alt='valid' src='/{$configuration['public_html']['static_folder']}/static/valid.png'>";
					$email_entry_to_add = "{$EmailSecret} IN TXT <font color='red'>your@email.com</font> <img border='0' width='16' alt='attention' src='/{$configuration['public_html']['static_folder']}/static/attention.png'>";
					$smarty->assign('cname_entry_to_add', $cname_entry_to_add);
					$smarty->assign('email_entry_to_add', $email_entry_to_add);
					$smarty->assign('Title', $dic['Error_Verify_Domain_d']);
					$smarty->display('Head.tpl.html');
					$smarty->display('Error_Verify_Domain.tpl.html');
					exit();
				}
			} else {
				$cname_entry_to_add = "{$CnameSecret} IN CNAME {$configuration['master_domain']}.";
				$email_entry_to_add = "{$EmailSecret} IN TXT <font color='red'>your@email.com</font>";
				$smarty->assign('cname_entry_to_add', $cname_entry_to_add);
				$smarty->assign('email_entry_to_add', $email_entry_to_add);
				$smarty->assign('Title', $dic['Error_Verify_Domain_d']);
				$smarty->display('Head.tpl.html');
				$smarty->display('Error_Verify_Domain.tpl.html');
				exit();
			}
		}
		if (isset($_POST['register'])) {

			/*
			   Security checks:
			 */
			$Insecure = new Brain_Security();
			if ((!isset($_SESSION['Human']))or($_SESSION['Human']!=TRUE)) {
				$Insecure->VerifyCaptcha($_POST['captcha']);
			}
			$Insecure->VerifyNewAdminEmail($_POST['email']);
			$Insecure->VerifyNickName($_POST['nickname']);
			$Insecure->VerifyPasswords($_POST['password']);

			/*
			   If this is the first user to register - make him superuser:
			 */
			$UsersAmmount = UserQuery::create()->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();

			/*
			   If security passed ok - register user:
			 */
			$User = new User;
			$User->setNickName($_POST['nickname']);
			$User->setEmail($_POST['email']);
			$User->setPassword(hash('md5', $_POST['password']['1']));
			$User->setQuotaBytes($configuration['quota']['bytes']);
			$User->setQuotaBytesUsed('0');
			$User->setQuotaOriginals($configuration['quota']['originals']);
			$User->setQuotaOriginalsUsed('0');
			$User->setDomain($configuration['domain']);
			$User->setStatus('Active');
			if ($User->Save()) {
				//create default user groups:
				foreach ($configuration['groups']['user'] as $group) {
					$Group = GroupQuery::create()->filterByOwnerId($User->getId())->filterByName($group)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOneOrCreate();
					//leave abuse group empty
					if ($Group->getName() != $configuration['groups']['names']['user']['Abuse']['Name']) {

						$Group->addUser($User);
					}
					$Group->Save();
				}

				//add to user group:
				$PGroup = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['public']['User']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
				$PGroup->addUser($User);
				$PGroup->Save();

				//add to user group:
				$PGroup = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
				$PGroup->addUser($User);
				$PGroup->Save();

				/*
				   add first user to superuser group:
				 */
				if ($UsersAmmount == 0) {

					if (!is_dir($configuration['path']['static'])) {
						mkdir($configuration['path']['static'], 0777, TRUE);
					}
					if (!is_dir($configuration['path']['cache'])) {
						mkdir($configuration['path']['cache'], 0777, TRUE);
					}


					$PGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
					$PGroup->addUser($User);
					$PGroup->Save();
				}


				$_SESSION['invited']      = FALSE;
				$_SESSION['LoggedIn']     = TRUE;
				$_SESSION['JustLoggedIn'] = TRUE;
				$_SESSION['UserId']       = $User->getId();
				$_SESSION['Email']        = $User->getEmail();
				$_SESSION['NickName']     = $User->getNickName();
				Jump('/?profile');
			}
		} else {
			$smarty->Assign('Action', 'Join');
			if (isset($_SESSION['Permited_Email'])) {
				$smarty->Assign('Email', $_SESSION['Permited_Email']);
			}

			header('HTTP/1.0 404 Not Found');
			$smarty->assign('Title', 'Регистрация администратора сайта.');
			$smarty->display("SiteBrushHead.tpl.html");
			$smarty->display("Join.tpl.html");

		}
	} else {
		$_SESSION['system_message'] = $dic['Error_Admin_allready_registered_d'];
		$_SESSION['system_message_navigation'] = "ok";
		PrintSystemMessage();
	}
} else {
	Jump('/');
}

?>
