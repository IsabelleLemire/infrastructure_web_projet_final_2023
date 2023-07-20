/* pour afficher les chalets actif qui sont en promo en ordre plus récent */
SELECT id, nom, description, prix_basse_saison, actif, promo, date_inscription
FROM chalets
WHERE actif = 1 AND promo = 1
ORDER BY date_inscription DESC
LIMIT 6;


/* pour afficher les chalets actifs selon la région */
SELECT chalets.id, chalets.nom, chalets.prix_basse_saison, chalets.actif, chalets.date_inscription, chalets.id_picsum
FROM chalets
JOIN regions ON chalets.fk_region = regions.id
WHERE chalets.actif = 1 AND regions.nom = 'Centre-du-Québec'
ORDER BY chalets.nom ASC;

SELECT chalets.id, chalets.nom, chalets.prix_basse_saison, chalets.actif, chalets.date_inscription, chalets.id_picsum
FROM chalets
JOIN regions ON chalets.fk_region = regions.id
WHERE chalets.actif = 1 AND regions.nom = 'Mauricie'
ORDER BY chalets.nom ASC;

SELECT chalets.id, chalets.nom, chalets.prix_basse_saison, chalets.actif, chalets.date_inscription, chalets.id_picsum
FROM chalets
JOIN regions ON chalets.fk_region = regions.id
WHERE chalets.actif = 1 AND regions.nom = 'Saguenay–Lac-Saint-Jean'
ORDER BY chalets.nom ASC;

SELECT chalets.id, chalets.nom, chalets.prix_basse_saison, chalets.actif, chalets.date_inscription, chalets.id_picsum
FROM chalets
JOIN regions ON chalets.fk_region = regions.id
WHERE chalets.actif = 1 AND regions.nom = 'Montérégie'
ORDER BY chalets.nom ASC;

/* pour afficher les chalets qui sont actif en ordre alphabétique */
SELECT id, nom, description, prix_basse_saison, actif 
FROM chalets 
WHERE actif = 1 
ORDER BY nom ASC;

/* pour afficher les chalets actif qui sont en promo en ordre alphabétique */
SELECT id, nom, description, prix_basse_saison, actif, promo, date_inscription 
FROM chalets 
WHERE actif = 1 AND promo = 1 
ORDER BY nom ASC;



/* pour un affichage détaillé d'une fiche, il faut y aller avec la sélection d'un id */


id
nom
description
personnes_max
prix_haute_saison
prix_basse_saison
actif
promo
date_inscription
fk_region
id_picsum





requête pour module perso

SELECT * 
FROM items_location
JOIN categories_location ON fk_categorie
ORDER BY categorie
