<?php
$colorMessage = 'colorred';
$messageConnexion = '';

function get_ip()
{
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip  = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    return $ip;
}

if (!empty($_POST['mailCo'])) {
    $mail = htmlspecialchars($_POST['mailCo']);
    if (!empty($_POST['passwordCo'])) {
        $password = htmlspecialchars($_POST['passwordCo']);
        $getUser = $userManager->getUserByMail($mail);
        if ($getUser) {
            if (password_verify($password, $getUser->getPassword())) {
                $messageConnexion = 'Connection en cours';
                $_SESSION['id'] = $getUser->getIdUser();
                $_SESSION['firstname'] = $getUser->getFirstname();
                $_SESSION['lastname'] = $getUser->getLastname();
                $_SESSION['mail'] = $mail;
                $_SESSION['password'] = $password;
                $_SESSION['pseudo'] = $getUser->getPseudo();
                $_SESSION['sexe'] = $getUser->getSexe();
                $_SESSION['searchSexe'] = $getUser->getSearchSexe();
                $_SESSION['role'] = $getUser->getRole();
                $getImage = $imageManager->getImageByIdUser($getUser->getIdUser());
                if (!empty($getImage->getLink())) {
                    $_SESSION['image'] = true;
                } else {
                    $_SESSION['image'] = false;
                }
                if (!empty($_POST['rememberme'])) {
                    // if (isset($_COOKIE['acceptation'])) {
                        setCookie('id', $getUser->getIdUser(), (time() + 365 * 24 * 3600));
                        setCookie('firstname', $getUser->getFirstname(), (time() + 365 * 24 * 3600));
                        setCookie('lastname', $getUser->getLastname(), (time() + 365 * 24 * 3600));
                        setCookie('mail', $mail, (time() + 365 * 24 * 3600));
                        setCookie('password', $password, (time() + 365 * 24 * 3600));
                        setCookie('pseudo', $getUser->getPseudo(), (time() + 365 * 24 * 3600));
                        setCookie('sexe', $getUser->getSexe(), (time() + 365 * 24 * 3600));
                        setCookie('searchSexe', $getUser->getSearchSexe(), (time() + 365 * 24 * 3600));
                        setCookie('role', $getUser->getRole(), (time() + 365 * 24 * 3600));
                        setCookie('image', $_SESSION['image'], (time() + 365 * 24 * 3600));
                    // }
                }
            }
        } else {
            $connectionMessage = 'Email ou mot de passe incorrect';
        }
    }
}
$messageInscription = '';
if (!empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['email']) and !empty($_POST['pseudo']) and !empty($_POST['password']) and !empty($_POST['confirmpassword']) and !empty($_POST['sexe']) and !empty($_POST['searchSexe'])) {
    $email = htmlspecialchars($_POST['email']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmpassword']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $searchSexe = htmlspecialchars($_POST['searchSexe']);
    $ip = get_ip();
    if ($sexe == 'Homme' or $sexe == 'Femme' and $searchSexe == 'Homme' or $searchSexe == 'Femme' or $searchSexe == 'Homme et Femme') {
        if ($password == $confirmPassword) {
            $getUserByMail = $userManager->getUserByMail($email);
            $getUserByPseudo = $userManager->getUserByPseudo($pseudo);
            if (!$getUserByPseudo) {
                if (!$getUserByMail) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $user = new User([
                        'emailUser' => $email,
                        'password' => $password,
                        'firstnameUser' => $firstname,
                        'lastnameUser' => $lastname,
                        'pseudo' => $pseudo,
                        'ip' => $ip,
                        'sexe' => $sexe,
                        'searchSexe' => $searchSexe
                    ]);
                    $createUser = $userManager->createUser($user);
                    $image = new Image([
                        'userId' => $createUser
                    ]);
                    $createImage = $imageManager->createImage($image);
                    $createFavorites = $favoritesManager->createFavorites($createUser);
                    $createMoreInformation = $moreInformationManager->createMoreInformation($createUser);
                    $messageInscription = 'Inscription réussis';
                }
            }
        }
    }
}
