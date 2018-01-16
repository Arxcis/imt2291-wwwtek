<?php

require_once "./pinterest.php";
require_once './vendor/autoload.php'; // load twig if 



$images = Pinterest::getPins("mathematical riddles fun");

//header("content-type: text/plain");
//print_r($images);

$loader = new Twig_Loader_Filesystem('./template');
$twig   = new Twig_Environment($loader, array(
  //'cache' => './cache'
));

echo $twig->render('pinterest.tpl', array(

    'images' => $images,
    'title' => "Pinterest.html - index.php",
));