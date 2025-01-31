CREATE DATABASE IF NOT EXISTS GestionHabitation;
USE GestionHabitation;

CREATE TABLE client_habitation (
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    nomClient VARCHAR(100) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    numero_telephone VARCHAR(15) NOT NULL,
    mail VARCHAR(255) NOT NULL UNIQUE
);

-- Table admin
CREATE TABLE admin_habitation (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    nomAdmin VARCHAR(100) NOT NULL,
    mdpAdmin VARCHAR(255) NOT NULL
);
-- Table habitation
CREATE TABLE type_habitation (
    id_type INT AUTO_INCREMENT PRIMARY KEY,
    nomtype VARCHAR(100) NOT NULL

);

-- Table quartier
CREATE TABLE quartier_habitation (
    id_quartier INT AUTO_INCREMENT PRIMARY KEY,
    nomquartier VARCHAR(100) NOT NULL
);

CREATE TABLE habitation (
    id_habitation INT AUTO_INCREMENT PRIMARY KEY,
    id_type INT NOT NULL,
    nb_chambre INT NOT NULL,
    loyer_par_jour DECIMAL(10, 2) NOT NULL,
    id_quartier INT NOT NULL,
    description TEXT,
    FOREIGN KEY (id_type) REFERENCES type_habitation(id_type),
    FOREIGN KEY (id_quartier) REFERENCES quartier_habitation(id_quartier)
);

-- Table type

-- Table photos
CREATE TABLE photos_habitation (
    id_photo INT AUTO_INCREMENT PRIMARY KEY,
    photo_url VARCHAR(255) NOT NULL,
    id_habitation INT NOT NULL,
    FOREIGN KEY (id_habitation) REFERENCES habitation(id_habitation)
);

-- Table client

-- Table reservation
CREATE TABLE reservation_habitation (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    id_habitation INT NOT NULL,
    id_client INT NOT NULL,
    FOREIGN KEY (id_habitation) REFERENCES habitation(id_habitation),
    FOREIGN KEY (id_client) REFERENCES client_habitation(id_client)
);

CREATE VIEW habitation_all AS
SELECT h.*,p.photo_url,t.nomtype,q.nomquartier FROM photos_habitation p
RIGHT JOIN habitation h ON p.id_habitation=h.id_habitation
JOIN type_habitation t ON h.id_type=t.id_type
JOIN quartier_habitation q ON h.id_quartier=q.id_quartier

CREATE VIEW dateprise AS 
SELECT date_debut,date_fin FROM reservation_habitation 


