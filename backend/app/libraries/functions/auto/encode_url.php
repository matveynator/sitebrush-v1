<?php

function EncodeUrl($URL = FALSE)
{
  if (isset($URL) and ($URL != FALSE)) {
    $parsed_url = parse_url($URL);
    if (isset($parsed_url['path'])) {
      $Path = implode("/", array_map("urlencode", explode("/", $parsed_url['path'])));
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
