<?php
session_start();
require "../controllers/cookies.php";
session_destroy();
if (isset($_COOKIE['id'])) {
    setCookie('id', false);
    setCookie('firstname', false);
    setCookie('lastname', false);
    setCookie('mail', false);
    setCookie('password', false);
    setCookie('pseudo', false);
    setCookie('sexe', false);
    setCookie('searchSexe', false);
    setCookie('role', false);
    setCookie('image', false);
}
header('location: http://localhost/Calove/accueil');