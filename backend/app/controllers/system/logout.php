<?php
if (isset($_SESSION['LoggedIn'])) {
  LogOut();
  Jump($_SESSION['REQUEST_URI']);
} else {
  Jump('/');
}

?>
