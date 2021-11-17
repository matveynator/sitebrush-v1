<?php
if ((isset($_SESSION['Email']) and (($_SESSION['Email'] == 'matvey@copters.ru') or ($_SESSION['Email'] == 'matvey@rotorway.ru')))) {
  if (isset($_GET['env'])) {
    if ($_GET['env'] == "production") {
      $_SESSION['environment'] = 'production';
    } elseif ($_GET['env'] == "dev") {
      $_SESSION['environment'] = 'dev';
    } elseif ($_GET['env'] == "staging") {
      $_SESSION['environment'] == 'staging';
    }
  }
}
Jump('/');
?>
