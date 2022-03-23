<?php
/*
   The group is system;
 */
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

        if ((isset($_GET['GetSizeSmall'])) and ($_GET['GetSizeSmall']=='1')) {
		if (isset($_SESSION['upload']['sizeSmall'])) {
                        $sizes = array(
                                'small' => $_SESSION['upload']['sizeSmall'],
                        );	
		} else {
			$sizes = array(
        			'small' => 800,
     			);
		}

			echo json_encode($sizes);
        }

	if ((isset($_POST['sizeSmall'])) and (ctype_digit($_POST['sizeSmall'])) and ($_POST['sizeSmall'] > 0) and ($_POST['sizeSmall'] <= '9999')) {
		$_SESSION['upload']['sizeSmall'] = $_POST['sizeSmall'];
	}
	if (isset($_POST['cropSmall'])) {
		if ($_POST['cropSmall'] == 'true') {
			$_SESSION['upload']['cropSmall'] = TRUE;
		} else {
			$_SESSION['upload']['cropSmall'] = FALSE;
		}
	}
	if (isset($_POST['desaturateSmall'])) {
		if ($_POST['desaturateSmall'] == 'true') {
			$_SESSION['upload']['desaturateSmall'] = TRUE;
		} else {
			$_SESSION['upload']['desaturateSmall'] = FALSE;
		}
	}
	if (isset($_POST['sharpenSmall'])) {
		if ($_POST['sharpenSmall'] == 'true') {
			$_SESSION['upload']['sharpenSmall'] = TRUE;
		} else {
			$_SESSION['upload']['sharpenSmall'] = FALSE;
		}
	}

	if ((isset($_POST['sizeBig'])) and (ctype_digit($_POST['sizeBig'])) and ($_POST['sizeBig'] > 0) and ($_POST['sizeBig'] <= '9999')) {
		$_SESSION['upload']['sizeBig'] = $_POST['sizeBig'];
	}
	if (isset($_POST['cropiBig'])) {
		if ($_POST['cropBig'] == 'true') {
			$_SESSION['upload']['cropBig'] = TRUE;
		} else {
			$_SESSION['upload']['cropBig'] = FALSE;
		}
	}
	if (isset($_POST['desaturateBig'])) {
		if ($_POST['desaturateBig'] == 'true') {
			$_SESSION['upload']['desaturateBig'] = TRUE;
		} else {
			$_SESSION['upload']['desaturateBig'] = FALSE;
		}
	}
	if (isset($_POST['sharpenBig'])) {
		if ($_POST['sharpenBig'] == 'true') {
			$_SESSION['upload']['sharpenBig'] = TRUE;
		} else {
			$_SESSION['upload']['sharpenBig'] = FALSE;
		}
	}

	/*
	   Upload image from ckeditor request:
	 */
	if (isset($_GET['upload'])) {
		if ($_GET['upload'] == 'image') {
			if (isset($_GET['CKEditorFuncNum'])) {
				$callback = $_GET['CKEditorFuncNum'];
			}
			if ((isset($_FILES['upload'])) and ($_FILES['upload']['error'] == '0')) {
				$ImageSmall = new Brain_Image($_FILES['upload']['tmp_name']);
				if (!isset($ImageSmall->error)) {
					if ((isset($_SESSION['upload']['cropSmall'])) and ($_SESSION['upload']['cropSmall'] == '1')) {
						$ImageSmall->Crop();
					}
					if ((isset($_SESSION['upload']['desaturateSmall'])) and ($_SESSION['upload']['desaturateSmall'] == '1')) {
						$ImageSmall->Desaturate();
					}
					if (isset($_SESSION['upload']['sizeSmall'])) {
						$ImageSmall->Resize($_SESSION['upload']['sizeSmall']);
					} else {
						$ImageSmall->Resize($configuration['image']['width']['small']);
					}
					if ((isset($_SESSION['upload']['sharpenSmall'])) and ($_SESSION['upload']['sharpenSmall'] == '1')) {
						$ImageSmall->Sharpen();
					}
					$ImageSmall->Save();
					$url = "{$configuration['static']['uri']}/{$ImageSmall->hash}.{$ImageSmall->format}";
				} else {
					$url = "";
					$msg = $ImageSmall->error;
				}

				$ImageBig = new Brain_Image($_FILES['upload']['tmp_name']);
				if (!isset($ImageBig->error)) {
					if ((isset($_SESSION['upload']['cropBig'])) and ($_SESSION['upload']['cropBig'] == '1')) {
						$ImageBig->Crop();
					}
					if ((isset($_SESSION['upload']['desaturateBig'])) and ($_SESSION['upload']['desaturateBig'] == '1')) {
						$ImageBig->Desaturate();
					}
					if (isset($_SESSION['upload']['sizeBig'])) {
						$ImageBig->Resize($_SESSION['upload']['sizeBig']);
					} else {
						$ImageBig->Resize($configuration['image']['width']['big']);
					}
					if ((isset($_SESSION['upload']['sharpenBig'])) and ($_SESSION['upload']['sharpenBig'] == '1')) {
						$ImageBig->Sharpen();
					}
					$ImageBig->Save();
					$url_big = "{$configuration['static']['uri']}/{$ImageBig->hash}.{$ImageBig->format}";
				} else {
					$url_big = "";
					$msg_big = $ImageBig->error;
				}
				$output = '
					<html>
					<body>
					<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $callback . ', "' . $url . '", function() {
							var element, dialog = this.getDialog();
							if (dialog.getName() == "image") {
							element = dialog.getContentElement( "Link", "txtUrl" );
							if ( element )
							element.setValue("' . $url_big . '");
							}
							});
				</script>
					</body>
					</html>';
				//unset($_SESSION['upload']);
				echo $output;
				exit();
			}
		} elseif ($_GET['upload'] == 'file') {
			if (isset($_GET['CKEditorFuncNum'])) {
				$callback = $_GET['CKEditorFuncNum'];
			} else {
				$callback = "";
			}
			if ((isset($_FILES['upload'])) and ($_FILES['upload']['error'] == '0')) {
				$Hash = hash_file('md5', $_FILES['upload']['tmp_name']);
				$Ext = implode('.', array_slice(explode('.', $_FILES['upload']['name']), - 1));
				copy($_FILES['upload']['tmp_name'], "{$configuration['path']['static']}/{$Hash}.{$Ext}");
				unlink($_FILES['upload']['tmp_name']);
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
				$url = "{$configuration['static']['uri']}/{$Hash}.{$Ext}";
				$output = "<html>
					<body>
					<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction( '{$callback}', '{$url}', '' );
				</script>
					</body>
					</html>";
				echo $output;
				exit();
			} else {
				echo 'failed';
				exit();
			}
		}
	}
} else {
        $_SESSION['system_message'] = "Доступ запрещен.";
        PrintSystemMessage('ok', '/');
}
?>
