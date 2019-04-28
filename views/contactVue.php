<?php include("template/header.php"); ?>

<div class="container col-12 m-0 p-0">
    <div class="colorwhite col-12 m-0 mtnav mx-auto">
        <h1 class="borderbottomred">Nous contactez</h1>
        <form method="post" class="text-center col-12 col-md-8 col-lg-6 mx-auto" style="color: #757575;">
            <span>Sujet</span><br>
            <select class="mdb-select col-12" name="sujet" required>
                <option value="" disabled selected>Choisir un choix</option>
                <option value="Information">Information</option>
                <option value="Bug">Bug</option>
                <option value="Idées">Idées</option>
                <option value="Plainte">Plainte</option>
                <option value="Autre">Autre</option>
            </select>
            <div class="md-form">
                <label for="materialContactFormMessage">Message</label>
                <textarea id="materialContactFormMessage" name="message" class="form-control md-textarea" rows="3" required></textarea>
            </div>
            <button class="btn btn-outline-danger btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Envoyer</button>
        </form>
        <div>
            <h2 class="borderbottomred text-white">Mes messages</h2><br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Sujet</th>
                        <th scope="col">Status</th>
                        <th scope="col">Administrateur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($myContact as $contact) { ?>
                    <tr>
                        <td>
                            <a href="http://localhost/Calove/nous-contactez/<?= $contact->getIdMessageContact() ?>"><?= $contact->getSujet() ?></a>
                        </td>
                        <td>
                            <span><?= $contact->getStatus() ?></span>
                        </td>
                        <td>
                            <span>Rayteur</span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>