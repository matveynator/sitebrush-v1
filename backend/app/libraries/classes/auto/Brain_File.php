<?php 
if (!isset($configuration)) {
  exit('No direct script access allowed');
}

/**
 * Image Manipulation class
 *
 * @name           Brain_File
 * @subpackageof   Brain Framework
 * @path  	   libraries/classes
 * @category       Media/Images
 * @author         Matthew Gladkikh
 * @link           http://brain.dev/user_guide/libraries/classes/Brain_File.html
 *
 * required variables: 
 * $configuration['var']['tmp'] 
 * $configuration['frontend']['static']['path']
 */
class Brain_File
{
  var $source;

  /*
  Default function:
  */
  function Brain_File($source = FALSE)
  {
    global $configuration;
    $this->configuration = $configuration;
    if ((isset($source)) and ($source != FALSE)) {
      $this->source = $source;
      $this->format = 'txt';
      $this->MakeSafe();
      $this->AutoRotate();
    }
  }

  /*
  Save file object
  */
  function Save($Path = FALSE)
  {
    if ($Path == FALSE) {
      $Path = ".{$this->configuration['frontend']['static']['path']}";
    }
    
    $this->safeimage->writeImage("{$Path}/{$this->hash}.{$this->format}");
    if (file_exists("{$Path}/{$this->hash}.{$this->format}")) {
      $Media = new Media();
      $Media->setType("File");
    }
    $Media->setHash("{$this->hash}");
    $Media->setOriginalHash($this->originalhash);
    $Media->setFormat('zip');
    $Media->setStatus("Active");
    $Media->setDomain($this->configuration['domain']);
    $CurrentTime = time();
    $Media->setDate($CurrentTime);
    $Media->setDay(date("Ymd", $CurrentTime));
    $Media->setBytesUsed(filesize("{$Path}/{$this->hash}.{$this->format}"));
    $Media->Save();
    $this->media_id = $Media->getId();
    $User = UserQuery::create()->findPk($_SESSION['UserId']);
    $User->addMedia($Media);
    $User->Save();
  }

  /*
  Get meta data like: hash, original hash, width, height;
  */
  function GetInfo()
  {
    $this->originalhash = hash_file('md5', $this->source);
    $this->hash = hash('md5', $this->safeimage->getimageblob());
  }

  /*
  Some stupid function delete image object
  */
  function Delete()
  {
    if (file_exists("{$this->configuration['frontend']['static']['path']}/{$this->hash}.{$this->format}")) {
      unlink("{$this->configuration['frontend']['static']['path']}/{$this->hash}.{$this->format}");
    }
  }

  /*
  Function to cleanup injected scripts from file 
  object "$insecure", making object safe next manipulations.
  */
  function MakeSafe()
  {
    $this->insecure     = new Imagick($this->source);
    $this->originalhash = hash_file('md5', $this->source);
    $this->format       = strtolower($this->insecure->getImageFormat());
    
    unlink("{$this->configuration['var']['tmp']}/{$this->originalhash}.bmp");
  }
  //return safe object
}
?>
