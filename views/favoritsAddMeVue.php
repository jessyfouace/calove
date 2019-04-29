<?php include("template/header.php"); ?>

<div class="container col-12 m-0 p-0">
    <div class="colorwhite row col-12 m-0 mtnav mx-auto">

        <div class="col-12 mb-1">
            <h2>Calove, site de rencontre pour les habitants de la ville de Calais, totalement gratuit.</h2>
        </div>
        <?php if (!isset($_SESSION['mail'])) { ?>
            <div class="alert alert-danger col-12 mt-1" role="alert">
                <span>Afin d'assurer la sécuritée des personnes inscrites sur ce site vous devez être connecté afin de voir les photo.</span>
            </div>
        <?php } else {
        if (isset($_SESSION['image'])) {
            if ($_SESSION['image'] == false) { ?>
                    <div class="alert alert-danger col-12 mt-1" role="alert">
                        <span>Nous vous conseillons de mettre une photo de profil afin d'avoir plus de résultat.</span>
                    </div>
                <?php }
        }
    }
    if (isset($messageUpdateAdd)) { ?>
            <div class="alert alert-success col-12 mt-1" role="alert">
                <span><span class="font-weight-bold"><i class="fas fa-check pr-2"></i> <?= ucfirst($_POST['nameFav']) ?></span> a bien étais ajouté à vos favoris</span>
            </div>
        <?php } ?>
        <?php if (isset($messageUpdateRemove)) { ?>
            <div class="alert alert-warning col-12 mt-1" role="alert">
                <span><span class="font-weight-bold"><i class="fas fa-check pr-2"></i> <?= ucfirst($_POST['nameFav']) ?></span> a bien étais supprimé(e) de vos favoris</span>
            </div>
        <?php } ?>
        <div class="col-12 text-center">
            FILTRER
        </div>
        <?php foreach ($allUsers[0] as $user) { ?>

            <div class="col-9 col-sm-5 col-md-4 col-lg-3 col-xl-2 mt-4 mx-auto hoverdnone">
                <a href="" class="col-11 mx-auto">
                    <?php foreach ($allUsers[1] as $image) {
                        if ($image->getUserId() == $user->getIdUser()) {
                            ?>
                            <div class="hovercard col-12 m-0 p-0 <?php if (!isset($_SESSION['mail'])) { ?> blurnoconnect <?php } ?>" style="background-image: url('<?= $image->getLink(); ?>');">
                                <div class="nameAndTriangle">
                                    <div class="cardTriangle"></div>
                                    <div class="name col-12 text-center">
                                        <?php
                                        if (isset($_SESSION['id'])) {
                                            if (isset($explodeFavHeart)) {
                                                if ($explodeFavHeart) {
                                                    foreach ($explodeFavHeart as $infoHeart) {
                                                        if ($infoHeart == $user->getIdUser()) {
                                                            $fav = true;
                                                            break;
                                                        } else {
                                                            $fav = false;
                                                        }
                                                    }
                                                }
                                            }
                                        } ?>
                                        <p class="p-2 pb-3 text-center">
                                            <form class="m-0 p-0 <?php if (!isset($_SESSION['mail'])) { ?> d-none <?php } ?> displaynone" action="" method="post"><input type="hidden" name="nameFav" value="<?= $user->getPseudo() ?>"><input class="mt-0 pt-0" type="hidden" name="favId" value="<?= $user->getIdUser() ?>"><button class="bgnobutton mt-0 pt-0" type="submit"><span class="fav"><i onmouseover='changeIcon(this)' onmouseout='changeIcon(this)' id="<?= $user->getIdUser() ?>" class="coloryellow <?php if ($fav == false) { ?> far <?php } else { ?> fas <?php } ?> fa-heart fa-2x"></i></span></button></form><span class="lead font-weight-bold"><?= ucfirst($user->getPseudo()); ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                } ?>
                </a>
            </div>

        <?php } ?>

    </div>
</div>
<?php include("template/footer.php"); ?>

<script>
    function changeIcon(id) {
        let favId = id.id;
        let favIdObject = document.getElementById(favId);
        favIdObject.classList.toggle('far');
        favIdObject.classList.toggle('fas');
    }
</script>