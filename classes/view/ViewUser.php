<?php
class ViewUser
{

    public static function FormInscription()
    {
        isset($_POST['ajout']) ? $formSubmit = true : $formSubmit = false;
?>
        <div class="container mt-2">
            <div class="text-center" id='erreurs'></div>
            <form name="ajout_user" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control" aria-describedby="nom" value="<?php echo $formSubmit ? $_POST['nom'] : '' ?>" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" class="form-control" aria-describedby="prenom" value="<?php echo $formSubmit ? $_POST['prenom'] : '' ?>" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="mail" id="mail" class="form-control" aria-describedby="mail" value="<?php echo $formSubmit ? $_POST['mail'] : '' ?>" placeholder="Adresse mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-control" aria-describedby="pass" placeholder="mot de passe" required>
                </div>

                <div class="form-group">
                    <input type="tel" name="tel" id="tel" class="form-control" aria-describedby="tel" value="<?php echo $formSubmit ? $_POST['tel'] : '' ?>" placeholder="Tel" required>
                </div>




                <button type="submit" id="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php

    }
    public static function mailMdp(){
        ?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="container">
                <h2 class="mb-md-4">Mot de passe oublié</h2>
                <label class="form-group">Adresse mail</label>
                <input type="email" class="form-control" name="mail">
                <button type="submit" class="btn btn-primary mb-md-4 mt-md-4" name="mailMdp">Valider</button>
            </div>
        </form>
        <?php
    }
    public static function resetMdp($mail){
        ?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="container">
                <h2 class="mb-md-4">Mot de passe oublié</h2>
                <input type="hidden" class="form-control" value="<?= $mail?>" name="mail1">
                <label class="form-group">Nouveau mot de passe</label>
                <input type="password" class="form-control" name="pass2">
                <label class="form-group">Confirmer nouveau mot de passe</label>
                <input type="password" class="form-control" name="pass3">
                <button type="submit" class="btn btn-primary mb-md-4 mt-md-4" name="validerMdp">Valider</button>
            </div>
        </form>
    <?php
    }

}
