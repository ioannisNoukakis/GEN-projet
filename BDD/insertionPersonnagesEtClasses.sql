USE AubergeLegendesBdd;

INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Humain", 0, 0, 0, 0, 0);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Elfe", -1, 0, 3, -1, 0);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Nain", 0, 0, -2, 2, 0);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Orque", 1, -2, 0, 1, 0);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Homme Poireau", 0, -3, 0, -1, 4);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Tauren", 3, -3, -2, 3, -1);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Ent", -1, 1, -2, 2, 0);
INSERT INTO StatistiquesPrincipales(NOM_RACE, strenght, intelligence, agilite, constitution, vigueurMana)
VALUES ("Dryade", 0, 3, 0, -3, 0);


INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Guerrier", 1, 0, 1, 0, 0, 0, -1, 0, 0, 1, 0, 0);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Rodeur", 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Mage", -1, 0, 0, 1, 1, 0, 0, 0, -1, 0, 2, 0);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Prêtre", 0, 0, 0, 0, 0, 2, 0, 0, -1, -1, 0, 2);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Barbare", 3, 0, 0, 0, 0, 0, -2, 1, 1, -1, 0, 0);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Combatant du Fenouil", 0, 3, 1, 0, 0, 0, 0, -1, 0, 0, -1, 0);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Illusionniste", 0, -1, 0, 0, 0, 2, 0, 0, 2, -2, 0, 1);
INSERT INTO StatistiquesSecondaires(NOM_CLASSE, mele, projectile, bouclier, feu, glace, divin, esquive, touche, vitesse, resistancePhysique, resistanceElementaire, resistanceDivine)
VALUES ("Paladin", 0, 0, 2, 0, 0, 1, -1, 0, -2, 1, 0, 0);

INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Baffe baffe", 0, 5, 30, 10, "Melee");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Lancer de crayon", 0, 5, 60, 20, "Projectile");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Coup de bouclier", 0, 15, 10, 30, "Bouclier");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Feux de l'amour", 0, 15, 5, 40, "Feu");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Imposant pic de glace", 0, 5, 10, 50, "Glace");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Pichnette dans ton noeil", 0, 5, 30, 60, "Divin");

INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Coup d'artichaud", 1, 20, 10, 50, "Melee");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Crayon pointu", 1, 5, 60, 20, "Projectile");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Mon bouclier pour argus!", 1, 15, 10, 30, "Bouclier");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Flames d'Azinoth", 1, 15, 5, 40, "Feu");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Kiss cool FrrRrroid", 1, 5, 10, 50, "Glace");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Bug", 1, 5, 30, 60, "Divin");

INSERT INTO Personnage(nom,NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Harim Hurlevent", "Humain", "Mage", "Flames d'Azinoth", "Feux de l'amour", "Imposant pic de glace", "Crayon pointu");

INSERT INTO Personnage(nom,NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Microsoft", "Homme Poireau", "Guerrier", "Coup d'artichaud", "Baffe baffe", "Lancer de crayon", "Crayon pointu");

INSERT INTO hommepoireautue(nbVictimes) VALUES (0);