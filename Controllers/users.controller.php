<?php
if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"]=="connecter") {
        $userConnect=Connexion($_POST["login"], $_POST["mdp"] );
        if (isset( $userConnect)) {
            $_SESSION["Connexion"]= $userConnect;
            if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") {
                $_SESSION["etudiantConnect"]=FindIdEtudiantconnect($_SESSION["Connexion"]["id_user"]);
            }
            $Effectifs=FindEffectifsClasse();
            LoadView("Accueil.html.php", ["Effectifs"=>$Effectifs]);
        }
       
    }elseif($_REQUEST["action"]=="dashboard"){
        $Effectifs=FindEffectifsClasse();
        LoadView("Accueil.html.php", ["Effectifs"=>$Effectifs]);
    }
    elseif($_REQUEST["action"]=="deconnexion"){
        require_once("../Views/layout/connexion.layout.php");
    }
    elseif($_REQUEST["action"]=="mesDemandes"){
        $MesDemandes=ShowDemande($_SESSION["Connexion"]["id_user"]);
        LoadView("listedemande.html.php", ["MesDemandes"=>$MesDemandes]);
    }
    elseif($_REQUEST["action"]=="eff4"){
        $EffectifsPartype=FindEffectifsSuspenduAnnule();
        LoadView("eff4.html.php", ["EffectifsPartype"=> $EffectifsPartype]);
    }
    elseif($_REQUEST["action"]=="eff1"){
        $FindEffectifsParAnnees=FindEffectifsParAnnees();
        LoadView("eff1.html.php", ["FindEffectifsParAnnees"=>$FindEffectifsParAnnees]);
    }
    elseif($_REQUEST["action"]=="eff2"){
        $FindEffectifsFGParClasse=FindEffectifsFGParClasse();
        LoadView("eff2.html.php", ["FindEffectifsFGParClasse"=>$FindEffectifsFGParClasse]);
    }
    elseif($_REQUEST["action"]=="eff3"){
        $FindEffectifsFGParAnnee=FindEffectifsFGParAnnee();
        LoadView("eff3.html.php", ["FindEffectifsFGParAnnee"=>$FindEffectifsFGParAnnee]);
    }
    elseif($_REQUEST["action"]=="classe"){
        $classes=FindAllclasse();
        LoadView("listeclasse.html.php", ["classes"=>$classes]);
    }
    elseif($_REQUEST["action"]=="prof"){
        $profs=FindAllProfs();
        LoadView("listeprof.html.php", ["profs"=>$profs]);
    }
    elseif($_REQUEST["action"] == "Moduleprof"){
        $ModuleEnseignerByprof= ModuleEnseignerByprof($_REQUEST["id"]);
        LoadView("module.html.php", ["ModuleEnseignerByprof"=>$ModuleEnseignerByprof]);
    }
    elseif($_REQUEST["action"] == "Classeprof"){
        $ClasseEnseignerByprof= ClasseEnseignerByprof($_REQUEST["id"]);
        LoadView("classe.html.php", ["ClasseEnseignerByprof"=>$ClasseEnseignerByprof]);
    }
}else {
    require_once("../Views/layout/connexion.layout.php");
    
    
}