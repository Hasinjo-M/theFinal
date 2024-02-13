create table utilisateur(
idadmin serial primary key,
mail varchar(20),
mdp char(8),
role ENUM('Admin','Utilisateur')
);


create table variete_the(
idvariete_the serial primary key,
nom varchar(20),
occupation float,
rendement float
);


create table parcelle(
idparcelle serial primary key,
numero int,
surface float,
idvariete_the int references variete_the(idvariete_the)
);


create table cueilleur(
idcueilleur serial primary key,
nom varchar(20),
adresse varchar(20)
);

create table categorie_depense(
idcategorie_depense serial primary key,
categorie text
);


create table salaire(
idsalaire serial primary key,
kgmin float not null,
kgmax float not null,
montant decimal(10,2)
);
-- Insertion de données de test dans la table salaire



create table cueillette(
idcueillette serial primary key,
idcueilleur int references cueilleur(idcueilleur),
idparcelle int references parcelle(idparcelle),
poids float,
date date 
);


create table depense(
iddepense serial primary key,
idcategorie_depense int references categorie_depense(idcategorie_depense),
montant decimal(10,2),
date date 
);

-- poids total cueillette

CREATE OR REPLACE VIEW v_poids_total AS
SELECT ROUND(COALESCE(SUM(poids), 0.00), 2) AS poids_total
FROM cueillette;



-- poids restant sur les parcelles 

CREATE OR REPLACE VIEW v_poids_restant AS
SELECT 
    p.idparcelle,
    EXTRACT(MONTH FROM gs.mois) AS mois_recolte,
    EXTRACT(YEAR FROM gs.mois) AS annee_recolte,
    ROUND(COALESCE((p.surface * 10000 * vt.rendement) - COALESCE(SUM(c.poids), 0), 0), 2) AS poids_restant
FROM 
    parcelle p
CROSS JOIN (
    SELECT DISTINCT DATE_FORMAT(c.date, '%Y-%m-01') AS mois
    FROM cueillette c
) gs
LEFT JOIN 
    cueillette c ON p.idparcelle = c.idparcelle AND DATE_FORMAT(c.date, '%Y-%m-01') = gs.mois
JOIN 
    variete_the vt ON p.idvariete_the = vt.idvariete_the
GROUP BY 
    p.idparcelle, mois_recolte, annee_recolte, p.surface, vt.rendement
ORDER BY 
    annee_recolte, mois_recolte, p.idparcelle;




--- cout de revient par kg 

create or replace view v_cout_revient as 
SELECT 
    COALESCE(SUM(d.montant), 0) / COALESCE(SUM(c.poids),1) AS cout_revient_par_kg
FROM 
    cueillette c
LEFT JOIN 
    depense d ON c.date = d.date
GROUP BY 
    c.date;


----view parcelle 
CREATE VIEW v_variete_parcelle AS
SELECT
    p.idparcelle,
    p.numero,
    p.surface,
    v.idvariete_the,
    v.nom AS nom_variete,
    v.occupation,
    v.rendement
FROM
    parcelle p
JOIN
    variete_the v ON p.idvariete_the = v.idvariete_the;



