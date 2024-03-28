<div class="box33">
<?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
    <form class="forme11" action="<?=WEBROOT;?>" method="post">
        <!-- <label  style="margin-left: 3%;">Etat</label> -->
            <select class="selectEtat11" name="etats" id="">
                <option value="All">Les demandes de l’année:  2022-2023</option>
                <?php foreach($etats as $etat):?>
                    <option value="<?=$etat["nometat"]?>"><?=$etat["nometat"]?></option>
                <?php endforeach;?>
            </select>
            <input type="hidden" name="controller" value="commande">
            <button class="bout11" type="submit" name="action" value="show_commande">OK</button>
    </form>
    <?php endif; ?>
        <div class="forme3_title">
        <h2>Liste des demandes</h2>
        <?php if ($_SESSION["Connexion"]["nom_role"]=="ETUDIANT") : ?>
        <form class="forme1" action="<?=WEBROOT;?>" method="post">
        <!-- <label  style="margin-left: 3%;">Etat</label> -->
            <select class="selectEtat" name="etats" id="">
                <option value="All">All</option>
                <?php foreach($etats as $etat):?>
                    <option value="<?=$etat["nometat"]?>"><?=$etat["nometat"]?></option>
                <?php endforeach;?>
            </select>
            <input type="hidden" name="controller" value="commande">
            <button class="bout" type="submit" name="action" value="show_commande">OK</button>
        </form>
        <?php endif; ?>
        
        </div>
            
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>Motif demande</th>
                        <th>Date demande</th>
                        <th>Etat demande</th>
                       
                    </tr>
                </thead>
                <?php foreach( $MesDemandes as  $value): ?>
                    <tbody>
                        <tr>
                            <td><?= $value["motif"]?></td>
                            <td><?= $value["date"]?></td>
                            <td><?= $value["etat"]?></td>
                        </tr>
                      </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    <!-- </div> -->
</div>
    