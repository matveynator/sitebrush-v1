<?php
require_once("{$configuration['backend']['libraries']}/includes/manual/create_default_system_groups.php");
echo "<pre>";
echo "Memory used = " . memory_get_usage() . "\n<br>";
var_dump(get_defined_vars());
?>
