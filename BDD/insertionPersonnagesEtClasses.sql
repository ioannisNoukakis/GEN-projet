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
VALUES ("Pingouin", 0, 3, 0, -3, 0);


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
VALUES ("Lancer de crayon", 0, 20, 20, 20, "Projectile");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Coup de bouclier", 0, 15, 10, 30, "Bouclier");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Feux de l'amour", 0, 15, 5, 40, "Feu");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Imposant pic de glace", 0, 5, 10, 50, "Glace");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Pichnette dans ton noeil", 0, 5, 30, 60, "Divin");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Coup de bide", 0, 10, 25, 15, "Melee");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Crachat dégoutant", 0, 5, 15, 15, "Projectile");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Toi pas passer", 0, 20, 20, 30, "Bouclier");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Chili con carne", 0, 15, 15, 40, "Feu");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Lacher d'Olaf", 0, 5, 10, 50, "Glace");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Sainte pelle", 0, 5, 30, 60, "Divin");

INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Coup d'artichaud", 1, 20, 30, 45, "Melee");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Crayon pointu", 1, 20, 20, 50, "Projectile");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Mon bouclier pour argus!", 1, 15, 20, 30, "Bouclier");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Flames d'Azinoth", 1, 15, 10, 60, "Feu");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Kiss cool FrrRrroid", 1, 5, 40, 30, "Glace");
INSERT INTO Competence(NOM_COMPETENCE, estPrincipale, cout, cooldown, degats, typeDeDegats)
VALUES ("Bug", 1, 5, 30, 60, "Divin");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Marguerite", 10, 2, 4, 6, 9, "Tauren", "Paladin", "Mon bouclier pour argus!", "Sainte pelle", "Toi pas passer", "Pichnette dans ton noeil");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("InstallShieldWizard", 4, 20, 7, 2, 1, "Humain", "Illusionniste", "Kiss cool FrrRrroid", "Lacher d'Olaf", "Sainte pelle", "Imposant pic de glace");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Nictalop", 5, 9, 2, 6, 3, "Elfe", "Rodeur", "Crayon pointu", "Lancer de crayon", "Coup de bide", "Baffe baffe");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Groubi", 4, 9, 7, 2, 1, "Nain", "Guerrier","Coup d'artichaud", "Crachat dégoutant", "Coup de bouclier", "Baffe baffe");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("NootNoot", 8, 3, 1, 12, 14, "Pingouin", "Mage", "Flames d'Azinoth", "Lacher d'Olaf", "Chili con carne", "Feux de l'amour");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Philibert", 2, 12, 7, 12, 1, "Homme Poireau", "Barbare", "Coup d'artichaud", "Coup de bide", "Toi pas passer", "Crachat dégoutant");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Framboisier", 9, 1, 2, 21, 17, "Ent", "Prêtre", "Bug", "Sainte pelle", "Pichnette dans ton noeil", "Crayon pointu");

INSERT INTO Personnage(nom, pv, mana, nombreDeSelection, nombreDeMatchGagne, nombreDeMatchPerdu, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4)
VALUES ("Kicoup", 14, 3, 8, 1, 5, "Orque", "Combatant du Fenouil", "Coup d'artichaud", "Crachat dégoutant", "Toi pas passer", "Coup de bouclier");

INSERT INTO hommepoireautue(ID, nbVictimes) VALUES (1, 8);
INSERT INTO hommepoireautue(ID, nbVictimes) VALUES (2, 2);
INSERT INTO hommepoireautue(ID, nbVictimes) VALUES (3, 20);
INSERT INTO hommepoireautue(ID, nbVictimes) VALUES (4, 56);

INSERT INTO combat(nombreDeTour, ID_GAGNANT, ID_PERDANT) VALUES (12, 1, 6);
INSERT INTO combat(nombreDeTour, ID_GAGNANT, ID_PERDANT) VALUES (34, 7, 6);
INSERT INTO combat(nombreDeTour, ID_GAGNANT, ID_PERDANT) VALUES (2, 3, 2);
INSERT INTO combat(nombreDeTour, ID_GAGNANT, ID_PERDANT) VALUES (14, 4, 5);
INSERT INTO combat(nombreDeTour, ID_GAGNANT, ID_PERDANT) VALUES (18, 2, 8);