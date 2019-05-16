<?php

use \JKosacki\Autoloader;
use \JKosacki\App;
use \JKosacki\Form;
use \JKosacki\Session;

require_once 'classes/Autoloader.php';
Autoloader::register();
App::getAuth()->restrict();
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mon Projet</title>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="www/css/lightbox.min.css">
        <link rel="stylesheet" href="www/css/projet.css">
    </head>
    <body>
    <header>
        <nav>
            <div class="logo">
                <a href="#home"><h4>Joris Kosacki</h4></a>
            </div>
            <ul class="nav-links">
                <li><a href="#about" class="scroll">À Propos</a></li>
                <li><a href="#skills" class="scroll">Compétences</a></li>
                <li><a href="#creation" class="scroll">Réalisations</a></li>
                <li><a href="#contact" class="scroll">Contact</a></li>
                <li>
                    <?php if (isset($_SESSION['auth'])): ?>
                        <a href="account/logout" title="See-you-soon"><i class="fas fa-door-open"></i></a>
                    <?php endif; ?>
                </li>
            </ul>
            <div class="nav-burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <div class="header-content">
            <h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
        </div>
        <div class="scrollToTop">
            <i class="fa fa-chevron-circle-up"></i>
        </div>
        <div id="arrowScrollBottom" class="arrowScrollBottom">
            <a href="#about"><span></span></a>
        </div>
    </header>
    <div class="loader">
        <img src="www/images/image.svg" alt="Loading..."/>
    </div>
    <main class="content">
        <article class="about" id="about">
            <h2>À Propos</h2>
            <div class="container-about clearfix">
                <img src="www/images/portrait.jpg" alt="portrait" title="portrait" height="300" width="300"
                     class="imgResponsive">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate deserunt, dolore facilis
                    laborum
                    nobis
                    nulla quam sit sunt unde voluptas? Alias aperiam eligendi optio pariatur quas, quisquam soluta
                    veritatis
                    voluptatem</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate deserunt, dolore facilis laborum
                    nobis
                    nulla quam sit sunt unde voluptas? Alias aperiam eligendi optio pariatur quas, quisquam soluta
                    veritatis
                    voluptatem!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate deserunt, dolore facilis laborum
                    nobis
                    nulla quam sit sunt unde voluptas? Alias aperiam eligendi optio pariatur quas, quisquam soluta
                    veritatis
                    voluptatem!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate deserunt, dolore facilis laborum
                    nobis
                    nulla quam sit sunt unde voluptas? Alias aperiam eligendi optio pariatur quas, quisquam soluta
                    veritatis
                    voluptatem!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate deserunt, dolore facilis
                    laborum
                    nobis
                    nulla quam sit sunt unde voluptas? Alias aperiam eligendi optio pariatur quas, quisquam soluta
                    veritatis
                    voluptatem!</p>
            </div>
        </article>
        <article class="skills clearfix" id="skills">
            <h2>Compétences</h2>
            <div class="clearfix">
                <div class="description-skills">
                    <a target="_blank" href="https://htmlreference.io/">
                        <img src="www/images/html5.png" alt="html5" title="html5" width="512"
                             height="512"
                             class="logoImage transfo">
                    </a>
                    <p> – HTML5 : Langage universel du Web.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="https://css-tricks.com/">
                        <img src="www/images/css3.png" alt="css3" title="css3" width="730"
                             height="833"
                             class="logoImage transfo">
                    </a>
                    <p> – CSS3 : Apparence des interfaces (couleur, typographie, structure…).</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="http://www.php.net/">
                        <img src="www/images/php.png" alt="php" title="php" width="1280"
                             height="691"
                             class="logoImage transfo">
                    </a>
                    <p> – PHP7 : Gestion des fonctionnalités (espace privé, formulaire, API…).</p>
                </div>
                <div class="description-skills">
                    <a target="_blank"
                       href="https://developer.mozilla.org/fr/docs/Web/JavaScript">
                        <img src="www/images/js.png" alt="js" title="js" width="400"
                             height="400"
                             class="logoImage transfo">
                    </a>
                    <p> – JavaScript : Dynamisation des pages, micro-interactions & animations.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="https://jquery.com/">
                        <img src="www/images/jquery.jpg" alt="jquery" title="jquery" width="458"
                             height="458"
                             class="logoImage transfo">
                    </a>
                    <p> – jQuery : Bibliothèque JavaScript de référence.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank"
                       href="https://developer.mozilla.org/fr/docs/Web/Guide/AJAX">
                        <img src="www/images/ajax.jpg" alt="ajax" title="ajax" width="458" height="458"
                             class="logoImage transfo">
                    </a>
                    <p> – Ajax : Echange de données en JavaScript.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="https://sql.sh/">
                        <img src="www/images/mysql.png" alt="mysql" title="mysql" width="512" height="512"
                             class="logoImage transfo">
                    </a>
                    <p> – MySQL : Stockage & gestion des données.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="https://getbootstrap.com/">
                        <img src="www/images/bootstrap.png" alt="bootstrap" title="bootstrap"
                             width="705" height="397"
                             class="logoImage transfo bootstrap">
                    </a>
                    <p> – Bootstrap : Framework CSS et JavaScript pour site responsive.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="https://vuejs.org">
                        <img src="www/images/vuejs.png" alt="vuejs" title="vuejs" width="420" height="420"
                             class="logoImage transfo"></a>
                    <p> – VueJS : Framework JavaScript open-source.</p>
                </div>
                <div class="description-skills">
                    <a target="_blank" href="https://nodejs.org">
                        <img src="www/images/nodejs.png" alt="nodejs" title="nodejs" width="800"
                             height="800"
                             class="logoImage transfo"></a>
                    <p> – NodeJS : Plateforme logicielle libre et événementielle en JavaScript.</p>
                </div>
            </div>
        </article>
        <article class="creation clearfix" id="creation">
            <h2>Réalisations</h2>
            <div class="rectangle-orange">
                <div class="description-creation clearfix">
                    <a href="www/images/cupoftea.jpg" data-lightbox="myproject" data-title="cupoftea"><img
                                src="www/images/cupoftea-small.jpg" title="cupoftea" alt="cupoftea"
                                width="150"
                                height="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet at aut eius est
                        explicabo facere, illum iste nobis similique suscipit voluptate? Enim molestias nulla suscipit
                        vero? Consequatur, vero?
                    </p>
                </div>
                <div class="description-creation clearfix">
                    <a href="www/images/johndoe.jpg" data-lightbox="myproject" data-title="johnDoe"><img
                                src="www/images/johndoe-small.jpg" title="johndoe" alt="johndoe"
                                height="150"
                                width="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet at aut eius est
                        explicabo facere, illum iste nobis similique suscipit voluptate? Enim molestias nulla suscipit
                        vero? Consequatur, vero?
                    </p>
                </div>
                <div class="description-creation clearfix">
                    <a href="www/images/creasoul.png" data-lightbox="myproject" data-title="creaSoul"><img
                                src="www/images/creasoul-small.png" title="creasoul" alt="creasoul"
                                width="150"
                                height="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet at aut eius est
                        explicabo facere, illum iste nobis similique suscipit voluptate? Enim molestias nulla suscipit
                        vero? Consequatur, vero?
                    </p>
                </div>
                <div class="description-creation clearfix">
                    <a href="www/images/wolfgang.png" data-lightbox="myproject" data-title="wolfgang"><img
                                src="www/images/wolfgang-small.png" title="wolfgang" alt="wolfgang"
                                width="150"
                                height="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet at aut eius est
                        explicabo facere, illum iste nobis similique suscipit voluptate? Enim molestias nulla suscipit
                        vero? Consequatur, vero?
                    </p>
                </div>
                <div class="description-creation clearfix">
                    <a href="www/images/mindgeek.jpg" data-lightbox="myproject" data-title="mindgeek"><img
                                src="www/images/mindgeek-small.jpg" title="mindgeek" alt="mindgeek"
                                width="150"
                                height="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet at aut eius est
                        explicabo facere, illum iste nobis similique suscipit voluptate? Enim molestias nulla suscipit
                        vero? Consequatur, vero?
                    </p>
                </div>

                <div class="description-creation clearfix">
                    <a href="www/images/restaurant-small.jpg" data-lightbox="myproject"
                       data-title="restaurant"><img
                                src="www/images/restaurant-small.jpg" title="restaurant" alt="restaurant"
                                width="150"
                                height="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid amet, assumenda culpa
                        deleniti, eaque enim facere facilis inventore laboriosam nemo obcaecati perspiciatis quasi, quod
                        sed sit soluta sunt voluptatibus?</p>
                </div>
                <div class="description-creation clearfix">
                    <a href="www/images/ardoise-small.jpg" data-lightbox="myproject"
                       data-title="ardoise"><img
                                src="www/images/ardoise-small.jpg" title="ardoise" alt="ardoise"
                                width="150"
                                height="150"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ducimus hic id natus nisi nobis
                        obcaecati, quaerat! Accusantium aperiam assumenda, dolore eos ipsa pariatur quia repudiandae
                        similique voluptas voluptate voluptatem!</p>
                </div>
            </div>
        </article>
        <article class="contact" id="contact">
            <h2>Contact</h2>
            <?php if (Session::getInstance()->hasFlashes()): ?>
                <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
                    <div class="alert-<?= $type; ?>">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (Session::getInstance()->hasFlashes()): ?>
                <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
                    <div class="alert-<?= $type; ?>">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="contactForm/contact-form.php" method="POST" id="contact-form">
                <?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>
                <?= $form->text('prénom', 'Prénom'); ?>
                <br>
                <?= $form->text('nom', 'Nom'); ?>
                <br>
                <?= $form->email('email', 'Email'); ?>
                <br>
                <?= $form->textarea('message', 'Votre message'); ?>
                <br>
                <input class="form-control submit" type="submit" name="submit" value="Envoyer">
            </form>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44994.272807750036!2d5.6804372855374785!3d45.184220669594296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af48bd689be6f%3A0x618c10cd6e995398!2sGrenoble!5e0!3m2!1sfr!2sfr!4v1517930635052"
                    class="maps"> Votre Navigateur ne peut pas afficher la carte
            </iframe>
        </article>
    </main>
    <footer>
        <div class="linksBottom">
            <a href="#about">À Propos</a>
            <a href="#skills">Compétences</a>
            <a href="#creation">Réalisation</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="social-network-icons">
            <a target="_blank" href="https://www.facebook.com/joris.kosacki">
                <i class="transfo fab fa-facebook-square"></i>
            </a>
            <a target="_blank" href="https://www.linkedin.com/in/joris-kosacki-669b1515b/">
                <i class="transfo fab fa-linkedin"></i>
            </a>
            <a target="_blank" href="https://twitter.com/">
                <i class="transfo fab fa-twitter-square"></i>
            </a>
            <a target="_blank" href="https://github.com/Ch0up">
                <i class="transfo fab fa-github-square"></i>
            </a>
        </div>
        <p>Portfolio développeur web full-stack © 2018 Joris Kosacki - mentions légales</p>
    </footer>

    <script src="www/js/jquery-3.3.1.min.js"></script>
    <script src="www/js/lightbox-plus-jquery.min.js"></script>
    <script src="www/js/projet.js"></script>
    </body>
    </html>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>