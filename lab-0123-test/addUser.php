<?php

require_once './vendor/autoload.php';
require_once "./classes/User.php";
require_once "./classes/DB.php";

$loader = new Twig_Loader_Filesystem('./twig_templates');
$twig = new Twig_Environment($loader, array(
    //'cache' => './compilation_cache',
));

$data = [];
if (!isset($_POST['username'])) {  // Changed from "addContact" to work with mink/GoutteDriver
  echo $twig->render('addUser.html', array());
} else {
  
  $data['username'] = $_POST['username'];
  $data['password'] = $_POST['password'];
  /*
  $data['firstname'] = $_POST['firstname'];
  $data['lastname'] = $_POST['lastname'];
  $data['nickname'] = $_POST['nickname'];
  $data['URLavatarimage'] = $_POST['URLavatarimage'];
  $data['URLhomepageurl'] = $_POST['URLhomepageurl'];*/

  $db = DB::getDBConnection('mysql:dbname=dev;host=127.0.0.1');
  /*
  if ($db==null) {
    // show error page and exit
  } */

  $user = new User($db);
  $res = $user->addUser($data);
  $res['data'] = $data;

  echo $twig->render('userAdded.html', $res);
}
