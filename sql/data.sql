CREATE TABLE  obj_membres(
    id_membre INT AUTO_INCREMENT  PRIMARY KEY,
    nom VARCHAR(50) ,
    date_naissance DATE,
    genre CHAR(1) ,
    email VARCHAR(100),
    ville VARCHAR(50),
    mdp VARCHAR(100),
    image_profil VARCHAR(255)
);

CREATE TABLE obj_categorie_objet(
    id_categorie INT AUTO_INCREMENT  PRIMARY KEY,
    nom_categorie VARCHAR(50)
);

CREATE TABLE obj_objet(
    id_objet INT AUTO_INCREMENT  PRIMARY KEY,
    nom_objet VARCHAR(50),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_membre) REFERENCES obj_membres(id_membre),
    FOREIGN KEY (id_categorie) REFERENCES obj_categorie_objet(id_categorie)
);

CREATE TABLE obj_images_objet(
    id_image INT AUTO_INCREMENT  PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES obj_objet(id_objet)
);

CREATE TABLE obj_emprunt(
    id_emprunt INT AUTO_INCREMENT  PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES obj_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES obj_membres(id_membre)
);
ALTER TABLE obj_emprunt ADD etat int;


INSERT INTO obj_membres (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice Dupont', '1990-05-12', 'F', 'alice.dupont@example.com', 'Paris', 'pass123', 'alice.jpg'),
('Bruno Martin', '1985-08-22', 'M', 'bruno.martin@example.com', 'Lyon', 'pass456', 'bruno.jpg'),
('Carla Moreau', '1992-11-03', 'F', 'carla.moreau@example.com', 'Marseille', 'pass789', 'carla.jpg'),
('David Lefevre', '1988-02-15', 'M', 'david.lefevre@example.com', 'Lille', 'pass321', 'david.jpg');

INSERT INTO obj_categorie_objet (nom_categorie) VALUES
('esthetique'),
('bricolage'),
('mecanique'),
('cuisine');

INSERT INTO obj_objet (nom_objet, id_categorie, id_membre) VALUES
('Seche-cheveux', 1, 1),
('Tondeuse', 1, 1),
('Miroir LED', 1, 1),
('Perceuse Bosch', 2, 1),
('Tournevis', 2, 1),
('Cle a molette', 2, 1),
('Pompe a velo', 3, 1),
('Crics voiture', 3, 1),
('Mixeur', 4, 1),
('Robot patissier', 4, 1);

INSERT INTO obj_objet (nom_objet, id_categorie, id_membre) VALUES
('Lime a ongles electrique', 1, 2),
('Brosse a cheveux', 1, 2),
('Marteau', 2, 2),
('Pistolet a colle', 2, 2),
('Scie sauteuse', 2, 2),
('Cle dynamometrique', 3, 2),
('Compresseur', 3, 2),
('Grille-pain', 4, 2),
('Friteuse', 4, 2),
('Blender', 4, 2);

-- Membre 3 : Carla
INSERT INTO obj_objet (nom_objet, id_categorie, id_membre) VALUES
('Lisseur', 1, 3),
('Brosse visage', 1, 3),
('Épilateur', 1, 3),
('Scie circulaire', 2, 3),
('Niveau laser', 2, 3),
('Crics hydrauliques', 3, 3),
('Cric bouteille', 3, 3),
('Micro-ondes', 4, 3),
('Cafetière', 4, 3),
('Balance cuisine', 4, 3);

-- Membre 4 : David
INSERT INTO obj_objet (nom_objet, id_categorie, id_membre) VALUES
('Brosse lissante', 1, 4),
('Ponceuse', 2, 4),
('Meuleuse', 2, 4),
('Tournevis électrique', 2, 4),
('Pont élévateur', 3, 4),
('Clé plate', 3, 4),
('Four', 4, 4),
('Casserole', 4, 4),
('Poêle', 4, 4),
('Autocuiseur', 4, 4);

INSERT INTO obj_emprunt (id_objet, id_membre, date_emprunt, date_retour, etat) VALUES
(1, 2, '2025-07-01', '2025-07-05', 1),
(4, 3, '2025-07-02', '2025-07-06', 1),
(7, 4, '2025-07-03', '2025-07-07', 0),
(10, 1, '2025-07-04', '2025-07-08', 1),
(13, 2, '2025-07-05', '2025-07-09', 1),
(16, 3, '2025-07-06', '2025-07-10', 2),
(19, 4, '2025-07-07', '2025-07-11', 1),
(22, 1, '2025-07-08', '2025-07-12', 1),
(25, 2, '2025-07-09', '2025-07-13', 0),
(28, 3, '2025-07-10', '2025-07-14', 1);


INSERT INTO obj_emprunt (id_objet, id_membre, date_emprunt, date_retour, etat) VALUES
(2, 3, '2025-07-11', NULL, NULL),
(5, 1, '2025-07-12', NULL, NULL),
(8, 4, '2025-07-13', NULL, NULL),
(11, 2, '2025-07-13', NULL, NULL),
(14, 3, '2025-07-13', NULL, NULL),
(17, 1, '2025-07-14', NULL, NULL),
(20, 4, '2025-07-14', NULL, NULL),
(23, 2, '2025-07-14', NULL, NULL),
(26, 3, '2025-07-14', NULL, NULL),
(29, 1, '2025-07-14', NULL, NULL);
