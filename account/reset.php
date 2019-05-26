<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;
use \JKosacki\Validator;

require '../classes/Autoloader.php';
Autoloader::register();
if (isset($_GET['id']) && isset($_GET['token'])) {
    $auth = App::getAuth();
    $db = App::getDatabase();
    $session = Session::getInstance();
    $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);
    if ($user) {
        if (!empty($_POST)) {
            $validator = new Validator($_POST);
            $validator->isConfirmed('password');
            if ($validator->isValid()) {
                $password = $auth->hashPassword($_POST['password']);
                $db->query('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?',
                    [$password, $_GET['id']]);
                $session->setFlash('success', "Votre mot de passe a bien été modifié");
                App::redirect('login');
            }
            else {
                $session->setFlash('danger', "Les mots de passe ne correspondent pas");
            }
        }
    } else {
        Session::getInstance()->setFlash('danger', "Ce token n'est pas valide");
        App::redirect('login');
    }
} else {
    App::redirect('login');
}
?>
<?php require 'loginHome.php'; ?>

<div class="wrapper">
    <div class="container">
        <h2>Réinitialisation</h2>
        <?php if (Session::getInstance()->hasFlashes()): ?>
            <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
                <div class="alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <form method="POST" id="login-form">
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <input type="password" name="password_confirm" placeholder="Confirmation du mot de passe" required/>
            <button type="submit">Réinitialiser</button>
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

<?php require 'loginHomeFooter.php'; ?>
