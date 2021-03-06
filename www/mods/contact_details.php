<?php

// TODO: move these Romanian names in a localization file
$details_titles = array(
  "website"  => "Site",    // actually, English
  "email"    => "E-mail",  // actually, English
  "phone"    => "Telefon",
  "address"  => "Adresă",
  "facebook" => "Facebook",
	"twitter"  => "Twitter"
);

$t = new Smarty();
$t->caching = 1;

if (!$t->is_cached('person_contact_details.tpl', $person->id)) {
  $t->assign('id', $person->id);
  $t->assign('person_id', $person->id);
  $t->assign('title', $title);
  $t->assign('details_titles', $details_titles);

  $details_hash = $person->getContactDetails();

  $has_details = false;
  foreach ($details_hash as $key => $value) {
    $t->assign($key, $value);
    if (count($value) > 0) {
      $has_details = true;
    }
  }
}
$t->display('person_contact_details.tpl', $person->id);
?>
