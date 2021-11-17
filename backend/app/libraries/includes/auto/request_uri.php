<?php
$PathUri = pathinfo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
/*
   Trim ending slash in $_SERVER['REQUEST_URL']:
 */
if ($PathUri['basename'] == "") {
	$configuration['REQUEST_URL'] = DecodeUrl("http://" . $configuration['domain'] . $PathUri['dirname']);
	$configuration['REQUEST_URI'] = DecodeUrl($PathUri['dirname']);
} elseif ($PathUri['dirname'] != "/") {
	$configuration['REQUEST_URL'] = DecodeUrl("http://" . $configuration['domain'] . $PathUri['dirname'] . "/" . $PathUri['basename']);
	$configuration['REQUEST_URI'] = DecodeUrl($PathUri['dirname'] . "/" . $PathUri['basename']);
} elseif ($PathUri['dirname'] == "/") {
	$configuration['REQUEST_URL'] = DecodeUrl("http://" . $configuration['domain'] . $PathUri['dirname'] . $PathUri['basename']);
	$configuration['REQUEST_URI'] = DecodeUrl($PathUri['dirname'] . $PathUri['basename']);
} else {
	$configuration['REQUEST_URL'] = DecodeUrl("http://" . $configuration['domain'] . $_SERVER['REQUEST_URI']);
	$configuration['REQUEST_URI'] = DecodeUrl($_SERVER['REQUEST_URI']);
}

?>
