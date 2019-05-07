<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;

require '../classes/autoloader.php';
Autoloader::register();
App::getAuth()->logout();
Session::getInstance()->setFlash('success', "Vous êtes maintenant déconnecté");
App::redirect('login.php');