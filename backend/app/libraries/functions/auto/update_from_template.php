<?php
function UpdateFromTemplate($HTML)
{
	global $configuration, $smarty;
	//Get template elements on the page and link them to current page + update same template elements on other linked pages:
	$html = new simple_html_dom();
	$html->load($HTML);
	foreach ($html->find("[class={$configuration['template']['marker']}]") as $TemplateElement) {
		$TemplateName = $TemplateElement->getAttribute('class');
		$TemplateData = $TemplateElement->outertext;
		$Template     = TemplateQuery::create()->filterByName($TemplateName)->filterByDomain($configuration['domain'])->filterByStatus("Active")->findOneOrCreate();
		if (isset($Template)) {

			//Link template to current post:
			$CurrentPost = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByVersion('desc')->findOne();
			if (isset($CurrentPost)) {
				$CurrentPost->addTemplate($Template);
				$CurrentPost->Save();
			}
			//If template changed - update template and all posts:
			if ((md5($Template->getData())) != (md5($TemplateData))) {
				$Template->setData($TemplateData);
				$Template->Save();
				//Update only latest linked posts with contents of this template:
				$LinkedPosts = $Template->getPosts();
				if ((isset($LinkedPosts)) and (count($LinkedPosts) > 0)) {
					foreach ($LinkedPosts as $LinkedPost) {
						$RequestUri[] = $LinkedPost->getRequestUri();
					}
					foreach (array_unique($RequestUri) as $UniqUri) {
					
					exec("{$configuration['backend']['path']}/bin/update-from-template \"{$configuration['domain']}\" \"{$TemplateName}\" \"{$UniqUri}\"");
					}
				}
			}
		}
	}
}
?>
