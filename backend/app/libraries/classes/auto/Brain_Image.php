<?php 
if (!isset($configuration)) {
	exit('No direct script access allowed');
}

/**
 * Image Manipulation class
 *
 * @name           Brain_Image
 * @subpackageof   Brain Framework
 * @path  	   libraries/classes
 * @category       Media/Images
 * @author         Matthew Gladkikh
 * @link           http://brain.dev/user_guide/libraries/classes/Brain_Image.html
 *
 * required variables: 
 * $configuration['path']['tmp'] 
 * $configuration['path']['static']
 */
class Brain_Image
{
	var $source;

	/*
	   Default function:
	 */
	function Brain_Image($source = FALSE)
	{
		global $configuration;
		$this->configuration = $configuration;
		//$this->Test();
		//exit();
		$size = getimagesize($source);
		if ($size == "") {
			$this->error = 'Error: Not an image';
			return $this->error;
			exit(1);
		}
		if ((isset($source)) and ($source != FALSE)) {
			$this->source = $source;
			$this->GetExif();
			$this->MakeSafe();
			$this->AutoRotate();
		}
	}

	/*
	   Default unit test
	 */
	function Test()
	{
		/*
		   Prepare to make unit tests: 
		 */
		$this->testimage['format'] = array(
				'jpeg',
				'gif',
				'png',
				'tif',
				'bmp',
				);
		$this->testimage['jpeg']['source'] = "{$this->configuration['backend']['tests']}/src/test.jpeg";
		$this->testimage['jpeg']['hash'] = array(
				'original'    => 'e6ef4b4513c328d08b3c5a8966e6e466',
				'autorotated' => '12917353e2751536de73bece408b8602',
				'safe'        => 'ce022d6787bf05fe5c2af9d930b58aa2',
				'resized'     => '080f83fdae92ef48bc91689cc9091606',
				'rotated'     => '4a82506e30a0d2b39813f0ec988981c7',
				'croped'      => '38b933a69d29e003f3f5ea1b3c3785be',
				'desaturated' => '3d0f1d924e231ff9a0e08ae47295fd7c',
				'sharpen'     => 'e518d9a1e37c9488a26419de2b8a4017',
				);
		$this->testimage['gif']['source'] = "{$this->configuration['backend']['tests']}/src/test.gif";
		$this->testimage['gif']['hash'] = array(
				'original'    => '44f15662c45e4a7dce811d03eea0c2b2',
				'autorotated' => '009cc346907f926f5cdb0b4ecf851fe3',
				'safe'        => '009cc346907f926f5cdb0b4ecf851fe3',
				'resized'     => 'ae5050395b88abbcd871b8e9246cebae',
				'rotated'     => 'e8603d40c9c1793dc42e4589c63529a0',
				'croped'      => 'b549af6207fa6bf9ea82c1453a79c89b',
				'desaturated' => '9cc7c3526c2bd6e7252daa3e19247e69',
				'sharpen'     => 'ae5050395b88abbcd871b8e9246cebae',
				);
		$this->testimage['png']['source'] = "{$this->configuration['backend']['tests']}/src/test.png";
		$this->testimage['png']['hash'] = array(
				'original'    => 'd59a9dca030ada4d7e5835b991293000',
				'autorotated' => '5007158621eaeed45b417db9391590b5',
				'safe'        => '5007158621eaeed45b417db9391590b5',
				'resized'     => 'f176909c01fd229dcda347e2dd72939b',
				'rotated'     => '625c31d07a24c2c0a223fbee7d7a0ee1',
				'croped'      => 'f09bd33fc8e6f422269a2149589b5bf1',
				'desaturated' => '3e7e765259f05d77c2bbd0479d3125ca',
				'sharpen'     => 'a4d05d6e262bb581945a249976cad6e6',
				);
		$this->testimage['tif']['source'] = "{$this->configuration['backend']['tests']}/src/test.tif";
		$this->testimage['tif']['hash'] = array(
				'original'    => 'be42c81505f2c9ef70994c60915a3f12',
				'autorotated' => 'ba6045682c57edb94dfc0cea1df28f80',
				'safe'        => 'ba6045682c57edb94dfc0cea1df28f80',
				'resized'     => 'a0fecdd1ab60ab4a923bf9915dba3b3d',
				'rotated'     => 'b53cedd52d4558de5c186fe37e5c72d4',
				'croped'      => '003ed747b1e484f73b193bd41ff97ed8',
				'desaturated' => 'dc3e29a17275f114c88d9443fb349d5d',
				'sharpen'     => 'c3c5c755733fed6845c304e8616864a4',
				);
		$this->testimage['bmp']['source'] = "{$this->configuration['backend']['tests']}/src/test.bmp";
		$this->testimage['bmp']['hash'] = array(
				'original'    => 'f6f23243418af7f646c14dfe0ae9bc49',
				'autorotated' => '1ec3f9514d40b0b59d7b7f3fa80e86c3',
				'safe'        => '1ec3f9514d40b0b59d7b7f3fa80e86c3',
				'resized'     => 'aec9b511807bdacc62666cecb5d72621',
				'rotated'     => 'bd07ed60858fc6e46183699a80657086',
				'croped'      => '64f55ed11c4adc82bd7a68c99848e9e2',
				'desaturated' => 'a4f45a136e0ab1e1634a871372f3e339',
				'sharpen'     => '7c17880bd13cecafc5e28fbb005fc127',
				);


		$this->name = get_class($this);
		echo "<h1>{$this->name} tests:</h1>";

		/* randomize order of tests */
		shuffle($this->testimage['format']);
		foreach ($this->testimage['format'] as $format) {

			/* Test 1 */
			$testname = "{$format} -> check original hash";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['original'] == $this->originalhash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "hash: {$this->originalhash}<br><br><hr>";
			}

			//Test 2
			$testname = "{$format} -> MakeSafe()";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['safe'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}

			//Test 3
			$testname = "{$format} -> AutoRotate()";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->AutoRotate();
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['autorotated'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				if (isset($this->orientation)) {
					echo "ExifOrientation={$this->orientation}<br>";
				}
				if (isset($this->angle)) {
					echo "this -> Rotate('{$this->angle}')<br>";
				}
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}

			//Test 4
			$testname = "{$format} -> Rotate(90)";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->Rotate('90');
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['rotated'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}

			//Test 5
			$testname = "{$format} -> Resize(100)";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->Resize(100);
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['resized'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}

			//Test 6
			$testname = "{$format} -> Crop()";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->Crop();
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['croped'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}

			//Test 7
			$testname = "{$format} -> Desaturate()";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->Desaturate();
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['desaturated'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}

			//Test 8
			$testname = "{$format} -> Sharpen()";
			$this->source = $this->testimage[$format]['source'];
			$this->GetExif();
			$this->MakeSafe();
			$this->Resize(100);
			$this->Sharpen();
			$this->GetInfo();
			if ($this->testimage[$format]['hash']['sharpen'] == $this->hash) {
				echo "{$testname} - <font color='green'>ok</font><br><hr>";
			} else {
				$this->Save();
				echo "{$testname} - <font color='red'>fail</font><br>";
				echo "{$this->hash}<br>";
				echo "<img src=\"/f/{$this->hash}.{$this->format}\"><br><br><hr>";
			}
			echo "<br>";
		}
	}

	/*
	   To enable exif-support configure PHP with --enable-exif
	   Attempt to automatically rotate the image based on exif data
	   a lot of digital cameras store orientation data of the camera
	   this will use that to automatically fix an images orientation
Note: This will only work if you have the function exif_read_data
which is part of PHPs exif data extension

Available data array:
DateTime                (human time eg 2010:08:30 06:43:38 use strtotime() to make timestamp )
Make                    (eg Canon)
Model                   (eg Canon EOS 350D DIGITAL)
Orientation             (numbers from 1 to 8)
Flash                   (eg 16)
ExposureTime            (eg 1/160)
FNumber                 (eg 71/10)
ISOSpeedRatings         (eg 400)
FocalLength             (eg 18/1)
['COMPUTED'] array      
IsColor		  (0 or 1)
CCDWidth      	  (eg 22mm)
ApertureFNumber   (eg f/7.1)
Height            (eg 1024)
Width             (eg 768)
	 */
	function GetExif()
	{
		if (function_exists('exif_read_data')) {
			$this->insecure = new Imagick($this->source);
			$this->format = strtolower($this->insecure->getImageFormat());
			if (($this->format == "jpeg") or ($this->format == "jpg") or ($this->format == "tiff") or ($this->format == "tif")) {
				$this->exif = exif_read_data($this->source);
			} else {
				unset($this->exif);
			}
		}
	}

	/*
	   Set image type: Avatar, Image or other.	
	 */
	function SetType($Type = FALSE)
	{
		if ($Type != FALSE) {
			$this->type = $Type;
		} else {
			unset($this->type);
		}
	}

	/*
	   Save image object
	 */
	function Save($Path = FALSE)
	{
		$this->GetInfo();
		if ($Path == FALSE) {
			$Path = "{$this->configuration['path']['static']}";
		}

		if ($this->format == "gif") {
			$this->safeimage->writeImages("{$Path}/{$this->hash}.{$this->format}", true);
		} else {
			$this->safeimage->writeImage("{$Path}/{$this->hash}.{$this->format}");
		}
		if (file_exists("{$Path}/{$this->hash}.{$this->format}")) {
			$Media = new Media();
			if ((isset($this->type)) and ($this->type != FALSE)) {
				$Media->setType($this->type);
			} else {
				$Media->setType("Image");
			}
			$Media->setHash("{$this->hash}");
			$Media->setOriginalHash($this->originalhash);
			$Media->setFormat($this->format);
			$Media->setWidth($this->safeimage->getImageWidth());
			$Media->setHeight($this->safeimage->getImageHeight());
			$Media->setStatus("Active");
			$Media->setDomain($this->configuration['domain']);
			if (isset($this->exif['DateTime'])) {
				$Media->setDate(strtotime($this->exif['DateTime']));
				$Media->setDay(date("Ymd", strtotime($this->exif['DateTime'])));
			} else {
				$CurrentTime = time();
				$Media->setDate($CurrentTime);
				$Media->setDay(date("Ymd", $CurrentTime));
			}
			$Media->setBytesUsed(filesize("{$Path}/{$this->hash}.{$this->format}"));
			$Media->Save();
			$this->media_id=$Media->getId();
			$User = UserQuery::create()->findPk($_SESSION['UserId']);
			$User->addMedia($Media);
			if (isset($this->type)and($this->type == "Avatar")) {
				$User->setAvatarId($Media->getId());
			}
			$User->Save();
		}
	}

	/*
	   Get meta data like: hash, original hash, width, height;
	 */
	function GetInfo()
	{
		$this->originalhash = hash_file('md5', $this->source);
		$this->hash         = hash('md5', $this->safeimage->getimageblob());
		$this->width        = $this->safeimage->getImageWidth();
		$this->height       = $this->safeimage->getImageHeight();
	}

	/*
	   Some stupid function delete image object
	 */
	function Delete()
	{
		if (file_exists("{$this->configuration['path']['static']}/{$this->hash}.{$this->format}")) {
			unlink("{$this->configuration['path']['static']}/{$this->hash}.{$this->format}");
		}
	}

	/*
	   Sharpen image
	 */
	function Sharpen()
	{
		if (($this->format != "gif") and (isset($this->resized)) and ($this->resized = TRUE)) {
			$this->safeimage->SharpenImage(1, 1);
		}
	}

	/*
	   Resize image by width or height (the one which is higher).
	 */
	function Resize($Size)
	{
		$resize = $this->safeimage->clone();
		$this->width = $this->safeimage->getImageWidth();
		if ($this->width > $Size) {
			if ($this->format != "gif") {
				if (isset($Size)) {
					$resize->thumbnailImage($Size, $Size, true);
				}
			} else {
				if (isset($Size)) {
					$ResizedGif = new Imagick();
					$newresize  = $resize->coalesceImages();
					$resize     = $newresize;
					foreach ($resize as $frame) {
						$frame->thumbnailImage($Size, $Size, true);
						$frame_page = $frame->getImagePage();
						$frame->setImagePage($frame_page['width'], $frame_page['height'], 0, 0);
						$ResizedGif->addImage($frame->getImage());
					}
					$resize = $ResizedGif;
				}
			}
			$this->resized = TRUE;
		} else {
			$this->resized = FALSE;
		}
		$this->safeimage = $resize;
	}

	/*
	   Make image grayscale (desaturate)
	 */
	function Desaturate()
	{
		$grey = $this->safeimage->clone();
		if ($this->format != "gif") {
			//$grey->setImageColorspace(2);
			$grey->modulateImage(100, 0, 100);
		} else {
			$GreyGif = new Imagick();
			$newgrey = $grey->coalesceImages();
			$grey    = $newgrey;
			foreach ($grey as $frame) {
				//$frame->setImageColorspace(2);
				$frame->modulateImage(100, 0, 100);
				$GreyGif->addImage($frame->getImage());
			}
			$grey = $GreyGif;
		}
		$this->safeimage = $grey;
	}

	/*
	   Make image transparent (set opacity)
	 */
	function MakeTransparent($TransparencyValue="0.2")
	{
		$transparent = $this->safeimage->clone();
		if ($this->format != "gif") {
			$this->format="png";
			$transparent->setFormat($this->format);
			$transparent->setImageOpacity($TransparencyValue); 
		} else {
			$TransparentGif = new Imagick();
			$this->format="png";
			$newtransparent = $transparent->coalesceImages();
			$transparent    = $newtransparent;
			foreach ($transparent as $frame) {
				$frame->setImageColorspace(2);
				$frame->setFormat($this->format);
				$frame->setImageOpacity($TransparencyValue);
				$TransparentGif->addImage($frame->getImage());

			}
			$transparent = $TransparentGif;
			$transparent->setFormat($this->format);
		}
		$this->safeimage = $transparent;
	}


	/*
	   Crop image
	 */
	function Crop()
	{
		$crop         = $this->safeimage->clone();
		$this->width  = $crop->getImageWidth();
		$this->height = $crop->getImageHeight();

		if ($this->width > $this->height) {
			$cropby = $this->height;
		} elseif ($this->height > $this->width) {
			$cropby = $this->width;
		} else {
			$cropby = FALSE;
		}

		if ((isset($cropby)) and ($cropby != FALSE)) {
			if ($this->format != "gif") {
				$crop->cropThumbnailImage($cropby, $cropby);
			} else {
				if (isset($cropby)) {
					$ResizedGif = new Imagick();
					$newcrop    = $crop->coalesceImages();
					$crop       = $newcrop;
					foreach ($crop as $frame) {
						$frame->cropThumbnailImage($cropby, $cropby);
						$frame->setImagePage($cropby, $cropby, 0, 0);
						$ResizedGif->addImage($frame->getImage());
					}
					$crop = $ResizedGif;
				}
			}
			$this->croped = TRUE;
		} else {
			$this->croped = FALSE;
		}
		$this->safeimage = $crop;
	}

	/*
	   Rotate image object
	 */
	function Rotate($Degree = FALSE)
	{
		if ($Degree != FALSE) {
			if ($this->format == "gif") {
				// rotate each frame in animated gif and recreate the gif
				$buffer = new Imagick();
				foreach ($this->safeimage as $frame) {
					$frame->rotateImage(new ImagickPixel(), $Degree);
					$buffer->addImage($frame->getImage());
				}
			} else {
				$this->safeimage->rotateImage(new ImagickPixel(), $Degree);;
				$buffer = $this->safeimage->getImage();
			}
			$this->safeimage = $buffer;
		}
	}

	/*
	   Rotates image based on jpeg/tiff exif information.
	 */
	function AutoRotate()
	{
		if ((isset($this->exif['Orientation'])) and (is_numeric($this->exif['Orientation']))) {
			switch ($this->exif['Orientation']) {
				case 1:
					unset($angle);
					break;



				case 3:
					$angle = '180';
					break;



				case 6:
					$angle = '90';
					break;



				case 8:
					$angle = '-90';
					break;
			}
			if (isset($angle)) {
				$this->Rotate($angle);
			}
		}
	}

	/*
	   Function to cleanup injected scripts from imagick 
	   object "$insecure", making object safe next manipulations.
	 */
	function MakeSafe()
	{
		$this->insecure     = new Imagick($this->source);
		$this->originalhash = hash_file('md5', $this->source);
		$this->format       = strtolower($this->insecure->getImageFormat());

		/* convert to bmp to remove injected php/js... and */
		if (($this->format == "jpg") or ($this->format == "jpeg")) {
			$this->insecure->setImageFormat("bmp");
			$this->insecure->writeImage("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");

			/* get secure image */
			$this->safeimage = new Imagick("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");

			/* delete temporary bmp */
			unlink("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");
			$this->safeimage->setImageFormat('jpeg');
			$this->safeimage->setImageCompressionQuality(95);
		} elseif ($this->format == "gif") {

			/* convert each frame in animated gif and recreate the gif */
			$this->safeimage = new Imagick();
			foreach ($this->insecure as $frame) {
				$frame_delay = $frame->getImageDelay();

				/* get timing */
				$frame_page = $frame->getImagePage();

				/* get offsets and geometry of the frames */
				$frame->setImageFormat("bmp");
				$frame->writeImage("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");
				$safeframe = new Imagick("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");
				$safeframe->setImageDelay($frame_delay);
				$safeframe->setImagePage($frame_page['width'], $frame_page['height'], $frame_page['x'], $frame_page['y']);
				$safeframe->setImageFormat('gif');
				$this->safeimage->addImage($safeframe->getImage());
			}
			unlink("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");
		} else {

			$this->insecure->setImageFormat("bmp");
			$this->insecure->writeImage("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");

			/* get secure image */
			$this->safeimage = new Imagick("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");

			/* delete temporary bmp */
			unlink("{$this->configuration['path']['tmp']}/{$this->originalhash}.bmp");

			/* set format to png as we do not want to store tiff/bmp files */
			$this->format = "png";
			$this->safeimage->setImageFormat('png');
		}
	}
	//return safe object
	//return $this->safeimage;
}
?>
