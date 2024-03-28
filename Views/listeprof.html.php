<?php
if(!isset($_GET["Pos_page"])){
    $page=1;
}else{$page=$_GET["Pos_page"];}
$taille=count($profs);
$nombre_ligne=4;
$nombre_page=ceil($taille/$nombre_ligne);
// $page=$_GET["Pos_page"];
$position=($page-1)*$nombre_ligne;
$tab=array_slice($profs, $position, $nombre_ligne);
// var_dump($tab);
?>
    <div class="box3C">
        <div class="form_title">
            <h2>Liste des classes</h2>
            <a href="formajoutclass.html"><button class="butt"><h3>Ajouter</h3></button></a>
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>Grade</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <?php foreach($tab as  $value): ?>
                    <tbody>
                        <tr>
                            <td><?= $value["prenom"]." ".$value["nom"]?></td>
                            <td><?= $value["nom_grade"]?></td>
                            <td><a href="<?=WEBROOT;?>/?controller=user_connect&action=Moduleprof&id=<?=$value["id_user"]?>"><button class="but">Modules</button></a> <a href="<?=WEBROOT;?>/?controller=user_connect&action=Classeprof&id=<?=$value["id_user"]?>"><button class="but">Classes</button></a></td>
                        </tr>
                      </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="pagination">
                    <?php for($i=1; $i<=$nombre_page; $i++): ?>
                         <a class="pagina" href="<?=WEBROOT?>/?controller=user_connect&action=prof&Pos_page=<?=$i?>"> <?= $i ?> </a>
                    <?php endfor; ?>
        </div>
    
        </div>
    </div>
    
