<?php
require '../classes/autoloader.php';
Autoloader::register();
App::getAuth()->logout();
Session::getInstance()->setFlash('success', "Vous êtes maintenant déconnecté");
App::redirect('login.php');