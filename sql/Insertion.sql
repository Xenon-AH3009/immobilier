insert into admin_habitation(nomAdmin,mdpAdmin) values('nyavov',1234);
-- Insérer des types d'habitation
INSERT INTO type_habitation (nomtype)
VALUES
    ('Appartement'),
    ('Maison'),
    ('Villa'),
    ('Studio'),
    ('Bungalow');

-- Insérer des quartiers
INSERT INTO quartier_habitation (nomquartier)
VALUES
    ('Centre-ville'),
    ('Quartier résidentiel'),
    ('Zone industrielle'),
    ('Banlieue'),
    ('Quartier historique');

-- Insérer des habitations
INSERT INTO habitation (id_type, nb_chambre, loyer_par_jour, id_quartier, description)
VALUES
    (1, 2, 50.00, 1, 'Appartement confortable situé au centre-ville.'),
    (2, 3, 80.00, 2, 'Maison familiale spacieuse avec jardin.'),
    (3, 4, 120.00, 5, 'Villa luxueuse dans un quartier historique.'),
    (4, 1, 30.00, 4, 'Studio moderne idéal pour les étudiants.'),
    (5, 2, 70.00, 3, 'Bungalow charmant proche de la zone industrielle.');
