

<?php

require_once '../../twig/vendor/autoload.php';
require_once './classes/Contacts.php';

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array());

$contacts = new Contacts();
$res = $contacts->listContacts();

echo $twig->render('listContacts.html', array( 
  'res' => $res
);