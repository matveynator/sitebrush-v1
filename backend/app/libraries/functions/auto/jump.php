<?php
/*
Jumps back and avoids loops if any except loops between / and / ;
*/
function Jump($Path)
{
  header("Location: {$Path}");
  exit();
}
?>
