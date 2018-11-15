--Guillaume est beau.

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
