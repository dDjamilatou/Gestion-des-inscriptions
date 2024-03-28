<?php
function DemandeAnneeEncours():array|null{
      //  requete parametree
$sql="SELECT * FROM `demande`d,`inscription` i,`anneescolaire`a 
      WHERE d.`id_inscri`=i.`id_inscri`AND i.`id_annee`=a.`id_annee`
      AND a.`etat_annee`=1;";
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

function ShowDemande($idEtudiant):array|null{
      $demandes=DemandeAnneeEncours();
      $Mesdemandes=[];
      foreach($demandes as $demande){
              if($demande["id_user"]==$idEtudiant){
                  $Mesdemandes[]=$demande;
              }
      }

      return  $Mesdemandes;
}
     
     function FindEtudiantById(int $etudiantId):array|null{
        $etudiants=FindAllEtudiant();
        foreach( $etudiants as  $etudiant){
                if( $etudiant["id_E"]== $etudiantId){
                        return $etudiant;
                        
                }
        }

        return null;
     }
     
      
   


      
//      function FindAllClasse(){
//         $Classes=jsonToArray("classes");
        
//         return $Classes;
//      }

      //Fusion entre Classe et Etudiant
//      function FindClassebyID(int $classeId):array|null{
//         $classes=FindAllClasse();
//         foreach( $classes as  $classe){
//                 if( $classe["id_C"]== $classeId){
//                         return $classe;
                        
//                 }
//         }

//         return null;
//      }

     
    
//      function FindEtudiant(){
//        $etudiants=FindAllEtudiant();
//        $etudiantClasse=[];
//        foreach($etudiants as $etudiant){
//                $classeId=$etudiant["id_Classe"];
//                $classe=FindClassebyID($classeId);
//                //Fusion: on ecrase id de $classe
//                $etudiantClasse[]=array_merge($classe, $etudiant);
//        }
       
//        return $etudiantClasse;
//      }
      // Fin de Fusion entre Classe et Etudiant


//      function FindDemandeByEtudiantAndAnnee(int $etudiantId,int $anneeId):array|null{
//         $demandes=ShowDemande();
//         $demandesEtu=[];
//         foreach($demandes as $demande){
//                 if($demande["id_Etudiant"]==$etudiantId && $demande["id_Annee"]==$anneeId){
//                         $demandesEtu[]=$demande;
//                 }
//         }
//         return $demandesEtu;
// }
function addDemande(array $newDemande): void{
        arrayToJson($newDemande,"Demandes");
}