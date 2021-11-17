<?php
function UpdateCache($uri = FALSE)
{
	if ((!isset($_SESSION['Freezed'])) or ($_SESSION['Freezed'] != TRUE)) {
		global $configuration, $dic, $smarty;
		if ($uri == FALSE) {
			$uri = $_SESSION['REQUEST_URI'];
		}
		$ext = implode('.', array_slice(explode('.', $uri), - 1));
		if ((isset($ext)) and ($ext != $uri)) {
			$dir = escapeshellcmd(dirname($uri));
			$filename = escapeshellcmd(basename($uri));
		} else {
			$dir = escapeshellcmd($uri);
			$filename = 'index.html';
		}

		/*
		   Escape shell characters like space etc.
		 */
		$shell_safe_uri = escapeshellcmd($uri);
		$Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($uri)->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
		if (!isset($Page)) {

			 /*
			   Delete cached page.
			 */
			if (is_file("{$configuration['path']['cache']}{$dir}/{$filename}")) {
				unlink("{$configuration['path']['cache']}{$dir}/{$filename}");
			}

			
                         /*
                           Delete clean html page.
                         */
                        if (is_file("{$configuration['path']['cleanhtml']}{$dir}/{$filename}")) {
                                unlink("{$configuration['path']['cleanhtml']}{$dir}/{$filename}");
                        }
		} else {

			/*
			   Save cache:
			 */
			if (!is_dir("{$configuration['path']['cache']}{$dir}")) {
				mkdir("{$configuration['path']['cache']}{$dir}", 0777, TRUE);
			}
			$smarty->assign('Title', $Page->getTitle());
			$smarty->assign('Tags', $Page->getTags());
			$Body  = '';
			$Body .= $smarty->fetch("Head.tpl.html");
			$Body .= "<body>";
			$Body .= $smarty->fetch('SiteBrushLink.tpl.html');
			$Body .= $Page->getText();
			$Body .= "</body></html>";
			file_put_contents("{$configuration['path']['cache']}{$dir}/{$filename}", $Body);


		   
                        /*
                           Save clean html:
                         */
                        if (!is_dir("{$configuration['path']['cleanhtml']}{$dir}")) {
                                mkdir("{$configuration['path']['cleanhtml']}{$dir}", 0777, TRUE);
                        }
                        $smarty->assign('Title', $Page->getTitle());
                        $smarty->assign('Tags', $Page->getTags());
                        $Body  = '';
                        $Body .= $smarty->fetch("Head.tpl.html");
                        $Body .= "<body>";
                        $Body .= $Page->getText();
                        $Body .= "</body></html>";
                        file_put_contents("{$configuration['path']['cleanhtml']}{$dir}/{$filename}", $Body);

		}
	}
}
?>
