<div class="container">
        <!-- <div class="box1">
            <div class="title">
                <h2>Année scolaire: 2022-2023</h2>
            </div>
            <div class="searchtop">
               <div class="search">
                    <img src="<?=WEBROOT;?>/Images/search.png" alt="">
                    <input type="text" placeholder="Search">
               </div>
               <img class="tof" src="<?=WEBROOT;?>/Images/tof1.png" alt="">
            </div>
        </div> -->
        <div class="box2">
            <div class="title">
                <h2>Année scolaire: <?= $_SESSION["etudiantConnect"]["nom_annee"]?></h2>
            </div>
            <div class="card">
                <div class="card1">
                    <p>Nombre d'étudiants <br>
                        suspendu ou annulé<br>leur inscription </p>
                   <a href="<?=WEBROOT;?>/?controller=user_connect&action=eff4"><img src="<?=WEBROOT;?>/Images/cap1.png" alt=""></a>
                </div>
                <div class="card2">
                    <p> L’effectif de
                        <br>
                        l'école</p>
                   <a href="<?=WEBROOT;?>/?controller=user_connect&action=eff1">
                    <img src="<?=WEBROOT;?>/Images/port1.png" alt="">
                   </a>
                </div>
                <div class="card3">
                    <p>Nombre de
                        <br>
                        garcons ou de<br>filles par classe</p>
                    <a href="<?=WEBROOT;?>/?controller=user_connect&action=eff2"><img src="<?=WEBROOT;?>/Images/cap2.png" alt=""></a>
                </div>
                <div class="card4">
                    <p>Nombre de
                        <br>
                        garcons ou de<br>filles par annee</p>
                    <a href="<?=WEBROOT;?>/?controller=user_connect&action=eff3"><img src="<?=WEBROOT;?>/Images/port2.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="box3">
            <h2>Le nombre de fille ou de garçon par classe</h2>
           
            <div class="tab">
                <table>
                    <thead>
                        <tr>
                            
                            <th>Année scolaire</th>
                            <th>Effectif</th>
                            <th>Libelle</th>
                            <th>Genre</th>
                        </tr>
                    </thead>
                    <?php foreach( $FindEffectifsFGParClasse as  $value): ?>
                    <tbody>
                        <tr>
                            <td><?= $value["nom_annee"]?></td>
                            <td><?= $value["Effectif"]?></td>
                            <td><?= $value["libelle"]?></td>
                            <td><?= $value["genre"]?></td>
                        </tr>
                      </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    
