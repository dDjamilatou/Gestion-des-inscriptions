<div class="box3C">
        <div class="form_title">
            <h2>Liste des etudiants de la classe:
                <?php foreach( $listEtudiant as  $value):?> 
                    <?= $value["libelle"]?> 
                <?php endforeach; ?>
            </h2>
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom complet</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <?php foreach( $listEtudiant as  $value): ?>
                    <tbody>
                        <tr>
                            <td><?= $value["matricule"]?></td>
                            <td><?= $value["nom"]." ".$value["prenom"]?></td>
                            <td><?= $value["adresse"]?></td>
                        </tr>
                      </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        </div>
    </div>
    