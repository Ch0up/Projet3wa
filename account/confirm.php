<?php
require '../classes/autoloader.php';
Autoloader::register();
$db = App::getDatabase();

if (App::getAuth()->confirm($db, $_GET['id'], $_GET['token'])) {
    Session::getInstance()->setFlash('success', "Votre compte a bien été validé");
    App::redirect('../home.php');
} else {
    Session::getInstance()->setFlash('danger', "Ce token n'est plus valide");
    App::redirect('login.php');
}