<?php include("template/header.php"); ?>

<div class="container col-12 m-0 p-0">
    <div class="colorwhite col-12 m-0 mtnav mx-auto">
        <?php foreach ($myContact as $contact) { ?>
            <div class="mx-auto m-0 p-0">
                <div class="col-12 row mt-2" style="background-color: #212529">
                    <h1 class="col"><?= $contact->getSujet() ?></h1>
                    <p class="col text-right"><?= $contact->getStatus() ?></p>
                </div>
                <div class="col-12 row" style="background-color: rgba(255,255,255,.05)">
                    <p class="col"><?= nl2br($contact->getMessageContact()) ?></p>
                    <p class="col text-right">Admin</p>
                </div>
            </div>
        <?php } ?>

        <div>
            <div class="col-12 row mt-2" style="background-color: #212529">
                <h1 class="col">Admin</h1>
            </div>
            <div class="col-12 row" style="background-color: rgba(255,255,255,.05)">
                <p class="col"><?= nl2br($contact->getMessageContact()) ?></p>
            </div>
        </div>

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