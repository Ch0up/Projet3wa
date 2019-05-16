<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;

require '../classes/Autoloader.php';
Autoloader::register();
if (!empty($_POST) && !empty($_POST['email'])) {
    $db = App::getDatabase();
    $auth = App::getAuth();
    $session = Session::getInstance();
    if ($auth->resetPassword($db, $_POST['email'])) {
        $session->setFlash('success', "Les instructions du rappel de mot de passe vous ont été envoyées par email");
        App::redirect('login');
    } else {
        $session->setFlash('danger', "Aucun compte ne correspond à cette adresse");
    }

}
?>

<?php require 'loginHome.php'; ?>

<div class="wrapper">
    <div class="container">
        <h2>Mot de passe oublié</h2>
        <?php if (isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <form action="" method="POST" id="login-form">
            <input type="email" name="email" placeholder="Email" required/>
            <button type="submit">Envoyer</button>
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