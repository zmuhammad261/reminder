<?php
error_reporting(0);
session_start();
include 'includes/config.php';

    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $url = trim($uri, '/');

if(strlen($_SESSION['alogin'])==0)
    {
      include_once('home.php');
  die();
}

  function strn($string){
    $string= str_replace('-', ' ', trim($string));
       $string = ucwords($string);

    return $string;
}

if($url=='' || $url=='index' || $url=='home'){
include_once('home.php');
  die();
}



$url_ar = ['dashboard','manage-conactusquery','profile','edit-profile','profile-image','logout'];

if(in_array($url, $url_ar)){
include_once($url.'.php');
    $flage = true;
die();
}

  else{
include_once("404.php");
    // print_r($url_ar);
die();
  }

?>