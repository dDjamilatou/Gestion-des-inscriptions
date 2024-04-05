<div class="box33">
<?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
    <form class="forme11" action="<?=WEBROOT;?>" method="post">
            <select class="selectEtat11" name="annee" id="">
                <option value="All">Toutes les demandes effectuées</option>
                <?php foreach($annees as $value):?>
                    <option value="<?=$value["nom_annee"]?>" <?php if($value["nom_annee"]==$_SESSION["annee"]) echo 'selected';?>>Les demandes de l’année: <?=$value["nom_annee"]?></option>
                <?php endforeach;?>
            </select>
            <input type="hidden" name="controller" value="user_connect">
            <button class="bout11" type="submit" name="action" value="mesDemandes">OK</button>
    </form>
    <?php endif; ?>
        <div class="forme3_title">
        <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
        <h2>Liste des demandes</h2>
        <?php endif; ?>
        <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
        <h2>Liste des demandes traitées et non traitées</h2>
        <?php endif; ?>
        <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
        <form class="forme1" method="post" action="<?=WEBROOT;?>">
            <select class="selectEtat" name="etat" id="">
                <option value="All">All</option>
                <?php foreach($etats as $value):?>
                    <option value="<?=$value["etat"]?>" <?php if($value["etat"]==$_SESSION["etat"]) echo 'selected';?> ><?=$value["etat"]?></option>
                <?php endforeach;?>
            </select>
            <input type="hidden" name="controller" value="user_connect">
            <button class="bout" type="submit" name="action" value="mesDemandes">OK</button>
        </form>
        <?php endif; ?>
        
        </div>
            
        <div class="tab">
            <table>
                <thead>
                    <tr>
                    <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
                        <th>Motif demande</th>
                        <th>Date demande</th>
                        <th>Etat demande</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
                        <th>Demande</th>
                        <th>Date</th>
                        <th>Etat</th>
                    <?php endif; ?>
                    </tr>
                </thead>
                <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
                <?php foreach( $MesDemandes as  $value): ?>
                    <tbody>
                        <tr>
                            <td><?= $value["motif"]?></td>
                            <td><?= $value["date"]?></td>
                            <td><?= $value["etat"]?></td>
                        </tr>
                      </tbody>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($_SESSION["Connexion"]["nom_role"]=="RP") : ?>
                <?php foreach( $Demandes as  $value): ?>
                    <tbody>
                        <tr>
                            <td>#000<?= $value["id_demande"]?></td>
                            <td><?= $value["date"]?></td>
                            <td><?= $value["etat"]?></td>
                        </tr>
                      </tbody>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    <!-- </div> -->
</div>
    