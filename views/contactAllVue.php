<?php include("template/header.php"); ?>

<div class="container col-12 m-0 p-0">
    <div class="colorwhite col-12 m-0 mtnav mx-auto">
        <?php foreach ($myContact[1] as $contact) { ?>
            <div class="mx-auto m-0 p-0">
                <div class="col-12 row mt-2" style="background-color: #212529">
                    <h1 class="col"><?= $contact->getSujet() ?></h1>
                    <p class="col text-right"><?= $contact->getStatus() ?></p>
                </div>
                <div class="col-12 row" style="background-color: rgba(255,255,255,.05)">
                    <p class="col"><?= nl2br($contact->getMessageContact()) ?></p>
                    <?php foreach ($myContact[0] as $adminInfo) {
                        if ($adminInfo->getIdUser() == $contact->getIdAdmin()) { ?>
                            <p class="col text-right">Admin: <?= ucfirst($adminInfo->getPseudo()); ?></p>
                        <?php }
                    } ?>
                </div>
            </div>
        <?php } ?>

        <?php
        $arrayVerify = ['64115613511351353531321'];
        foreach ($responseContact[0] as $user) { ?>
        <div>
            <div class="col-12 row mt-2" style="background-color: #212529">
                <h1 class="col" <?php if($user->getRole() == 'is_admin') { ?> style="color: red;" <?php } ?>><?= $user->getPseudo() ?></h1>
            </div>
            <?php foreach($responseContact[1] as $response) {
                if($response->getIdUserResponse() == $user->getIdUser()){
                    foreach ($arrayVerify as $idResponse) {
                        if (in_array($response->getIdResponse(),$arrayVerify)) {
                            $error = true;
                            break;
                        } else {
                            $error = false;
                            array_push($arrayVerify, $response->getIdResponse());
                            break;
                        }
                    }
                if ($error == false) {
            ?>
            <div class="col-12 row" style="background-color: rgba(255,255,255,.05)">
                <p class="col"><?= nl2br($response->getMessageResponse()) ?></p>
            </div>
        </div>
        <?php           break;
                    }
                }
            }
        } ?>

        <form method="post" class="text-center col-12 col-md-8 col-lg-6 mx-auto mt-2" style="color: #757575;">
            <div class="md-form">
                <label for="materialContactFormMessage">Répondre</label>
                <textarea id="materialContactFormMessage" name="message" class="form-control md-textarea" rows="3" required></textarea>
            </div>
            <button class="btn btn-outline-danger btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Répondre</button>
        </form>
    </div>
</div>
<?php include("template/footer.php"); ?>