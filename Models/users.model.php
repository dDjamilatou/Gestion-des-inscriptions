<?php
function FindAllUsers():array|null{
        //  requete parametree
       $sql="SELECT * FROM `users`u,`role` r WHERE u.`id_role`=r.`id_role`";
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
   
function FindAllUsersByprof():array|null{
     //  requete parametree
    $sql="SELECT * FROM `users`u,`role` i, `grade`g WHERE u.`id_role`=i.`id_role`
         AND u.`id_grade`=g.`id_grade`";
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


function FindAllEtudiant(){
        $users=FindAllUsers();
        $etudiants=[];
        foreach($users as $user){
                if($user["id_role"]==3){
                        $etudiants[]=$user;
                }
        }

        return $etudiants;
     }

     function FindAllProfs(){
        $users=FindAllUsersByprof();
        $profs=[];
        foreach($users as $user){
                if($user["id_role"]==4){
                        $profs[]=$user;
                }
        }

        return $profs;
     }


     function Connexion(string $login,string $mdp):array|null{
        $users=FindAllUsers();
        foreach($users as $user){
                if($user["login"]==$login && $user["mdp"]==$mdp){
                        return $user;

                }
        }
        return null;
}


function FindIdEtudiantconnect(int $id_etudiantConnect):array|null{
        //  requete parametree
       $sql="SELECT * FROM `inscription`i,`users`u,`classe`c,`anneescolaire`a,`role`r 
       WHERE i.`id_user`=u.`id_user` AND i.`id_classe`=c.`id_classe` 
       AND i.`id_annee`=a.`id_annee` AND u.`id_role`=r.`id_role` 
       AND a.`etat_annee`=1 AND u.`id_user`= $id_etudiantConnect";
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
                $data=$statement->fetch();
                //4-Fermer la connexion
                $conn==null;
                $statement==null;
   
          } catch (PDOException $e) {
               echo "Erreur : " . $e->getMessage();
          }
   
          return $data;
       }

       function FindEffectifsSuspenduAnnule():array|null{
        //  requete parametree
       $sql="SELECT COUNT(`id_user`) AS `Effectif`, a.`nom_annee`,d.`type` 
       FROM `inscription` i, `anneescolaire` a, `demande` d 
       WHERE i.`id_annee`=a.`id_annee` AND i.`id_inscri`=d.`id_inscri` 
       AND d.`etat`='Accepter' AND (d.`type`='Annulation' OR d.`type`='Suspension') 
       AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
       GROUP BY a.`etat_annee`, d.`type`;";
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

       function FindEffectifsParAnnees():array|null{
        //  requete parametree
       $sql="SELECT a.`nom_annee`, COUNT(`id_user`) AS `Effectif`
       FROM `inscription` i, `anneescolaire` a 
       WHERE i.`id_annee`=a.`id_annee`
       AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
       GROUP BY a.`etat_annee`;";
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
   
       function FindEffectifsFGParClasse():array|null{
        //  requete parametree
       $sql="SELECT a.`nom_annee`,COUNT(i.`id_user`) AS `Effectif`, `libelle`, `genre` 
       FROM `inscription` i, `anneescolaire` a, `users` u, `classe` c 
       WHERE i.`id_annee`=a.`id_annee` AND i.`id_user`=u.`id_user`
       AND i.`id_classe`=c.`id_classe` AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
       GROUP BY `libelle`,`nom_annee`, `genre`;";
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

       function FindEffectifsFGParAnnee():array|null{
        //  requete parametree
       $sql="SELECT COUNT(i.`id_user`) AS `Effectif`, a.`nom_annee`, `genre` 
       FROM `inscription` i, `anneescolaire` a, `users` u 
       WHERE i.`id_annee`=a.`id_annee` AND i.`id_user`=u.`id_user`
       AND (a.`etat_annee`=0 OR a.`etat_annee`=1)
       GROUP BY `genre`,`nom_annee`;";
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
   

        


