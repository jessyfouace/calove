<?php
if(isset($_SESSION['id'])) {
    $favoritesInfo = $favoritesManager->getFavorites($_SESSION['id']);
    foreach ($favoritesInfo as $favInfo) {
        $explodeFavHeart = explode(',', $favInfo->getIdFavoritesOther());
    }
    if (isset($_POST['favId'])) {
        $ifExistUser = $userManager->getUserById($_POST['favId']);
        $explodeArray = implode(',', $ifExistUser);
        if (empty($explodeArray)) {
            $error = true;
            header('location: ' . $_SERVER['REQUEST_URI']);
        }
        if ($_SESSION['id'] == $_POST['favId']) {
            $error = true;
            header('location: ' . $_SERVER['REQUEST_URI']);
        }
        if (!empty($_POST['nameFav']) and !empty($_POST['favId']) and !isset($error)) {
            foreach ($favoritesInfo as $addFav) {
                $allFavorites = $addFav->getIdFavoritesOther();
            }
            $explodeFav = explode(',', $allFavorites);
            foreach ($explodeFav as $searchFav) {
                if ($searchFav == $_POST['favId']) {
                    $error = true;
                    break;
                } else {
                    $error = false;
                }
            }
            if ($error == false) {
                $stringFav = $_POST['favId'] . ',' . $allFavorites;
                $favObject = new Favorites([
                    'idFavoritesOther' => $stringFav,
                    'idUserFavorites' => $_SESSION['id']
                ]);
                $favoritesManager->updateFavorites($favObject);
                $messageUpdateAdd = true;
                header('Refresh: 2; url=' . $_SERVER['REQUEST_URI'] . '');
            } else {
                $stringFav = '';
                foreach ($explodeFav as $searchFav) {
                    if ($searchFav !== $_POST['favId']) {
                        $stringFav = $searchFav . ',' . $stringFav;
                    }
                }
                $tableRemoveTags = explode(',', $stringFav);
                $tableWithoutTags = [];
                foreach ($tableRemoveTags as $removeTags) {
                    if (!empty($removeTags)) {
                        array_push($tableWithoutTags, $removeTags);
                    }
                }
                $stringFav = '';
                foreach ($tableWithoutTags as $searchFav) {
                    $stringFav = $searchFav . ',' . $stringFav;
                }
                $favObject = new Favorites([
                    'idFavoritesOther' => $stringFav,
                    'idUserFavorites' => $_SESSION['id']
                ]);
                $favoritesManager->updateFavorites($favObject);
                $messageUpdateRemove = true;
                header('Refresh: 2; url=' . $_SERVER['REQUEST_URI'] . '');
            }
        }
    }
}