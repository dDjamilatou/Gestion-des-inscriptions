<?php
if(!isset($_GET["Pos_page"])){
    $page=1;
}else{$page=$_GET["Pos_page"];}
$taille=count($classes);
if ($_SESSION["Connexion"]["nom_role"]=="RP"){
    $nombre_ligne=4;
}
if ($_SESSION["Connexion"]["nom_role"]=="Attaché"){
    $nombre_ligne=3;
}
$nombre_page=ceil($taille/$nombre_ligne);
// $page=$_GET["Pos_page"];
$position=($page-1)*$nombre_ligne;
$tab=array_slice($classes, $position, $nombre_ligne);
// var_dump($tab);
?>
    <div class="box3C">
        <div class="form_title">
            <h2>Liste des classes</h2>
            <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
            <a href="formajoutclass.html"><button class="butt"><h3>Ajouter</h3></button></a>
            <?php endif;?>
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>Classe</th>
                        <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
                        <th>Filiére</th>
                        <th>Niveau</th>
                        <?php endif; ?>
                        <?php if ($_SESSION["Connexion"]["nom_role"]=="Attaché") : ?>
                        <th>Details</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <?php foreach($tab as  $value): ?>
                    <tbody>
                        <tr>
                            <td><?= $value["libelle"]?></td>
                            <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
                            <td><?= $value["nom_fil"]?></td>
                            <td><?= $value["nom_niv"]?></td>
                            <?php endif; ?>
                            <?php if ($_SESSION["Connexion"]["nom_role"]=="Attaché") : ?>
                            <td><a href="<?=WEBROOT;?>/?controller=user_connect&action=listEtudiant&id=<?=$value["id_classe"]?>"><button class="butte">Listes etudiants</button></a> </td>
                            <?php endif; ?>
                        </tr>
                      </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="pagination">
                    <?php for($i=1; $i<=$nombre_page; $i++): ?>
                         <a class="pagina" href="<?=WEBROOT?>/?controller=user_connect&action=classe&Pos_page=<?=$i?>"> <?= $i ?> </a>
                    <?php endfor; ?>
        </div>
    
        </div>
    </div>
    
