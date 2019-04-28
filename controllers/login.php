<?php

function chargerClasse($classname)
{
    if (file_exists('../model/' . ucfirst($classname) . '.php')) {
        require '../model/' . ucfirst($classname) . '.php';
    } elseif (file_exists('../entities/' . ucfirst($classname) . '.php')) {
        require '../entities/' . ucfirst($classname) . '.php';
    } elseif (file_exists('../traits/' . ucfirst($classname) . '.php')) {
        require '../traits/' . ucfirst($classname) . '.php';
    } else {
        require '../interface/' . ucfirst($classname) . '.php';
    }
}
session_start();
spl_autoload_register('chargerClasse');
$isActive = 9;
$db = Database::BDD();
$title = "Calove - Connection | Site de rencontre du Calaisis";
$description = 'Calove, Site de rencontre du Calaisis, entièrement gratuit, connection requise afin de voir les profil ainsi que les images.';
$pageNumber = 7;

$imageManager = new ImageManager($db);
$userManager = new UserManager($db);
$favoritesManager = new FavoritesManager($db);
$moreInformationManager = new MoreInformationManager($db);

require "../controllers/cookies.php";

require('../controllers/connexion.php');

require('../controllers/cookies.php');

if (isset($_SESSION['mail'])) {
    header('location: http://localhost/Calove/accueil');
}

require('../views/loginVue.php');
