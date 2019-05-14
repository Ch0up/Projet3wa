<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;
use \JKosacki\Validator;


require '../classes/Autoloader.php';
Autoloader::register();

if (!empty($_POST)) {

    $errors = [];

    $db = App::getDatabase();
    $validator = new Validator($_POST);
    $validator->isAlpha('username', "Votre pseudo n'est pas valide");
    if ($validator->isValid()) {
        $validator->isUniq('username', $db, 'users', "Ce pseudo est déjà pris");
    }
    $validator->isEmail('email', "Votre email n'est pas valide");
    if ($validator->isValid()) {
        $validator->isUniq('email', $db, 'users', "Cet email est déjà utilisé pour un autre compte");
    }
    $validator->isConfirmed('password', "Vous devez rentrer un mot de passe valide");


    if ($validator->isValid()) {

        App::getAuth()->register($db, $_POST['username'], $_POST['password'], $_POST['email']);
        Session::getInstance()->setFlash('success',
            "Un email de confirmation vous a été envoyé pour valider votre compte");
        App::redirect('login.php');
    } else {
        $errors = $validator->getErrors();
    }
}
?>
<?php require 'loginHome.php'; ?>

<div class="wrapper">
    <div class="container">
        <h2>S'enregister</h2>
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <div class="alert-danger">
                    <?= $error; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <form action="register.php" method="POST" id="register-form">
            <label for="username"></label>
            <input id="username" type="text" name="username" placeholder="Pseudo" autocomplete="off" required/>
            <label for="password"></label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required/>
            <label for="password_confirm"></label>
            <input id="password_confirm" type="password" name="password_confirm"
                   placeholder="Confirmation du mot de passe" required/>
            <label for="email"></label>
            <input id="email" type="email" name="email" placeholder="E-mail" autocomplete="off" required/>
            <button type="submit">Créer</button>
            <p class="message">Déjà enregistré ? <a href="login.php">Se connecter</a></p>
        </form>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
