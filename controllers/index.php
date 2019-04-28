<?php

function chargerClasse($classname)
{
    if (file_exists('../model/'. ucfirst($classname).'.php')) {
        require '../model/'. ucfirst($classname).'.php';
    } elseif (file_exists('../entities/'. ucfirst($classname).'.php')) {
        require '../entities/'. ucfirst($classname).'.php';
    } elseif (file_exists('../traits/'. ucfirst($classname).'.php')) {
        require '../traits/'. ucfirst($classname).'.php';
    } else {
        require '../interface/'. ucfirst($classname).'.php';
    }
}
session_start();
spl_autoload_register('chargerClasse');
$db = Database::BDD();
$userManager = new UserManager($db);
$favoritesManager = new FavoritesManager($db);

$title = "Calove - Accueil | Site de rencontre du Calaisis";
$description = 'Calove, Site de rencontre du Calaisis, entièrement gratuit, connection requise afin de voir les profil ainsi que les images.';
$pageNumber = 1;

require "../controllers/cookies.php";

$allUsers = $userManager->getUser();

require "../controllers/addFav.php";

require "../views/indexVue.php";
