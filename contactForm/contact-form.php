<?php

use \JKosacki\Autoloader;
use \JKosacki\Validator;
use \JKosacki\Session;

require '../classes/Autoloader.php';
Autoloader::register();
$errors = [];

$validator = new Validator($_POST);
$validator->check('prénom', 'required');
$validator->check('nom', 'required');
$validator->check('email', 'email');
$validator->check('email', 'required');
$validator->check('message', 'required');
$errors = $validator->getErrors();

$session = Session::getInstance();

if (!empty($errors)) {
    foreach ($errors as $error) {
        $session->setFlash('danger', "$error");
    }
    $_SESSION['inputs'] = $_POST;
    header('Location: ../#contact');
} else {
    $session->setFlash('success', "Votre message a bien été envoyé");
    $headers = 'FROM: ' . $_POST['email'];
    mail('joris.kosacki@hotmail.fr', 'Message de : ' . $_POST['nom'] . ' ' . $_POST['prénom'], $_POST['message'],
        $headers);
    header('Location: ../#contact');
}