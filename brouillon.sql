-- Active: 1748407323878@@127.0.0.1@3306@objet
CREATE OR REPLACE VIEW v_obj_objet AS SELECT 
    o.id_objet,
    o.nom_objet,
    c.nom_categorie,
    m.nom AS nom_membre,
    m.image_profil,
    m.id_membre
FROM obj_objet o
JOIN obj_categorie_objet c ON o.id_categorie = c.id_categorie
JOIN obj_membres m ON o.id_membre = m.id_membre;
