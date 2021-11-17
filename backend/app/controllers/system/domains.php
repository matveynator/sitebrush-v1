<?php
if($configuration['domain']==$configuration['master_domain']) {
	$Domains = DomainQuery::create()->orderById('desc')->find();
	if($Domains) {
		foreach($Domains as $Domain) {
			$DomainName=$Domain->getName();
			echo "<a href=\"http://{$DomainName}\">{$DomainName}</a> ";
		}
	}
}
?>

