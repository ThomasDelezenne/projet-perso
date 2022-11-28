<?php
/* 
Fonction Connect
    Rôle :
        Elle a pour rôle de se connecter à la base de données.
    Paramètres :
        -Entrée-
            Aucun
        -Sortie-
            $connect : Retourne la connection
*/ 
function Connect()
{
    $serveur="localhost"; //Nom du serveur
    $nom="root"; //Nom utilisateur
    $motpasse=""; //Mot de passe
    $base="sitemarchand"; //Nom de la base de données
    Try
        {
        $connect = new PDO("mysql:host=".$serveur.";dbname=".$base, $nom, $motpasse);
        }
        Catch(PDOException $e)
        {
        echo "Impossible de se connecter!".$e -> getMessage();
    }
    return $connect;
}

/* 
Fonction Deconnect($connect)
    Rôle :
        Elle a pour rôle de se déconnecter de la base de données.
    Paramètres :
        -Entrée-
            $connect : La connection à la base de données.
        -Sortie-
            Aucun
*/ 
function Deconnect($connect)
{
    if ($connect)
    $connect = NULL;
}

/* 
Fonction SelectUnCritere($table, $champ1, $critere1)
    Rôle :
        permet de selectioné un champ grace a un critère spécifique
        -Entrée-
            $table:information d'un table de la BDD
            $champ1: information du champ 1
            $critere1: information du critere 1
        -Sortie-
            Aucun
*/ 
function SelectUnCritere($table, $champ1, $critere1)
{
$connect=Connexion();
$query=$connect ->prepare("select * from ".$table." where ".$champ1." = :critere1") ;
$query -> execute(array(':critere1'=>$critere1));
Deconnexion($connect);
return $query;
}
/* 
Fonction Deconnect($connect)
    Rôle :
        permet de selectioné un champ grace a deux critères spécifiques
        -Entrée-
            $table:information d'un table de la BDD
            $champ1: information du champ 1
            $critere1: information du critere 1
             $champ1: information du champ 2
            $critere1: information du critere 2
        -Sortie-
            Aucun
*/ 
function SelectDeuxCritere($table, $champ1, $critere1, $champ2, $critere2)
{
    $connect=Connexion(); 
    $query=$connect ->prepare("select * from ".$table." where ".$champ1." = :critere1" and .$champ2." = :critere2") ;
    $query -> execute(array(':critere1'=>$critere1, ':critere2'=>$critere2)); 
    Deconnexion($connect);
    return $query;
}


 
