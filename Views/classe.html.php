<?php
if(!isset($_GET["Pos_page"])){
    $page=1;
}else{$page=$_GET["Pos_page"];}
$taille=count($ClasseEnseignerByprof);
$nombre_ligne=4;
$nombre_page=ceil($taille/$nombre_ligne);
// $page=$_GET["Pos_page"];
$position=($page-1)*$nombre_ligne;
$tab=array_slice($ClasseEnseignerByprof, $position, $nombre_ligne);
// var_dump($tab);
?>
    <div class="box3C">
        <div class="form_title">
            <h2></h2>
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <!-- <th>Professeur</th> -->
                        <th>Classe</th>
                    </tr>
                </thead>
                <?php foreach($tab as  $value): ?>
                    <tbody>
                        <tr>
                            <!-- <td><?= $value["prenom"]." ". $value["nom"]?></td> -->
                            <td><?= $value["libelle"]?></td>
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
    
