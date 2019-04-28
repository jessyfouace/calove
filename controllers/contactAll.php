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
$contactManager = new ContactManager($db);

$title = "Calove - Contact | Site de rencontre du Calaisis";
$description = 'Calove, Site de rencontre du Calaisis, entièrement gratuit, connection requise afin de voir les profil ainsi que les images.';
$pageNumber = 5;

require "../controllers/cookies.php";

if (!isset($_SESSION['id'])) {
    header('location: http://localhost/Calove/accueil');
}

$myContact = $contactManager->getContactByIdMessageContact($_GET['id']);
foreach ($myContact as $contact) {
    if ($contact->getIdSenderContact() != $_SESSION['id']) {
        header('location: http://localhost/Calove/accueil');
    }
}
require "../views/contactAllVue.php";
