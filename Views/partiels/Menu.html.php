<div class="sidebar">
        <div class="profil">
            <div class="PP">
                <img src="<?=WEBROOT;?>/Images/pp.png" alt="">
            </div>
            <h4> <?=$_SESSION["Connexion"]["prenom"]?> <?=$_SESSION["Connexion"]["nom"]?> </h4>
            <h4>Role: <?=$_SESSION["Connexion"]["nom_role"]?></h4>
            <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
                <h4>Classe: <?= $_SESSION["etudiantConnect"]["libelle"]?></h4>
            <?php endif;?>
        </div>
        <ul class="menu">
            <li><h4><a href="<?=WEBROOT;?>/?controller=user_connect&action=dashboard">Dashboard</a></h4></li>
            <?php if ($_SESSION["Connexion"]["nom_role"]=="RP" || $_SESSION["Connexion"]["nom_role"]=="Attaché") : ?>
            <li><a href="<?=WEBROOT;?>/?controller=user_connect&action=classe">Classes</a></li>
            <?php endif;?>
            <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
                <li><a href="<?=WEBROOT;?>/?controller=user_connect&action=prof">Professeurs</a></li>
                <li><a href="<?=WEBROOT;?>/?controller=user_connect&action=mesDemandes">Demandes</a></li>
            <?php endif;?>
            <?php if ($_SESSION["Connexion"]["nom_role"]=="Attaché") : ?>
            <li><a href="inscrire.html">Inscription</a></li>
            <li><a href="listeEtudiant.html">Réinscription</a></li>
            <li><a href="listeDemande.html">Demandes</a></li>
            <?php endif;?>
            <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
                <li><a href="<?=WEBROOT;?>/?controller=user_connect&action=mesDemandes">Mes demandes</a></li>
                <li><a href="soumettre.html">Soumettre<br>une demande</a></li> 
            <?php endif;?>
            <li class="Deconnexion"><a href="<?=WEBROOT;?>/?controller=user_connect&action=deconnexion">Deconnexion</a></li>
        </ul>
</div>