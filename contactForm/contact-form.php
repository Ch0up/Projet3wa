<?php

use \JKosacki\Autoloader;
use \JKosacki\Validator;

require '../classes/autoloader.php';
Autoloader::register();
$errors = [];

$validator = new Validator($_POST);
$validator->check('prénom', 'required');
$validator->check('nom', 'required');
$validator->check('email', 'email');
$validator->check('email', 'required');
$validator->check('message', 'required');
$errors = $validator->getErrors();

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: ../loginHome.php');
} else {
    $_SESSION['success'] = 1;
    $headers = 'FROM: ' . $_POST['email'];
    mail('joris.kosacki@hotmail.fr', 'Message de : ' . $_POST['nom'] . ' ' . $_POST['prénom'], $_POST['message'],
        $headers);
    header('Location: ../loginHome.php');
}