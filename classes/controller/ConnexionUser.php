<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Immo</title>
</head>

<body>

    <?php
    require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../utils/Utils.php";
    require_once "../view/ViewConnexion.php";

    if (isset($_POST['connexion'])) { // il sert a verifier si il existe

        $donnees = [$_POST['mail'], $_POST['pass']];
        $table =  ModelUser::existeMail($_POST['mail']);








        if (isset($table['mail'])) {
            viewTemplate::alert('mail trouver', 'success', 'ConnexionUser.php');
            if (password_verify($_POST['pass'], $table['pass']))
            {
                viewTemplate::alert('pass ok', 'success', 'ConnexionUser.php');
            }       // verifier mdp   le $ table passe c'est le mdp que on hasher rechercher depuis tout a lheure 
            else{
                viewTemplate::alert('pass incorect', 'danger', 'ConnexionUser.php');
            }
        } else {
            viewTemplate::alert('mail existe pas', 'danger', 'ConnexionUser.php');
        }
    } else {
        ViewConnexion::Formconnexion();
    }
    ?>