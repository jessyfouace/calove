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
$contactManager = new ContactManager($db);

$title = "Calove - Contact | Site de rencontre du Calaisis";
$description = 'Calove, Site de rencontre du Calaisis, entièrement gratuit, connection requise afin de voir les profil ainsi que les images.';
$pageNumber = 5;

require "../controllers/cookies.php";

if (!isset($_SESSION['id'])) {
    header('location: http://localhost/Calove/accueil');
}

if (isset($_POST['sujet']) and isset($_POST['message'])) {
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = nl2br($_POST['message']);
    $message = htmlspecialchars($_POST['message']);
    $contact = new Contact([
        'idSenderContact' => $_SESSION['id'],
        'sujet' => $sujet,
        'messageContact' => $message
    ]);
    $contactManager->createContact($contact);
    header('location: http://localhost/Calove/nous-contactez');
}

$myContact = $contactManager->getContactById($_SESSION['id']);

require "../views/contactVue.php";
