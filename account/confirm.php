<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;

require '../classes/Autoloader.php';
Autoloader::register();
$db = App::getDatabase();

if (App::getAuth()->confirm($db, $_GET['id'], $_GET['token'])) {
    Session::getInstance()->setFlash('success', "Votre compte a bien été validé");
    App::redirect('login');
} else {
    Session::getInstance()->setFlash('danger', "Ce token n'est plus valide");
    App::redirect('login');
}