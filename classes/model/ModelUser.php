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
    public static function getById($id)
    {
        $connexion = connexion();
        $rPrep = $connexion->prepare("SELECT * FROM user WHERE id=?");
        $rPrep->execute([$id]);
        return $rPrep->fetch(pdo::FETCH_ASSOC);
    }
    public static function resetMdp($mail,$mdp)
    {
        $hash = password_hash($mdp, PASSWORD_BCRYPT);
        $connexion = connexion();
        $rPrep = $connexion->prepare("UPDATE user SET pass=:pass WHERE mail=:mail");
        $rPrep->execute([':mail' => $mail, ':pass' => $hash]);

    }
    public static function modifColonneUser($colonne, $valeur, $mail)
    {
        $connexion = connexion();
        $rPrep = $connexion->prepare("UPDATE user SET $colonne=? WHERE mail=? ");
        $rPrep->execute([$valeur, $mail]);
    }
    public function __construct($id)
    {
        $donnees = $this->getById($id);
        $this->id = $id;
        $this->nom = $donnees['nom'];
        $this->prenom = $donnees['prenom'];
        $this->mail = $donnees['mail'];
        $this->pass = $donnees['pass'];
        $this->tel = $donnees['tel'];
        $this->role = $donnees['role'];
        $this->confirme = $donnees['confirme'];
        $this->actif = $donnees['actif'];
        $this->token = $donnees['token'];
        $this->favoris = [1];
    } 
    public function getId()
    {
        return $this->id;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getTel()
    {
        return $this->tel;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getConfirme()
    {
        return $this->confirme;
    }
    public function getActif()
    {
        return $this->actif;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function getAnnonces()
    {
        return $this->annonces;
    }
    public function getFavoris()
    {
        return $this->favoris;
    }
    public function setNom($newNom)
    {
        $this->nom = $newNom;
        return $this;
    }
    public function setPrenom($newPrenom)
    {
        $this->prenom = $newPrenom;
        return $this;
    }
    public function setMail($newMail)
    {
        $this->mail = $newMail;
        return $this;
    }
    public function setPass($newPass)
    {
        $this->pass = $newPass;
        return $this;
    }
    public function setTel($newTel)
    {
        $this->tel = $newTel;
        return $this;
    }
    public function setRole($newRole)
    {
        $this->role = $newRole;
        return $this;
    }
    public function setConfirme($newConfirme)
    {
        $this->confirme = $newConfirme;
        return $this;
    }
    public function setActif($newActif)
    {
        $this->actif = $newActif;
        return $this;
    }
    public function setToken($newToken)
    {
        $this->token = $newToken;
        return $this;
    }
    public function setAnnonces($newAnnonces)
    {
        $this->annonces = $newAnnonces;
        return $this;
    }
    public function setFavoris($newFavoris)
    {
        $this->favoris = $newFavoris;
        return $this;
    }
  

}

?>