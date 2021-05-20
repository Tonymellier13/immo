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

if (isset($_POST['ajout'])){
    $token=mt_rand(10000, 99999);
    ModelUser::ajout($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['pass'],$_POST['tel'],$token);
ViewTemplate::alert('inscription reussie ','sucess','CreationUser.php');

}
else {
    ViewUser::InscriptionUser();
}