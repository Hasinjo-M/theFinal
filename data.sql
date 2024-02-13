-- Inserting test data into the utilisateur table
INSERT INTO utilisateur (mail, mdp, role)
VALUES 
    ('admin@gmail.com', 'admin123', 'Admin'),
    ('rakoto@.com', 'password1', 'Utilisateur'),
    ('rabe@example.com', 'password2', 'Utilisateur');


-- Inserting test data into the variete_the table
INSERT INTO variete_the (nom, occupation, rendement)
VALUES 
    ('Green Tea', 0.5, 10.5),
    ('Black Tea', 0.7, 8.2),
    ('Herbal Tea', 0.3, 12.0),
    ('Oolong Tea', 0.6, 9.8),
    ('White Tea', 0.4, 11.3),
    ('Chai Tea', 0.8, 7.5),
    ('Jasmine Tea', 0.5, 10.0),
    ('Peppermint Tea', 0.3, 11.8),
    ('Earl Grey', 0.6, 9.5),
    ('Chamomile Tea', 0.2, 13.2);

-- Inserting test data into the parcelle table
INSERT INTO parcelle (numero, surface, idvariete_the)
VALUES
    (1, 5.05, 1),
    (2, 7.52, 2),
    (3, 4.00, 3),
    (4, 6.08, 4),
    (5, 5.53, 5),
    (6, 8.01, 6),
    (7, 4.55, 7),
    (8, 3.58, 8),
    (9, 6.54, 9),
    (10, 3.00, 10);


INSERT INTO cueilleur (nom, adresse)
VALUES 
    ('John Doe', '123 Main Street'),
    ('Jane Smith', '456 Oak Avenue'),
    ('Samuel Johnson', '789 Pine Road'),
    ('Emily White', '567 Birch Lane'),
    ('Robert Davis', '890 Elm Street');

-- Inserting more test data into the categorie_depense table
INSERT INTO categorie_depense (categorie)
VALUES
    ('Engrais'),
    ('Carburant'),
    ('Logistique'),
    ('Semences'),
    ('Entretien des equipements'),
    ('Frais de main-d oeuvre'),
    ('Irrigation'),
    ('Pesticides'),
    ('Aménagement du terrain'),
    ('Formation du personnel');

-- Inserting test data into the salaire table
INSERT INTO salaire (montant)
VALUES 
    (1500.00),
    (1200.50),
    (1800.75),
    (1300.25),
    (1600.00);

-- Inserting test data into the cueillette table
INSERT INTO cueillette (idcueilleur, idparcelle, poids, date)
VALUES
    (1, 1, 500.5, '2024-02-01'),
    (2, 2, 700.2, '2024-02-02'),
    (3, 3, 450.0, '2024-02-03'),
    (4, 4, 600.8, '2024-02-04'),
    (5, 5, 550.3, '2024-02-05');



INSERT INTO cueillette (idcueilleur, idparcelle, poids, date)
VALUES
    (1, 1, 529749.52, '2024-03-01');

-- Inserting test data into the depense table
INSERT INTO depense (idcategorie_depense, montant, date)
VALUES
    (1, 200.50, '2024-02-01'), -- Engrais
    (2, 150.75, '2024-02-02'), -- Carburant
    (3, 300.25, '2024-02-03'), -- Logistique
    (1, 180.00, '2024-02-04'), -- Engrais
    (2, 120.50, '2024-02-05'); -- Carburant



