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
$db = Database::BDD();
$userManager = new UserManager($db);
$favoritesManager = new FavoritesManager($db);

$title = "Calove - Tous les membres | Site de rencontre du Calaisis";
$description = 'Calove, Site de rencontre du Calaisis, entièrement gratuit, connection requise afin de voir les profil ainsi que les images.';
$pageNumber = 2;

require "../controllers/cookies.php";

require "../controllers/addFav.php";

if (!isset($_GET['page'])) {
    header('location: http://localhost/Calove/caloviens/1');
}

if (!isset($_SESSION['searchSexe']) or $_SESSION['searchSexe'] == 'Homme / Femme') {
    $allCount = $userManager->countUsers();
} elseif (isset($_SESSION['searchSexe'])) {
    $sexe = $_SESSION['searchSexe'];
    $allCount = $userManager->countUsersSexe($sexe);
}
foreach ($allCount as $count) {
    $allCount = $count;
}
$messagePearPage = 1;


$numberOfPage = ceil($allCount / $messagePearPage);
if (isset($_GET['page'])) {
    $actualPage = intval($_GET['page']);

    if ($actualPage > $numberOfPage) {
        $actualPage = $numberOfPage;
    }
} else {
    $actualPage = 1;
}

$firstEntry = ($actualPage - 1) * $messagePearPage;
$errorMessage = '';

if (!isset($_SESSION['searchSexe']) or $_SESSION['searchSexe'] == 'Homme / Femme') {
    $allUsers = $userManager->getUsers($firstEntry, $messagePearPage);
} elseif ($_SESSION['searchSexe'] == 'Homme') {
    $sexe = $_SESSION['searchSexe'];
    $searchSexe = $_SESSION['sexe'];
    $allUsers = $userManager->getUsersBySexe($firstEntry, $messagePearPage, $sexe, $searchSexe);
} elseif ($_SESSION['searchSexe'] == 'Femme') {
    $sexe = $_SESSION['searchSexe'];
    $searchSexe = $_SESSION['sexe'];
    $allUsers = $userManager->getUsersBySexe($firstEntry, $messagePearPage, $sexe, $searchSexe);
}

require "../views/allUserVue.php";
