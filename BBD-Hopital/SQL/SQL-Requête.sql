
-- Sélectionne le nom et le prenom des employés qui sont médecins et en pause.
SELECT NOMEMPLOYE, PRENOMEMPLOYE FROM EMPLOYE
WHERE IDROLE = (SELECT ID FROM ROLE WHERE NOMROLE = 'Medecin') 
    AND IDDISPONIBLE = (SELECT ID FROM DISPONIBLE WHERE DISPONIBLE = 'En pause');
commit;

-------------------------------------------------------------------------------
-- Récupère l'id, la date et la quantité de médicament d'une commande
SELECT ID, DATECOMMANDE, QUANTITECOMMANDE FROM COMMANDE 
WHERE IDETAT = 3; -- 1 = à faire   2 = En cours   3 = Livré
commit;

-------------------------------------------------------------------------------
-- Créer une vue qui affiche le mot de passe de l'utilisateur dont on a entré le login
CREATE VIEW user_mdp AS
    SELECT MDP FROM EMPLOYE
    WHERE LOGIN = 'Sodoxs';
commit;

-------------------------------------------------------------------------------
-- Récupère l'id, le nom du bloc, de la chambre, de l'étage et de l'aile d'un lit selon l'idLit du patient
SELECT LIT.ID, NUMBLOC, NUMCHAMBRE, NUMETAGE, NOMAILE FROM LIT
JOIN PATIENT ON PATIENT.IDLIT = LIT.ID
WHERE PATIENT.IDLIT = x; --remplacer x par un nombre
commit;

-------------------------------------------------------------------------------
-- Affiche le traitement dont les médicament ont été commandé avant le 15/12/18
SELECT TRAITEMENT.ID FROM COMPOSER JOIN TRAITEMENT ON COMPOSER.IDTRAITEMENT = TRAITEMENT.ID JOIN MEDICAMENT ON COMPOSER.IDMEDICAMENT = MEDICAMENT.ID JOIN COMMANDE ON MEDICAMENT.IDCOMMANDE= COMMANDE.ID
WHERE COMMANDE.DATECOMMANDE < '15/12/18';
commit;
