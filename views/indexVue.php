<?php include("template/header.php"); ?>

<div class="container col-12 m-0 p-0">
    <img class="position-absolute col-12 m-0 p-0 height80vh" src="http://localhost/Calove/assets/img/bgaccueil.jpg" alt="Plage avec 2 personne sous coucher de soleil">
    <div class="col-12 d-flex height80vh">
        <h1 class="mx-auto my-auto bgdark colorpink p-2" style="opacity: 0.8;">Trouver l'amour n'as jamais étais aussi simple</h1>
    </div>
    <div class="colorwhite row col-12 m-0 mtnav mx-auto">

        <div class="col-12 mb-1">
            <h2>Calove, site de rencontre pour les habitants de la ville de Calais, totalement gratuit.</h2>
        </div>
        <?php if (!isset($_SESSION['mail'])) { ?>
            <div class="alert alert-danger col-12 mt-1" role="alert">
                <span>Afin d'assurer la sécuritée des personnes inscrites sur ce site vous devez être connecté afin de voir les photo.</span>
            </div>
        <?php } else {
        if ($_SESSION['image'] == false) { ?>
                <div class="alert alert-danger col-12 mt-1" role="alert">
                    <span>Nous vous conseillons de mettre une photo de profil afin d'avoir plus de résultat.</span>
                </div>
            <?php }
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
        <div class="col-12">
            <h2 class="borderbottomred">Les 12 derniers inscrits</h2>
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
                                <p class="p-2 pb-3 text-center"><form class="m-0 p-0 <?php if (!isset($_SESSION['mail'])) { ?> d-none <?php } ?> displaynone" action="" method="post"><input type="hidden" name="nameFav" value="<?= $user->getPseudo() ?>"><input class="mt-0 pt-0" type="hidden" name="favId" value="<?= $user->getIdUser() ?>"><button class="bgnobutton mt-0 pt-0" type="submit"><span class="fav"><i onmouseover='changeIcon(this)' onmouseout='changeIcon(this)' id="<?= $user->getIdUser() ?>" class="coloryellow <?php if($fav == false) { ?> far <?php } else { ?> fas <?php } ?> fa-star fa-2x"></i></span></button></form><span class="lead font-weight-bold"><?= ucfirst($user->getPseudo()); ?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php }
                } ?>
                </a>
            </div>

        <?php } ?>

        <div class="col-12 text-center mt-5 mb-2">
            <a class="mx-auto btn btn-info" href="http://localhost/Calove/caloviens">Voir plus de profils</a>
        </div>

        <hr class="col-10 mx-auto">

        <div class="col-12 text-center m-2">
            <h3 class="borderbottomred">Comment ça marche ?</h3>
        </div>

        <div class="col-12 m-0 p-0" style="overflow-x: hidden; overflow-y: hidden">
            <div class="col-12 m-3" data-aos="fade-right" data-aos-duration="1500">
                <h3><i class="far fa-id-card colorpink fa-2x"></i> Dites nous qui vous êtes !</h3>
                <p>Décidez ce que vous cherchez ! on s'occupe du reste. Afin d'avoir le maximum de profil vous correspondant merci de biens remplir votre profil.</p>
            </div>
        </div>

        <div class="col-12 m-0 p-0" style="overflow-x: hidden; overflow-y: hidden">
            <div class="col-12 text-right m-3" data-aos="fade-left" data-aos-duration="1500">
                <h3><i class="fas fa-search colorpink fa-2x"></i> Trouvez la personne qui vous correspond !</h3>
                <p>Nous travaillons sans relache sur notre algorythme afin de vous proposer la meilleure expérience possible.</p>
            </div>
        </div>

        <div class="col-12 m-0 p-0" style="overflow-x: hidden; overflow-y: hidden">
            <div class="col-12 m-3" data-aos="fade-right" data-aos-duration="1500">
                <h3><i class="fas fa-calendar-alt colorpink fa-2x"></i> Discutez et trouvez votre date !</h3>
                <p>Afin d'assurer votre sécuritée votre nom et prénom ne seras pas divulguer à vous de le divulguer dans vos discussion.</p>
            </div>
        </div>
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