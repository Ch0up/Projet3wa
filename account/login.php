<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;

require '../classes/Autoloader.php';
Autoloader::register();
$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if ($auth->user()) {
    App::redirect('../loginHome.php');
}
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if ($user) {
        $session->setFlash('success', "Vous êtes bien connecté");
        App::redirect('../loginHome.php');
    } else {
        $session->setFlash('danger', "Identifiant ou mot de passe incorrecte");
    }
}
?>
<?php require 'loginHome.php'; ?>

<div class="wrapper">
    <div class="container">
        <h2>Connexion</h2>
        <?php if (Session::getInstance()->hasFlashes()): ?>
            <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
                <div class="alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <form action="" method="POST" id="login-form" class="form">
            <input type="text" name="username" placeholder="Pseudo ou email" autocomplete="off" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <div class="form-check">
                <input class="form-check-input" id="remember-me" type="checkbox" name="remember" value="1"/>
                <label for="remember-me">Se souvenir de moi</label>
            </div>
            <button type="submit" id="login-button">Se connecter</button>
            <p class="message">Pas encore enregistré ? <a href="register.php">Crée un compte</a></p>
            <p class="message"><a href="forget.php">(J'ai oublié mon mot de passe)</a></p>
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