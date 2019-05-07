<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Session;
use \JKosacki\Validator;


require '../classes/autoloader.php';
Autoloader::register();
if (isset($_GET['id']) && isset($_GET['token'])) {
    $auth = App::getAuth();
    $db = App::getDatabase();
    $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);
    if ($user) {
        if (!empty($_POST)) {
            $validator = new Validator($_POST);
            $validator->isConfirmed('password');
            if ($validator->isValid()) {
                $password = $auth->hashPassword($_POST['password']);
                $db->query('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?',
                    [$password, $_GET['id']]);
                $auth->connect($user);
                Session::getInstance()->setFlash('success', "Votre mot de passe a bien été modifié");
                App::redirect('login.php');
            }
        }
    } else {
        Session::getInstance()->setFlash('danger', "Ce token n'est pas valide");
        App::redirect('login.php');
    }
} else {
    App::redirect('login.php');
}
?>
<?php require 'loginHome.php'; ?>

<div class="login-page">
    <div class="form">
        <h2>Réinitialisation</h2>
        <?php if (isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <form action="" method="POST" id="login-form">
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <input type="password" name="password_confirm" placeholder="Confirmation du mot de passe" required/>
            <button type="submit">Réinitialiser</button>
        </form>
    </div>
</div>