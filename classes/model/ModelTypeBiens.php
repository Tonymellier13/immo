<?php
require_once "connexion.php";

class ModelTypeBien
{
    public static function CreationTypeBien($libelle)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("INSERT INTO type_bien VALUES (null, :libelle)");
        $requete->execute([":libelle" => $libelle]);
    }
    public static function ListeTypeBien()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("SELECT * FROM type_bien");
        $requete->execute();
        return $requete->fetchAll();
    }
    public static function ModificationTypeBien($id, $libelle)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("UPDATE type_bien SET libelle = :libelle WHERE id = :id");
        $requete->execute([":id" => $id, ":libelle" => $libelle]);
    }
    public static function SupTypeBien($id, $libelle)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("DELETE *
        FROM type_bien  
        WHERE id = :id AND libelle = :libelle");
        $requete->execute([":id" => $id , 'libelle' => $libelle]);
    }

}
    ?>