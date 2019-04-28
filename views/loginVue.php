<?php require '../views/template/header.php'; ?>
<div class="row col-12 m-0 mt-5 p-0">

    <div class="card col-11 col-md-10 col-lg-5 mx-auto">
        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Connection</strong>
        </h5>
        <div class="card-body px-lg-5 pt-0">
            <form class="text-center" method="post" style="color: #757575;">
                <div class="md-form">
                    <label for="materialLoginFormEmail">E-mail</label>
                    <input type="email" id="materialLoginFormEmail" name="mailCo" class="form-control" <?php if (isset($email)) { ?> value="<?= $email ?>" <?php } ?> required>
                </div>
                <div class="md-form">
                    <label for="materialLoginFormPassword">Mot de passe</label>
                    <input type="password" id="materialLoginFormPassword" name="passwordCo" class="form-control" <?php if (isset($confirmPassword)) { ?> value="<?= $confirmPassword ?>" <?php } ?> required>
                </div>

                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" name="rememberme" value="true" id="materialLoginFormRemember" checked>
                            <label class="form-check-label" for="materialLoginFormRemember">Se souvenir de moi</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Connection</button>
            </form>
        </div>
    </div>

    <div class="card col-11 col-md-10 col-lg-5 mt-2 mt-lg-0 mx-auto">
        <h5 class="card-header info-color white-text text-center py-4">
            <strong>S'inscrire</strong><br>
            <strong style="color: green;"><?= $messageInscription ?></strong>
        </h5>
        <div class="card-body px-lg-5 pt-0">
            <form class="text-center" method='POST' style="color: #757575;">
                <div class="form-row">
                    <div class="col">
                        <div class="md-form">
                            <label for="materialRegisterFormFirstName">Nom</label>
                            <input type="text" id="materialRegisterFormFirstName" class="form-control" name="lastname" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form">
                            <label for="materialRegisterFormLastName">Prénom</label>
                            <input type="text" id="materialRegisterFormLastName" class="form-control" name="firstname" required>
                        </div>
                    </div>
                </div>
                <div class="md-form">
                    <label for="materialRegisterFormPhone">Pseudonyme</label>
                    <input type="text" class="form-control" name="pseudo" required>
                </div>
                <div class="md-form mt-0">
                    <label for="materialRegisterFormEmail">E-mail</label>
                    <input type="email" id="materialRegisterFormEmail" class="form-control" name="email" required>
                </div>
                <div class="md-form">
                    <label for="materialRegisterFormPassword">Mot de passe</label>
                    <input type="password" id="materialRegisterFormPassword" class="form-control" name="password" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                </div>
                <div class="md-form">
                    <label for="materialRegisterFormPassword">Confirmation Mot de passe</label>
                    <input type="password" id="materialRegisterFormPassword2" class="form-control" name="confirmpassword" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                </div>
                <p class="mb-0">Je suis:</p>
                <div class="form-check m-0 p-0 mt-0">
                    <div>
                        <input type="radio" id="Homme" name="sexe" value="Homme" checked>
                        <label for="Homme">Homme</label>
                    </div>

                    <div>
                        <input type="radio" id="Femme" name="sexe" value="Femme">
                        <label for="Femme">Femme</label>
                    </div>
                </div>
                <p class="pt-2 mb-0">Je cherche:</p>
                <div class="form-check m-0 p-0">
                    <div>
                        <input type="radio" id="HommeSearch" name="searchSexe" value="Homme" checked>
                        <label for="HommeSearch">Homme</label>
                    </div>

                    <div>
                        <input type="radio" id="FemmeSearch" name="searchSexe" value="Femme">
                        <label for="FemmeSearch">Femme</label>
                    </div>

                    <div>
                        <input type="radio" id="allSearch" name="searchSexe" value="Homme et Femme">
                        <label for="allSearch">Homme et Femme</label>
                    </div>
                </div>
                <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">S'inscrire</button>
                <hr>
                <p>En cliquant
                    <em>S'inscrire</em> vous validez nos
                    <a href="" target="_blank">termes et services</a>
            </form>
        </div>
    </div>
</div>
<?php require '../views/template/footer.php'; ?>