<?php
if (isset($_POST['acceptcookies'])) {
    setCookie('acceptation', 'Accepter', (time() + 365 * 24 * 3600));
    header('location: ' . $_SERVER['REQUEST_URI']);
} elseif (isset($_POST['refusecookies'])) {
    $_SESSION['nocookies'] = 'true';
    header('location: ' . $_SERVER['REQUEST_URI']);
}

if (!isset($_SESSION['id']) and !isset($_SESSION['firstname']) and !isset($_SESSION['lastname']) and !isset($_SESSION['mail']) and !isset($_SESSION['password']) and !isset($_SESSION['pseudo']) and !isset($_SESSION['sexe']) and !isset($_SESSION['searchSexe']) and !isset($_SESSION['role'])) {
    if (isset($_COOKIE['id']) and isset($_COOKIE['firstname']) and isset($_COOKIE['lastname']) and isset($_COOKIE['mail']) and isset($_COOKIE['password']) and isset($_COOKIE['pseudo']) and isset($_COOKIE['sexe']) and isset($_COOKIE['searchSexe']) and isset($_COOKIE['role'])) {
        $mail = htmlspecialchars($_COOKIE['mail']);
        $password = htmlspecialchars($_COOKIE['password']);
        $checkConnexion = $userManager->getUserByMail($mail);
        if ($checkConnexion) {
            $password = password_verify($password, $checkConnexion->getPassword());
            if ($password) {
                $_SESSION['id'] = $_COOKIE['id'];
                $_SESSION['firstname'] = $_COOKIE['firstname'];
                $_SESSION['lastname'] = $_COOKIE['lastname'];
                $_SESSION['mail'] = $_COOKIE['mail'];
                $_SESSION['password'] = $_COOKIE['password'];
                $_SESSION['pseudo'] = $_COOKIE['pseudo'];
                $_SESSION['sexe'] = $_COOKIE['sexe'];
                $_SESSION['searchSexe'] = $_COOKIE['searchSexe'];
                $_SESSION['role'] = $_COOKIE['role'];
                $_SESSION['image'] = $_COOKIE['image'];
                header('location: ' . $_SERVER['REQUEST_URI']);
            } else {
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
                header('location: ' . $_SERVER['REQUEST_URI']);
            }
        } else {
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
            header('location: ' . $_SERVER['REQUEST_URI']);
        }
    }
}
