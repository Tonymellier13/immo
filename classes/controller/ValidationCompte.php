<?php
require_once '../view/viewUser.php';
require_once '../model/modelUser.php';
require_once '../view/viewTemplate.php';

if (isset($_GET['mail']) && isset($_GET['token'])) {

    if (ModelUser::verification($_GET['mail'], $_GET['token'])) {

        ModelUser::validation($_GET['mail']);
     
        viewTemplate::alert('primary', 'connexion reussi',  'ConnexionUser.php');
         // renvoyer vers la page connexion 
    } else {
        viewTemplate::alert('danger', 'connexion impossible ',  'CreationUser.php');
        // renvoyer vers la page inscription
    }
}
?>