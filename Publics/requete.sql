-- Ajout des données  dans la table users
INSERT INTO `users` (`id_user`, `nom`, `prenom`, `login`, `mdp`, `matricule`, `id_role`, `genre`, `adresse`, `id_grade`) VALUES
(null, 'Diallo', 'Mamoudou', 'Mamoudou@gmail.com', 'Mamoudou123', 'mat00001', 3,'Masculin','Dakar',NULL),
(null, 'Bah', 'Abdou', 'Abdou@gmail.com', 'Abdou123', 'mat00002', 3,'Masculin','Pikine',NULL),
(null, 'Bah', 'Amadou', 'Amadou@gmail.com', 'Amadou123', NULL, 1,'Masculin','Dakar',NULL),
(null, 'Fall', 'Modou', 'Modou@gmail.com', 'Modou123', NULL, 2,'Masculin','Ngor',NULL),
(null, 'Diallo', 'Djamilatou', 'Djamilatou@gmail.com', 'Djamilatou123', 'mat00005', 3,'Feminin','Dakar',NULL),
(null, 'Diop', 'Fatou', 'Fatou@gmail.com', 'Fatou123', 'mat00006', 3,'Feminin','Fass',NULL),
(null, 'Diallo', 'Fatoumata', 'Fatoumata@gmail.com', 'Fatou123', 'mat00007', 3,'Feminin','Fass',NULL),
(null, 'Kane', 'Fatou', 'Fatoukane@gmail.com', 'Fatou123', 'mat00007', 3,'Feminin','Colobane',NULL);


-- Ajout des données  dans la table role
INSERT INTO `role` (`id_role`, `nom_role`) VALUES 
(NULL, 'RP'), 
(NULL, 'AC'),
(NULL, 'Etudiant'), 
(NULL, 'Professeur');


-- Ajout des données  dans la table annee scolaire
INSERT INTO `anneescolaire` (`id_annee`, `nom_annee`) VALUES
(1, '2021-2022'),
(2, '2022-2023'),
(3, '2023-2024');


-- Ajout des données  dans la table inscription
INSERT INTO `inscription` (`id_inscri`, `date_inscri`, `id_user`, `id_classe`, `id_annee`) VALUES 
(NULL, '2024-10-07', '5', '7', '3'),
(NULL, '2024-09-01', '1', '6', '3'),
(NULL, '2024-10-07', '6', '7', '3'),
(NULL, '2024-09-04', '2', '6', '3');



-- Ajout des données  dans la table demande
INSERT INTO `demande` (`id_demande`, `type`, `motif`, `date`, `etat`, `id_inscri`) VALUES
(1, 'Annulation', 'Voyage', '2024-02-05', 'Rejeter', 1),
(2, 'Absence', 'Visite medical', '2024-02-11', 'Accepter', 2),
(3, 'Absence', 'Visite medical', '2024-02-11', 'En cours', 3),
(4, 'Absence', 'Visite medical', '2024-02-15', 'Accepter', 1),
(5, 'Absence', 'Visite medical', '2024-02-15', 'Accepter', 4),
(6, 'Absence', 'Visite medical', '2024-02-10', 'Rejeter', 2);



-- Ajout des données  dans la table enseigner
INSERT INTO `enseigner` (`Id_user`, `id_module`) VALUES 
('9', '2'), 
('9', '1'),
('10', '3'), 
('10', '4'), 
('9', '6');



-- Ajout des données  dans la table peutenseigner
INSERT INTO `peutenseigner` (`id_user`, `id_classe`) VALUES 
('9', '1'), 
('9', '6'), 
('9', '2'),
('10', '2'), 
('10', '9');



-- Ajout des données  dans la table niveau
INSERT INTO `niveau` (`id_niv`,`nom_niv`) VALUES 
(null, 'L1'),
(null, 'L2'),
(null, 'L3'),
(null, 'Master1'),
(null, 'Master2');



-- Ajout des données  dans la table filiere
INSERT INTO `filiere` (`id_fil`,`nom_fil`) VALUES 
(null, 'Design'),
(null, 'Dev web'),
(null, 'Marketing'),
(null, 'Reseaux'),
(null, 'GL');


-- l’effectif de l'école par année,
SELECT COUNT(`id_user`) AS `Effectif`, a.`nom_annee`
FROM `inscription` i, `anneescolaire` a 
WHERE i.`id_annee`=a.`id_annee`
AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
GROUP BY a.`etat_annee`;


--le nombre de fille ou de garçon par année
SELECT COUNT(i.`id_user`) AS `Effectif`, a.`nom_annee`, `genre` 
FROM `inscription` i, `anneescolaire` a, `users` u 
WHERE i.`id_annee`=a.`id_annee` AND i.`id_user`=u.`id_user`
AND (a.`etat_annee`=0 OR a.`etat_annee`=1)
GROUP BY `genre`,`nom_annee`;


--l’effectif par classe,
SELECT `libelle`, COUNT(i.`id_user`) AS `Effectif`, a.`nom_annee` 
FROM `inscription` i, `anneescolaire` a, `users` u, `classe` c 
WHERE i.`id_annee`=a.`id_annee` AND i.`id_user`=u.`id_user` 
AND i.`id_classe`=c.`id_classe` AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
GROUP BY `libelle`,`nom_annee`;


--le nombre de fille ou de garçon par classe
SELECT COUNT(i.`id_user`) AS `Effectif`, a.`nom_annee`, `libelle`, `genre` 
FROM `inscription` i, `anneescolaire` a, `users` u, `classe` c 
WHERE i.`id_annee`=a.`id_annee` AND i.`id_user`=u.`id_user`
AND i.`id_classe`=c.`id_classe` AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
GROUP BY `libelle`,`nom_annee`, `genre`;


--le nombre d'étudiants qui ont suspendu ou annulé leur inscription par année.
SELECT COUNT(`id_user`) AS `Effectif`, a.`nom_annee`,d.`type` 
FROM `inscription` i, `anneescolaire` a, `demande` d 
WHERE i.`id_annee`=a.`id_annee` AND i.`id_inscri`=d.`id_inscri` 
AND d.`etat`="Accepter" AND (d.`type`="Annulation" OR d.`type`="Suspension") 
AND (a.`etat_annee`=0 OR a.`etat_annee`=1) 
GROUP BY a.`etat_annee`, d.`type`;


--Cette requete permet de recuperer les demandes de l'annéeEnCours
SELECT * FROM `demande`d,`inscription` i,`anneescolaire`a 
WHERE d.`id_inscri`=i.`id_inscri`AND i.`id_annee`=a.`id_annee` AND a.`etat_annee`=1;