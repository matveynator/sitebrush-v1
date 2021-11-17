<?php

function GrabCssFile($url = FALSE)
{
	global $configuration;
	if ($url != FALSE) {
		$parsed_url = parse_url($url);
		if (isset($parsed_url['path'])) {
			$Ext = implode('.', array_slice(explode('.', $parsed_url['path']), - 1));
			if (!isset($parsed_url['host'])) {
				$Host = $configuration['domain'];
				echo $Host;
				exit();
			} else {
				$Host = $parsed_url['host'];
			}
		}

		ini_set('default_socket_timeout', 15);
		$ctx = stream_context_create(array('http' => array(
						'timeout' => 15,
						'header' => "accept-language: en\r\n" . "Host: {$Host}\r\n" . "Referer: http://{$Host}\r\n" . "User-Agent: SiteBrush; (+http://sitebrush.com)\r\n",
						)));
		$file = file_get_contents(EncodeUrl($url), 0, $ctx);
		if ($file === FALSE) {
			$out = $url;
		} else {
			file_put_contents("{$configuration['path']['tmp']}/file", $file);
			$Hash = hash_file('md5', "{$configuration['path']['tmp']}/file");
			copy("{$configuration['path']['tmp']}/file", "{$configuration['path']['static']}/{$Hash}.{$Ext}");
			unlink("{$configuration['path']['tmp']}/file");
			if (file_exists("{$configuration['path']['static']}/{$Hash}.{$Ext}")) {
				$Media = new Media();
				$Media->setType("File");
				$Media->setHash($Hash);
				$Media->setOriginalHash($Hash);
				$Media->setFormat($Ext);
				$Media->setStatus("Active");
				$Media->setDomain($configuration['domain']);
				$CurrentTime = time();
				$Media->setDate($CurrentTime);
				$Media->setDay(date("Ymd", $CurrentTime));
				$Media->setBytesUsed(filesize("{$configuration['path']['static']}/{$Hash}.{$Ext}"));
				$Media->Save();
				$User = UserQuery::create()->findPk($_SESSION['UserId']);
				$User->addMedia($Media);
				$User->Save();
			}
			$out = "{$configuration['static']['uri']}/{$Hash}.{$Ext}";
		}
		return $out;
	}
}
?>
