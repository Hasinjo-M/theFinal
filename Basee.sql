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
montant decimal(10,2)
);


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

create or replace view v_poids_restant as
SELECT 
p.idparcelle,
    COALESCE((p.surface * vt.rendement) - COALESCE(SUM(c.poids), 0),0) AS poids_restant
FROM 
    parcelle p
LEFT JOIN 
    cueillette c ON p.idparcelle = c.idparcelle
JOIN 
    variete_the vt ON p.idvariete_the = vt.idvariete_the
GROUP BY 
    p.idparcelle, p.surface, vt.rendement;

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

