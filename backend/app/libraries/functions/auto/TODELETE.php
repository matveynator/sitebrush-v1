<?php
function str_replacei($old, $new, $haystack)
{
  return preg_replace("/" . $old . "/i", $new, $haystack);
}

function fixTag($tagname, $intag, $repalcefrom, $replaceto, $message)
{
  $utagname = strtoupper($tagname);
  while (preg_match("/\[" . $tagname . "\](.+?)\[\/" . $tagname . "\]/si", $message, $matches)) {
    $searchfor  = $matches[1];
    $matches[1] = trim($matches[1]);
    $doreplace  = true;
    foreach ($replacefrom as $val) {
      if (stristr($matches[1], $val)) {
        $doreplace = false;
      }
    }
    if ($doreplace) {
      $matches[1] = $replaceto . $matches[1];
      if ($intag) {
        $message = str_replacei("[" . $tagname . "]" . $searchfor . "[/" . $tagname . "]", "\{" . $utagname . "=" . $matches[1] . "]" . $matches[1] . "\{/" . $utagname . "\}", $message);
      } else {
        $message = str_replacei("[" . $tagname . "]" . $searchfor . "[/" . $tagname . "]", "\{" . $utagname . "\}" . $matches[1] . "\{/" . $utagname . "\}", $message);
      }
    }
  }
  if ($intag) {
    while (preg_match("/\[" . $tagname . "=(.+?)\](.+?)\[\/" . $tagname . "\]/si", $message, $matches)) {
      $searchfor  = $matches[1];
      $matches[1] = trim($matches[1]);
      $doreplace  = true;
      foreach ($replacefrom as $val) {
        if (stristr($matches[1], $val)) {
          $doreplace = false;
        }
      }
      if ($doreplace) {
        $matches[1] = $replaceto . $matches[1];
        $message = str_replacei("[" . $tagname . "=" . $searchfor . "]" . $matches[2] . "[/" . $tagname . "]", "\{" . $utagname . $replace . "}" . $matches[2] . "\{/" . $utagname . "\}", $message);
      }
    }
  }
  if ($intag) {
    $message = str_replace("\{" . $utagname . "=", "[" . $utagname . "=", $message);
    $message = str_replace("\{/" . $utagname . "\}", "[/" . $utagname . "]", $message);
  } else {
    $message = str_replace("\{" . $utagname . "\}", "[" . $utagname . "]", $message);
    $message = str_replace("\{/" . $utagname . "\}", "[/" . $utagname . "]", $message);
  }
}
//Лечилка неправильных тегов
function fixTags($message)
{
  fixTag("IMG", false, array("http://", "https://"), "http://", $message);
  fixTag("URL", true, array("http://", "https://"), "http://", $message);
  fixTag("IURL", true, array("http://", "https://"), "http://", $message);
  fixTag("FLASH", true, array("http://", "https://"), "http://", $message);
  fixTag("FTP", true, array("ftp://"), "ftp://", $message);
  return $message;
}
//собственно парсер
function messageparse($message)
{
  //needs fix (possible js injection)
  $message = preg_replace('/( +?)ftp:\/\/(\\S+)/is', "\\1[ftp=ftp://\\2]ftp://\\2[/ftp]", $message);
  $message = preg_replace('/(\\s|^|\\n)(http|https):\/\/(\\S+)/is', "\\1[url=\\2://\\3]\\2://\\3[/url]", $message);
  $message = preg_replace('/\[url=http:\/\/(www\.|)youtube\.com\/watch\?v=(.+?)\](.+?)\[\/url\]/is', "[youtube]\\2[/youtube]", $message);
  //http://dig.uranruda.kmv.ru/albums/leonkiller123/DSCN6406.JPG
  $message = preg_replace('/\[url=http:\/\/dig\.uranruda\.kmv\.ru\/albums\/(.+?)\](.+?)\[\/url\]/is', "[img]http://uranruda.ru/albums/\\1[/img]", $message);
  $message = preg_replace('/\[img\]http:\/\/dig\.uranruda\.kmv\.ru\/albums\/(.+?)\[\/img\]/is', "[img]http://uranruda.ru/albums/\\1[/img]", $message);
  $message = preg_replace('/\[url=http:\/\/(.+?\.|)youtube\.com\/p\.swf\?video_id=(.+?)\](.+?)\[\/url\]/is', "[youtube]\\2[/youtube]", $message);
  $message = preg_replace('/\[youtube=(.+?)\]/is', "[youtube]\\1[/youtube]", $message);
  $message = preg_replace('/\[url=http:\/\/(.+?\.|)rutube\.ru\/tracks\/(.+?)\.html\?v=(.+?)\](.+?)\[\/url\]/is', "[rutube]\\3[/rutube]", $message);
  $message = preg_replace('/&lt;iframe src=&quot;http:\/\/vkontakte\.ru\/video_ext\.php\?oid=(.+?)&amp;id=(.+?)&amp;hash=(.+?)&quot; width=&quot;(.+?)&quot; height=&quot;(.+?)&quot; frameborder=&quot;0&quot;&gt;&lt;\/iframe&gt;/is', "[vk]oid=\\1&id=\\2&hash=\\3\" width=\"\\4\" height=\"\\5\" frameborder=\"0\"[/vk]", $message);
  $message = preg_replace('/\[url=http:\/\/(.+?\.|)video\.google\.com\/videoplay\?docid=(.+?)\](.+?)\[\/url\]/is', "[gv]\\2[/gv]", $message);
  $message = preg_replace('/\[url=http:\/\/vimeo\.com\/(.+?)\](.+?)\[\/url\]/is', "[vimeo]\\1[/vimeo]", $message);
  $message = preg_replace('/\[url=http:\/\/www\.vimeo\.com\/(.+?)\](.+?)\[\/url\]/is', "[vimeo]\\1[/vimeo]", $message);
  $message = preg_replace('/\[url=(http:\/\/\\S+\.mp3)\](.+?)\[\/url\]/is', "[mp3]\\1[/mp3]", $message);
  $message = preg_replace('/\[url=(http:\/\/\\S+\.(jpg|jpeg|png|gif))\](http:\/\/\\S+\.(jpg|jpeg|png|gif))\[\/url\]/is', "[img]\\1[/img]", $message);
  $message = preg_replace('/\[url=(http:\/\/\\S+\.(swf))\](http:\/\/\\S+\.(swf))\[\/url\]/is', "[swf]\\1[/swf]", $message);
  $message = doparsecode($message);
  $message = doparseimage($message);
  $message = str_replace('{<{', '[', $message);
  $message = str_replace('}>}', ']', $message);
  $message = str_replace("\r\n", "<br>", $message);
  $message = str_replace("\r", "<br>", $message);
  $message = str_replace("\n", "<br>", $message);
  $message = str_replace("[br]", "<br>", $message);
  return $message;
}

function doparsecode($message)
{
  global $rootpath, $imagesdir, $txt, $maxwidth, $maxheight, $showgraphics, $docut, $dic;
  $cut = "";
  if (strstr($message, '[') || strstr($message, '://') || strstr($message, '@') || strstr($message, '/me')) {
    $codefromcache = array(
      '/([a-z0-9_-][a-z0-9\._-]*@[a-z0-9_-]+(\.[a-z0-9_-]+)+)/is',
      '/\[email\](.+?)\[\/email\]/is',
      '/\[url\](http|https|ftp)(.+?)\[\/url\]/is',
      '/\[url=(http|https|ftp)(.+?)\|blank\](.+?)\[\/url\]/is',
      '/\[url=(http|https|ftp)(.+?)\](.+?)\[\/url\]/is',
      '/\[iurl\](http|https|ftp)(.+?)\[\/iurl\]/is',
      '/\[iurl=(http|https|ftp)(.+?)\](.+?)\[\/iurl\]/is',
      '/\[friend\](.+?)\[\/friend\]/is',
      '/\[friend=(.+?)\](.+?)\[\/friend\]/is',
      '/\[b\](.+?)\[\/b\]/is',
      '/\[i\](.+?)\[\/i\]/is',
      '/\[u\](.+?)\[\/u\]/is',
      '/\[s\](.+?)\[\/s\]/is',
      '/\[color=([\w#]+)\](.*?)\[\/color\]/is',
      '/\[font=(.+?)\](.+?)\[\/font\]/is',
      '/\[size=(.+?)\](.+?)\[\/size\]/is',
      '/\[pre\](.+?)\[\/pre\]/is',
      '/\[justify\](.+?)\[\/justify\]/is',
      '/\[left\](.+?)\[\/left\]/is',
      '/\[right\](.+?)\[\/right\]/is',
      '/\[center\](.+?)\[\/center\]/is',
      '/\[sub\](.+?)\[\/sub\]/is',
      '/\[sup\](.+?)\[\/sup\]/is',
      '/\[ftp\](.+?)\[\/ftp\]/is',
      '/\[ftp=(.+?)\](.+?)\[\/ftp\]/is',
      '/\[hr\]/i',
      '/\[quote=(.+?)\](.+?)\[\/quote\]/is',
      '/\[quote\](.+?)\[\/quote\]/is',
      '/\[q=(.+?)\](.+?)\[\/q\]/is',
      '/\[q\](.+?)\[\/q\]/is',
      '/\[youtube\](.+?)\[\/youtube\]/is',
      '/\[rutube\](.+?)\[\/rutube\]/is',
      '/\[vk\](.+?)\[\/vk\]/is',
      '/\[gv\](.+?)\[\/gv\]/is',
      '/\[vimeo\](.+?)\[\/vimeo\]/is',
      '/\[swf\](.+?)\[\/swf\]/is',
      '/\[swf width=([0-9]+) height=([0-9]+)\s*\]((http):\/\/.+?)\[\/swf\]/i',
      '/\[swf height=([0-9]+) width=([0-9]+)\s*\]((http):\/\/.+?)\[\/swf\]/i',
      '/\[mp3\](.+?)\[\/mp3\]/is',
      '/\[sv\](.+?)\[\/sv\]/is',
      '/\[sb\](.+?)\[\/sb\]/is',
    );
    $codetocache = array(
      "<a href=mailto:\\1>\\1</a>",
      "<a href=mailto:\\1>\\1</a>",
      "<a href=\"\\1\\2\" target=\"_blank\">\\1\\2</a>",
      "<a href=\"\\1\\2\" target=\"_blank\">\\3</a>",
      "<a href=\"\\1\\2\" target=\"_blank\">\\3</a>",
      "<a href=\"\\1\\2\" rel=\"nofollow\">\\1\\2</a>",
      "<a href=\"\\1\\2\" rel=\"nofollow\">\\3</a>",
      "<a href=\"" . $rootpath . "users/" . "\\1/\">\\1</a>",
      "<a href=\"" . $rootpath . "users/" . "\\1/\">\\2</a>",
      "<b>\\1</b>",
      "<i>\\1</i>",
      "<u>\\1</u>",
      "<s>\\1</s>",
      "<font color=\"\\1\">\\2</font>",
      "<font face=\"\\1\">\\2</font>",
      "<font size=\\1>\\2</font>",
      "<pre>\\1</pre>",
      "<div align=\"justify\">\\1</div>",
      "<div align=\"left\">\\1</div>",
      "<div align=\"right\">\\1</div>",
      "<div align=\"center\">\\1</div>",
      "<sub>\\1</sub>",
      "<sup>\\1</sup>",
      "<a href=\"\\1\" target=\"_blank\">\\1</a>",
      "<a href=\"\\1\" target=\"_blank\">\\2</a>",
      "<hr>",
      "<div style=\"margin-left:20px\"><b>\\1 :</b></div><div style=\"margin-left:40px\"><i>\\2</i></div>",
      "<div style=\"margin-left:20px\"><b></b></div><div style=\"margin-left:40px\"><i>\\1</i></div>",
      "<div style=\"margin-left:20px\"><b>\\1 :</b></div><div style=\"margin-left:40px\"><i>\\2</i></div>",
      "<div style=\"margin-left:20px\"><b></b></div><div style=\"margin-left:40px\"><i>\\1</i></div>",
      "<object width=\"640\" height=\"505\"><param name=\"movie\" value=\"http://www.youtube-nocookie.com/v/\\1&hl=en&fs=1&color1=0x234900&color2=0x4e9e00\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"http://www.youtube-nocookie.com/v/\\1&hl=en&fs=1&color1=0x234900&color2=0x4e9e00\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"640\" height=\"505\"></embed></object>",
      "<object type=\"application/x-shockwave-flash\" data=\"http://video.rutube.ru/\\1\" width=\"400\" height=\"353\"><param name=\"movie\" value=\"http://video.rutube.ru/\\1\" ><img src=\"http://video.rutube.ru/\\1\" width=\"400\" height=\"353\" alt=\"\"> </object>",
      "<iframe src=\"http://vkontakte.ru/video_ext.php?\\1></iframe>",
      "<object type=\"application/x-shockwave-flash\" data=\"http://video.google.com/googleplayer.swf?docId=\\1&amp;hl=en\" width=\"400\" height=\"326\"><param name=\"movie\" value=\"http://video.google.com/googleplayer.swf?docId=\\1&amp;hl=en\" ><img src=\"http://video.google.com/googleplayer.swf?docId=\\1&amp;hl=en\" width=\"400\" height=\"326\" alt=\"\"> </object>",
      "<object width=\"601\" height=\"338\"><param name=\"allowfullscreen\" value=\"true\" /><param name=\"allowscriptaccess\" value=\"always\" /><param name=\"movie\" value=\"http://vimeo.com/moogaloop.swf?clip_id=\\1&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=ff9933&amp;fullscreen=1\" /><embed src=\"http://vimeo.com/moogaloop.swf?clip_id=\\1&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=ff9933&amp;fullscreen=1\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowscriptaccess=\"always\" width=\"601\" height=\"338\"></embed></object>",
      "<object type=\"application/x-shockwave-flash\" data=\"\\1\" width=\"500\" height=\"500\"><param name=\"movie\" value=\"\\1\" autoplay=\"false\" width=\"500\" height=\"500\"><img src=\"\\1\" alt=\"\" width=\"500\" height=\"500\"> </object>",
      "<object type=\"application/x-shockwave-flash\" data=\"\\3\" width=\"\\1\" height=\"\\2\"><param name=\"movie\" value=\"\\3\" autoplay=\"false\" width=\"\\1\" height=\"\\2\"><img src=\"\\3\" alt=\"\" width=\"\\1\" height=\"\\2\"> </object>",
      "<object type=\"application/x-shockwave-flash\" data=\"\\3\" width=\"\\2\" height=\"\\1\"><param name=\"movie\" value=\"\\3\" autoplay=\"false\" width=\"\\2\" height=\"\\1\"><img src=\"\\3\" alt=\"\\2\" width=\"\\1\" height=\"\\1\"> </object>",
      "<object type=\"application/x-shockwave-flash\" data=\"{$rootpath}images/players/mp3.swf\" width=\"290\" height=\"24\" id=\"audioplayer3\"><param name=\"movie\" value=\"{$rootpath}images/players/mp3.swf\"><param name=\"FlashVars\" value=\"soundFile=\\1\"><param name=\"quality\" value=\"high\"><param name=\"menu\" value=\"false\"><param name=\"wmode\" value=\"transparent\"></object><br><a href=\"\\1\" target=_blank>download</a>",
    );
    $message = preg_replace($codefromcache, $codetocache, $message);
  }
  return $message;
}

function grab_image($image = FALSE)
{
  global $configuration;
  if ($image != FALSE) {
    ini_set('default_socket_timeout', 10);
    $ctx = stream_context_create(array('http' => array(
      'timeout' => 10,
    )));
    $file = file_get_contents($image[1], 0, $ctx);
    if ($file === false) {
      $out = "<img src='{$image[1]}'>";
    } else {
      
      file_put_contents("{$configuration['var']['tmp']}/file", $file);
      $Image = new Brain_Image("{$configuration['var']['tmp']}/file");
      if (!isset($Image->error)) {
        $Image->Resize(800);
        $Image->SetType("Image");
        $Image->Save();
        $out = "<img src='http://uranruda.ru/f/{$Image->hash}.{$Image->format}'>";
        unset($file);
        unset($Image);
      } else {
        $out = "<img src='{$image[1]}'>";
      }
    }
    return $out;
  }
}


function doparseimage($message)
{
  if (strstr($message, '[') || strstr($message, '://') || strstr($message, '@') || strstr($message, '/me')) {
    $codefromcache = array(
      '/\[img\]((http):\/\/.+?)\[\/img\]/i',
      '/\[img width=([0-9]+) height=([0-9]+)\s*\]((http):\/\/.+?)\[\/img\]/i',
      '/\[img height=([0-9]+) width=([0-9]+)\s*\]((http):\/\/.+?)\[\/img\]/i',
      '/\[img\=&quot;((http|ftp):\/\/.+?)&quot;\](.+?)\[\/img\]/i',
      '/\[img\=&quot;((http|ftp):\/\/.+?)&quot;\]\[\/img\]/i',
    );
    
    $message = preg_replace_callback($codefromcache, "grab_image", $message);
  }
  return $message;
}

?>
