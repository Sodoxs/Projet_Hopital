--Guillaume est beau.

SELECT NOMEMPLOYE, PRENOMEMPLOYE FROM EMPLOYE
WHERE IDROLE = (SELECT ID FROM ROLE WHERE NOMROLE = 'Medecin') 
    AND IDDISPONIBLE = (SELECT ID FROM DISPONIBLE WHERE DISPONIBLE = 'En pause');
commit;
-- Sélectionne le nom et le prenom des employés qui sont médecins et en pause.
