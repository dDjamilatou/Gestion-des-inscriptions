<?php
function DemandeAnneeEncours(int $idEtudiant,string $annee, string $etat):array|null{
      //  requete parametree
$sql="SELECT * FROM `demande`d,`inscription` i,`anneescolaire`a 
      WHERE d.`id_inscri`=i.`id_inscri`AND i.`id_annee`=a.`id_annee`
      AND i.`id_user`=$idEtudiant ";
if ($annee!="All") {
     $sql.= " and nom_annee like '$annee' ";
}
elseif ($etat!="All") {
     $sql.= " and etat like '$etat' ";
}
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

function FindEtatDemande():array|null{
      //  requete parametree
$sql="SELECT DISTINCT `etat` FROM `demande`;";
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

// function ShowDemande($idEtudiant):array|null{
//       $demandes=DemandeAnneeEncours();
//       $Mesdemandes=[];
//       foreach($demandes as $demande){
//               if($demande["id_user"]==$idEtudiant){
//                   $Mesdemandes[]=$demande;
                  
//               }
//       }

//       return  $Mesdemandes;
// }
     
     function FindEtudiantById(int $etudiantId):array|null{
        $etudiants=FindAllEtudiant();
        foreach( $etudiants as  $etudiant){
                if( $etudiant["id_E"]== $etudiantId){
                        return $etudiant;
                        
                }
        }

        return null;
     }
function addDemande(array $newDemande): void{
      //  requete parametree
     $sql="INSERT INTO `demande` (`id_demande`, `type`, `motif`, `date`, `etat`, `id_inscri`) 
      VALUES (NULL, 'Absence', 'Voyage', '2024-04-03', 'En attente', '12');";
     //Classe PDO
      //1-Connexion SGBD et Selectionner la BD
        $servername = 'localhost';
        $username = 'root';
        $password ="";
        $dbname="bd_commande";
        try {
             $conn= new PDO("mysql:host=$servername; dbname=$dbname",  $username,  $password);
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
               //2-Executer la requete
               $statement= $conn->prepare($sql);
               $statement->execute($newDemande);
           
              //4-Fermer la connexion
              $conn==null;
              $statement==null;
 
        } catch (PDOException $e) {
             echo "Erreur : " . $e->getMessage();
        }
 
        
 }