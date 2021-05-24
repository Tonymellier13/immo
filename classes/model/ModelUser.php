<?php

require_once "connexion.php";

class ModelUser
{
    public static function ajout($nom, $prenom, $mail, $pass, $tel, $token)
    {
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $connexion = connexion();
        $reqPrep = $connexion->prepare("INSERT INTO user VALUES (null,:nom,:prenom,:mail,:pass,:tel,'0','0','0',:token) ");
        $reqPrep->execute([':nom' => $nom, ':prenom' => $prenom, ':mail' => $mail, ':pass' => $hash, ':tel' => $tel, ':token' => $token]);
    }
    public static function verification($mail,$token)
    {
        $connexion=connexion();
        $reqPrep=$connexion->prepare("SELECT * FROM user WHERE mail=:mail AND token=:token" );
        $reqPrep->execute([':mail'=>$mail,':token'=>$token]);
        return $reqPrep->fetch(PDO::FETCH_ASSOC);

    }
    public static function validation($mail)
    {
        $connexion=connexion();
        $reqPrep=$connexion->prepare("UPDATE user SET confirme='1', actif  = '1' WHERE mail=mail");
        $reqPrep->execute([':mail'=>$mail]);


    }
    public static function existeMail($mail){
        $connexion= connexion();
        $reqPrep =$connexion->prepare("SELECT * FROM user WHERE mail=:mail");
        $reqPrep->execute([':mail' =>$mail]);
        return $reqPrep->fetch(PDO::FETCH_ASSOC);

    }

}

?>