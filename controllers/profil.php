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

$messageManager = new MessageManager($db);
$favoritesManager = new FavoritesManager($db);

$test = $favoritesManager->getPersonAddMe('1');
print_r($test);
