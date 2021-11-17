<?php
/*
if ((!isset($_SESSION['LoggedIn'])) or ($_SESSION['LoggedIn'] == FALSE)) {
	if(($configuration['domain']==$configuration['demo_domain'])) {
                $User = UserQuery::create()->filterByStatus("Active")->filterByDomain($configuration['domain'])->findOne();
                if ($User) {
                        $_SESSION['LoggedIn']     = TRUE;
                        $_SESSION['JustLoggedIn'] = TRUE;
                        $_SESSION['UserId']       = $User->getId();
                        $_SESSION['Email']        = $User->getEmail();
                        setcookie("dynamic", "yes", time()+(24*3600*5), "/", $configuration['domain']);
                }
	}
}
*/
?>
