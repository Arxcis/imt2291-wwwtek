<?php
if (!isset($_COOKIE['priorVisits'])) {
  setcookie('priorVisits', 1, time()+60*60*24);
  $message = "Velkommen førstegansbesøkende";
} else {
  setcookie('priorVisits', $_COOKIE['priorVisits']+1, time()+60*60*24);
  $message = "Velkommen til ditt {$_COOKIE['priorVisits']} besøk her."
}

if (isset($_GET['deletecookie'])) {
  setcookie('priorVisits', '', time()-3600);
  $message = "Jeg glemmer at du noen gang har vært her.";
}
?>

