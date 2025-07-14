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



