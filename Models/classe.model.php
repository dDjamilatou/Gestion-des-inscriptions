<?php
function FindAllclasse():array|null{
     //  requete parametree
    $sql="SELECT `libelle` , `nom_fil`, `nom_niv`,`id_classe`
         FROM `classe` c,`niveau` n,`filiere` f
         WHERE c.`id_fil`=f.`id_fil` AND c.`id_niv`=n.`id_niv`";
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

    function FindEffectifsClasse():array|null{
     //  requete parametree
    $sql="SELECT `libelle`, COUNT(i.`id_user`) AS `Effectif`, a.`nom_annee` 
    FROM `inscription` i, `anneescolaire` a, `users` u, `classe` c 
    WHERE i.`id_annee`=a.`id_annee` AND i.`id_user`=u.`id_user` 
    AND i.`id_classe`=c.`id_classe` AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
    GROUP BY `libelle`,`nom_annee`";
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
    function ClasseEnseignerByprof(int $id_prof):array|null{
     //  requete parametree
    $sql="SELECT `nom` , `prenom`, `libelle` FROM `peutenseigner`e,`users`u,`classe`c 
          WHERE e.`id_user`=u.`id_user` 
          AND e.`id_classe`=c.`id_classe` AND u.`id_user`= $id_prof ";
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
    function ListEtudiantByidclasse($idClasse):array|null{
     //  requete parametree
    $sql="SELECT `date_inscri`, `libelle` , `nom`, `prenom`, `matricule`,`adresse`
    FROM `classe` c,`anneescolaire` a,`users` u,`inscription`i
    WHERE c.`id_classe`=i.`id_classe` AND i.`id_user`=u.`id_user` 
    AND i.`id_annee`=a.`id_annee` AND a.`etat_annee`=1  AND c.`id_classe`=$idClasse ";
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

