<?php

function GrabImage($url = FALSE)
{
  global $configuration;
  if ($url != FALSE) {
    $parsed_url = parse_url($url);
    if (isset($parsed_url['path'])) {
      if (!isset($parsed_url['host'])) {
        $Host = $configuration['domain'];
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
    if ($file === false) {
//      echo $url.' ';
      $out = $url;
    } else {
      file_put_contents("{$configuration['path']['tmp']}/file", $file);
      $Image = new Brain_Image("{$configuration['path']['tmp']}/file");
      if (!isset($Image->error)) {
        $Image->SetType("Image");
        $Image->Save();
        $out = "{$configuration['static']['uri']}/{$Image->hash}.{$Image->format}";
        unset($file);
        unset($Image);
      } else {
        $out = $url;
      }
    }
    return $out;
  }
}



?>
