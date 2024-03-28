<?php
function FindAllmodule():array|null{
     //  requete parametree
    $sql="SELECT * FROM `module`";
    $data=null;
    //Classe PDO
     //1-Connexion SGBD et Selectionner la BD
       $servername = 'localhost';
       $username = 'root';
       $password ="";
       $dbname="gestion_inscription";
       try {
            $conn= new PDO("mysql:host=$servername; dbname=$dbname",  $username,  $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
              //2-Executer la requete
              $statement= $conn->prepare($sql);
              $statement->execute();
             //3-Recuperer les donnees de la requete
             $data=$statement->fetchAll();
             //4-Fermer la connexion
             $conn==null;
             $statement==null;

       } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
       }

       return $data;
    }
    function ModuleEnseignerByprof(int $id_prof):array|null{
     //  requete parametree
    $sql="SELECT `nom` , `prenom`, `nom_module`
    FROM `enseigner`e,`users`u,`module`m WHERE e.`id_user`=u.`id_user` 
    AND e.`id_module`=m.`id_module` AND u.`id_user`=$id_prof ";
    $data=null;
    //Classe PDO
     //1-Connexion SGBD et Selectionner la BD
       $servername = 'localhost';
       $username = 'root';
       $password ="";
       $dbname="gestion_inscription";
       try {
            $conn= new PDO("mysql:host=$servername; dbname=$dbname",  $username,  $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
              //2-Executer la requete
              $statement= $conn->prepare($sql);
              $statement->execute();
             //3-Recuperer les donnees de la requete
             $data=$statement->fetchAll();
             //4-Fermer la connexion
             $conn==null;
             $statement==null;

       } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
       }

       return $data;
    }

