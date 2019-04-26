<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#393939">
    <meta name="keywords" content="vente, immobilier, immobilié, appartments, appartement, lille, paris, particulier, pas cher, maison, location, easybuy, rewrite, easybuy rewrite, easybuy-rewrite, jessy, fouace, jessy fouace">
    <meta name="copyright" content="Copyright (C) 2019 - Calove | Creator: Rayteur">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $title ?>" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <meta name="twitter:image" content="<?= $imageName ?>" />

    <meta name="og:type" content="article" />
    <meta name="og:title" content="<?= $title ?>" />
    <meta name="og:description" content="<?= $description ?>" />
    <meta name="og:image" content="<?= $imageName ?>" />
    <meta name="og:url" content="https://easybuy-rewrite.000webhostapp.com" />

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="http://localhost/Calove/favicon.ico" />
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="http://localhost/Calove/assets/aos-master/dist/aos.css">
    <script src="http://localhost/Calove/assets/aos-master/dist/aos.js"></script>
    <link rel="stylesheet" href="http://localhost/Calove/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Calove/assets/css/normalize.css">
    <link rel="stylesheet" href="http://localhost/Calove/assets/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bgdark fixed-top">
        <a href="http://localhost/Calove/accueil" class="navbar-brand size20px"><span class="colorwhite familyindie">C</span><span><i class="colorpink far fa-heart"></i></span><span class="colorwhite familyindie">love</span></a>
        <button class="navbar-toggler hidden-lg-up p-2" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span class="colorwhite">Menu</span></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <nav class="stroke mr-auto mt-2 mt-lg-0">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 1) { ?> borderbottomred <?php } ?>" href="http://localhost/Calove/accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 2) { ?> borderbottomred <?php } ?>" href="http://localhost/Calove/caloviens/1">Calovien(e)s</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 3) { ?> borderbottomred <?php } ?>" href="#">Messages</a>
                    </li>
                    <?php if (isset($_SESSION['id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 4) { ?> borderbottomred <?php } ?>" href="http://localhost/Calove/mes-favoris">Mes Favoris</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 5) { ?> borderbottomred <?php } ?>" href="#">Contacter</a>
                    </li>
                    <?php if (isset($_SESSION['role']) and $_SESSION['role'] == 'is_admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 6) { ?> borderbottomred <?php } ?>" href="#">Administrateur</a>
                    </li>
                    <?php 
                } ?>
                </ul>
            </nav>
            <ul class="navbar-nav mt-2 mt-lg-0 p-0">
                <?php if (isset($_SESSION['mail'])) { ?>
                <li class="nav-item p-0">
                    <a class="p-0 pb-2 pt-2 pr-lg-2 hvr-underline-from-center colorwhite" href="">Profil</a>
                </li>
                <li class="nav-item p-0">
                    <a class="p-0 pb-2 pt-2 pl-lg-2 hvr-underline-from-center colorwhite" href="">Déconnection</a>
                </li>
                <?php 
            }
            if (!isset($_SESSION['mail'])) { ?>
                <li class="nav-item p-0">
                    <a class="p-0 pb-2 pt-2 pl-lg-2 hvr-underline-from-center colorwhite <?php if(isset($pageNumber) and $pageNumber == 7) { ?> borderbottomred <?php } ?>" href="">Connexion</a>
                </li>
                <?php 
            } ?>
            </ul>
        </div>
    </nav> 