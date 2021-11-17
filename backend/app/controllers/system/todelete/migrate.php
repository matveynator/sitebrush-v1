<?php
// Create a valid DB object named $db
// at the beginning of your program...
//require_once 'DB.php';
//if ((isset($_SESSION['LoggedIn'])) and ($_SESSION['LoggedIn'] == TRUE)) {
//USER old->new
//create system groups:
$valid_admin_array = array(
  'Anastezia',
  'Biker',
  'BlooDeR',
  'Faust',
  'leonkiller123',
  'matvey',
  'NOS',
  'Riko',
  'SILVER',
  'Toha',
  'VS',
);
$valid_users_array = array(
  'Abi-kun',
  'ALLIANCE',
  'Anastezia',
  'Andrei',
  'bet',
  'bigmac',
  'Biker',
  'BlooDeR',
  'Disp',
  'djon',
  'Doc',
  'Enigma',
  'Faust',
  'fintbeshtay',
  'Gaspar',
  'ghost',
  'Glaz',
  'guest31',
  'kecha_mc_13',
  'kompot',
  'Krisa',
  'kuc',
  'leonkiller123',
  'matvey',
  'Murka667',
  'Nataly',
  'NOS',
  'Nuclear_assault',
  'Osho',
  'Podnebesnaya',
  'REM',
  'Riko',
  'rumm',
  'sairon2',
  'Scamp',
  'Shtirl',
  'SILVER',
  'Toha',
  'Tolik',
  'vasek',
  'victor',
  'vladimir',
  'VS',
  'zmeich',
  'zor',
);


require_once("{$configuration['backend']['libraries']}/includes/manual/create_default_system_groups.php");

$db = &DB::connect('mysql://journal:iVae5aiziVae5aiziVae5aiz@jkmv.ru/journalkmv');
if (PEAR::isError($db)) {
  die($db->getMessage());
}

// Proceed with a query...
$res = &$db->query('SELECT id_user,email,password,username,gender,birthdate,lastvisit,created,color1,color2,color3,color4 FROM users where domain="uranruda.ru"');

// Always check that result is not an error
if (PEAR::isError($res)) {
  die($res->getMessage());
}

while ($res->fetchInto($row)) {
  echo "Processing user {$row[3]}...\n<br>";
  // Assuming DB's default fetchmode is DB_FETCHMODE_ORDERED
  $old_user[] = array(
    'id'       => $row[0],
    'email'    => $row[1],
    'password' => hash("md5",
    $row[2]),
    'nickname'           => $row[3],
    'gender'             => $row[4],
    'dateofbirth'        => $row[5],
    'lastvisittime'      => strtotime($row[6]),
    'dateofregistration' => strtotime($row[7]),
  );
  $User = new User();
  $User->setEmail($row[1]);
  $User->setPassword(hash('md5', $row[2]));
  $User->setNickName($row[3]);
  $User->setGender($row[4]);
  $User->setDateOfBirth(strtotime($row[5]));
  $User->setLastVisitTime(strtotime($row[6]));
  $User->setDateOfRegistration(strtotime($row[7]));
  $User->setStatus('Active');
  $User->setOldId($row[0]);
  $User->setDomain('beta.uranruda.ru');
  
  if ($row[8] != '') {
    $bg_color = $row[8];
  } elseif (($row[8] == '') and ($row[11] != '')) {
    $bg_color = $row[11];
  } else {
    $bg_color = $configuration['BackgroundColor'];
  }
  
  if ($row[9] != '') {
    $f_color = $row[9];
  } else {
    $f_color = $configuration['FontColor'];
  }
  
  if ($row[10] != '') {
    $l_color = $row[10];
  } else {
    $l_color = $configuration['LinkColor'];
  }
  

  if ((strlen($f_color)) == 6) {
    $f_color = "#{$f_color}";
  }
  
  if ((strlen($l_color)) == 6) {
    $l_color = "#{$l_color}";
  }
  
  if ((strlen($bg_color)) == 6) {
    $bg_color = "#{$bg_color}";
  }
  

  $Colors = array(
    'FontColor'       => $f_color,
    'LinkColor'       => $l_color,
    'BackgroundColor' => $bg_color,
  );
  $UserPreferences['Colors'] = $Colors;
  $User->setPreferences(serialize($UserPreferences));
  


  $User->Save();
  

  //create default user groups:
  foreach ($configuration['groups']['user'] as $group) {
    $Group = GroupQuery::create()->filterByOwnerId($User->getId())->filterByName($group)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOneOrCreate();
    //leave abuse group empty
    if ($Group->getName() != $configuration['groups']['names']['user']['Abuse']['Name']) {
      $Group->addUser($User);
    }
    $Group->Save();
  }
  
  if (in_array($User->getNickName(), $valid_admin_array)) {
    //add user to moderator group:
    $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['system']['Moderator']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
    $Group->addUser($User);
    $Group->Save();
  }
  
  if (in_array($User->getNickName(), $valid_admin_array)) {
    //add user to editor group:
    $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['system']['Editor']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
    $Group->addUser($User);
    $Group->Save();
  }
  
  if (in_array($User->getNickName(), $valid_admin_array)) {
    //add user to translator group:
    $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['system']['Translator']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
    $Group->addUser($User);
    $Group->Save();
  }
  

  if (in_array($User->getNickName(), $valid_users_array)) {
    //add user to public user group:
    $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['public']['User']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
    $Group->addUser($User);
    $Group->Save();
  }
  
  //add user to public user group:
  $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
  $Group->addUser($User);
  $Group->Save();

  /*
    //get all photos by user:
    $photos = &$db->query("set names utf8;");
    $photos = &$db->query("select file from files where user_id =\"{$row[0]}\" and deleted='0';");
    
    // Always check that result is not an error
    if (PEAR::isError($photos)) {
      die($photos->getMessage());
    }
    
    while ($photos->fetchInto($photo)) {
      $file = file_get_contents("http://uranruda.ru/ff/{$photo[0]}");
      file_put_contents("{$configuration['var']['tmp']}/file", $file);
      if ($file != "") {
        $_SESSION['UserId'] = $User->getId();
        $Image = new Brain_Image("{$configuration['var']['tmp']}/file");
        if (!isset($Image->error)) {
          $Image->Resize(1024);
          $Image->SetType("Photo");
          $Image->Save();
          unset($Image);
        } else {
          $_SESSION['system_message'] = $Image->error;
          $_SESSION['system_message_navigation'] = "back";
          unset($Image);
          PrintSystemMessage();
        }
      }
    }
    unset($photos);
    */
  

  $avatars = &$db->query("set names utf8;");
  $avatars = &$db->query("select file from files where user_id =\"{$row[0]}\" and category='smallphoto' and deleted='0';");
  
  // Always check that result is not an error
  if (PEAR::isError($avatars)) {
    die($avatars->getMessage());
  }
  
  if ($row[3] != 'Riko') {
    echo "Processing avatars of {$row[3]}...\n<br>";
    
    while ($avatars->fetchInto($avatar)) {
      $file = file_get_contents("http://uranruda.ru/ff/{$avatar[0]}");
      file_put_contents("{$configuration['var']['tmp']}/file", $file);
      if ($file != "") {
        $_SESSION['UserId'] = $User->getId();
        $Image = new Brain_Image("{$configuration['var']['tmp']}/file");
        if (!isset($Image->error)) {
          $Image->Crop();
          $Image->Resize(100);
          if (!AmIInSystemGroupNamed($configuration['groups']['names']['public']['User']['Name'])) {
            $Image->MakeTransparent('0.2');
          }
          $Image->SetType("Avatar");
          $Image->Save();
          unset($Image);
        } else {
          $_SESSION['system_message'] = $Image->error;
          $_SESSION['system_message_navigation'] = "back";
          PrintSystemMessage();
        }
      }
    }
    echo "Memory used = " . memory_get_usage() . "\n<br>";
  }
  
  $logos = &$db->query("set names utf8;");
  $logos = &$db->query("select file from files where user_id =\"{$row[0]}\" and category='logo' and deleted='0';");
  
  // Always check that result is not an error
  if (PEAR::isError($logos)) {
    die($logos->getMessage());
  }
  if ($row[3] != 'Riko') {
    echo "Processing logos of {$row[3]}...\n<br>";
    while ($logos->fetchInto($logo)) {
      $file = file_get_contents("http://uranruda.ru/ff/{$logo[0]}");
      file_put_contents("{$configuration['var']['tmp']}/file", $file);
      if ($file != "") {
        $_SESSION['UserId'] = $User->getId();
        $Image = new Brain_Image("{$configuration['var']['tmp']}/file");
        if (!isset($Image->error)) {
          $Image->SetType("Logo");
          $Image->Save();
          unset($Image);
        } else {
          $_SESSION['system_message'] = $Image->error;
          $_SESSION['system_message_navigation'] = "back";
          PrintSystemMessage();
        }
      }
    }
    echo "Memory used = " . memory_get_usage() . "\n<br>";
  }
  
  echo "Processed user {$row[3]}...\n<br>";
  unset($Group);
  unset($Image);
  unset($User);
  unset($old_user);
  unset($row);
  unset($file);
  unset($logos);
  unset($avatars);
  echo "Memory used = " . memory_get_usage() . "\n<br>";
}

/*
Friends parser:
*/

$DomainUsers = UserQuery::create()->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
foreach ($DomainUsers as $DomainUser) {
  
  $_SESSION['UserId'] = $DomainUser->getId();
  $_SESSION['LoggedIn'] = TRUE;
  
  $MyFriendGroup = GroupQuery::create()->filterByOwnerId($DomainUser->getId())->filterByName($configuration['groups']['names']['user']['Introduced']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  
  $friends = &$db->query("set names utf8;");
  $friends = &$db->query("select touser from friends where fromuser=\"{$DomainUser->getOldId()}\" and status='1';");
  
  // Always check that result is not an error
  if (PEAR::isError($friends)) {
    die($friends->getMessage());
  }
  
  echo "Processing friends of {$DomainUser->getNickName()}...\n<br>";
  while ($friends->fetchInto($friend)) {
    $MyFriend = UserQuery::create()->filterByOldId($friend[0])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($MyFriend)) {
      $MyFriendGroup->addUser($MyFriend);
      $MyFriendGroup->Save();
      echo "added friend {$MyFriend->getNickName()}\n<br>";
    }
  }
  echo "Memory used = " . memory_get_usage() . "\n<br>";
  
  //get all posts by user:
  $entries = &$db->query("set names utf8;");
  $entries = &$db->query("select time,title,entry,showonfirst,id_entry,privacy_read from entries where uid =\"{$DomainUser->getOldId()}\";");
  
  // Always check that result is not an error
  if (PEAR::isError($entries)) {
    die($entries->getMessage());
  }
  
  while ($entries->fetchInto($entry)) {
    echo "post: {$entry[1]}<br>";
    $Post = new Post();
    $Post->setOldId($entry[4]);
    $Post->setOwnerId($DomainUser->getId());
    $Post->setType('Blog');
    $Post->setDate($entry[0]);
    $Post->setLastComment($entry[0]);
    $Post->setTitle($entry[1]);
    $Post->setText(messageparse($entry[2]));
    $Post->setShortText(CutTextAuto(messageparse($entry[2]), FALSE));
    $Post->setShowOnFirst($entry[3]);
    $Post->setStatus('Active');
    $Post->setDomain('beta.uranruda.ru');
    $Post->Save();
    $DomainUser->addPost($Post);
    $DomainUser->Save();
    if ($entry[5] == 0) {
      //public
      $GroupToAdd = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      AddPostToGroup($GroupToAdd->getId(), $Post->getId());
    } elseif ($entry[5] == 1) {
      //user only
      $GroupToAdd = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['public']['User']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      AddPostToGroup($GroupToAdd->getId(), $Post->getId());
    } elseif ($entry[5] == 2) {
      //friends only (Introduced and Friends)
      $GroupToAdd = GroupQuery::create()->filterByOwnerId($DomainUser->getId())->filterByName($configuration['groups']['names']['user']['Introduced']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      AddPostToGroup($GroupToAdd->getId(), $Post->getId());
      $GroupToAdd = GroupQuery::create()->filterByOwnerId($DomainUser->getId())->filterByName($configuration['groups']['names']['user']['Friend']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      AddPostToGroup($GroupToAdd->getId(), $Post->getId());
    } else {
      //personal post (do not add to any groups)
      $GroupToAdd = GroupQuery::create()->filterByOwnerId($DomainUser->getId())->filterByName($configuration['groups']['names']['user']['Private']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      AddPostToGroup($GroupToAdd->getId(), $Post->getId());
    }
    unset($GroupToAdd);
    //get all posts by user:
    $comments = &$db->query("set names utf8;");
    $comments = &$db->query("select uid,time,entry,uid_name from comments where eid =\"{$entry[4]}\" and onlyauthor='0';");
    // echo "<pre>";
    //print_r($comments);
    // Always check that result is not an error
    if (PEAR::isError($comments)) {
      die($comments->getMessage());
    }
    while ($comments->fetchInto($comment)) {
      echo "commented by: {$comment[3]}<br>";
      $MessageComment = new Message();
      $MessageComment->setType('Comment');
      $MessageComment->setDate($comment[1]);
      $MessageComment->setText(messageparse($comment[2]));
      $MessageComment->setStatus('Active');
      $MessageComment->setDomain('beta.uranruda.ru');
      if ($comment[0] != 0) {
        $Owner = UserQuery::create()->filterByOldId($comment[0])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
        if (isset($Owner)) {
          $MessageComment->setNickName($Owner->getNickName());
          $MessageComment->addUser($Owner);
        }
      } else {
        $MessageComment->setNickName($comment[3]);
      }
      //      $MessageComment->addPost($Post);
      $MessageComment->Save();
      $Post->addMessage($MessageComment);
      $Post->Save();
      unset($MessageComment);
      unset($comment);
      unset($MessageComment);
      unset($entry);
    }
    unset($friends);
    unset($MyFriendGroup);
    unset($friend);
    unset($MyFriend);
    unset($GroupToAdd);
    unset($Owner);
    unset($comments);
    unset($Post);
  }
  unset($entries);
}

?>

