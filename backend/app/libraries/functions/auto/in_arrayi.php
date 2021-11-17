<?php
function InArrayI($needle, $haystack)
{
  return in_array(strtolower($needle), array_map('strtolower', $haystack));
}
?>
