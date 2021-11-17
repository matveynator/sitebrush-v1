<?php

function DecodeUrl($URL = FALSE)
{
  if (isset($URL) and ($URL != FALSE)) {
    $parsed_url = parse_url($URL);
    if (isset($parsed_url['path'])) {
      $Path = implode("/", array_map("urldecode", explode("/", $parsed_url['path'])));
      if (isset($parsed_url['host'])) {
        $url = "{$parsed_url['scheme']}://{$parsed_url['host']}{$Path}";
      } else {
        $url = $Path;
      }
      return $url;
    }
  }
}
?>
