<?php

include_once('hp-includes/rss_class.php');
include_once('hp-includes/person_class.php');
include_once('hp-includes/url_functions.php');

$id = $_GET['id'];

// Given the ID of a person, go through it's history and load all
// the mods (modules) in the respective directories.
$person = new Person();
$person->setId($id);
$person->loadFromDb();

$declarations = $person->searchDeclarations('', 0, 10, false, 'all');

if (sizeof($declarations) > 0) {
	
  $title = "Declaratii ".$person->displayName;
  $linkPath = $person->getPersonDeclarationsUrl();
  $description = "Fluxul declarațiilor lui ".$person->displayName;
  $rssDeclarationUrl = $person->getRssDeclarationUrl();
  $rss = new Rss($title,$linkPath,$description,$rssDeclarationUrl);
  
  foreach ($declarations as $declaration) {
  	$declarationText = trim($declaration['declaration']);
    $rssItemPubDate = gmdate(DATE_RSS, $declaration['time']);
    $rssItemTitle = $person->displayName.": ".$declarationText;
    $rssItemDescription = $declarationText;
	$rssItemLink = $person->getDeclarationUrl($declaration['id']);
	$rss->addRssItem($rssItemTitle,$rssItemDescription,$rssItemLink,$rssItemPubDate);
  }
  
  $rss->printRssSmarty();
}

?>
