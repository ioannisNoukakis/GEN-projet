package server;

import Protocol.*;
import server.logic_Fight.Combat;
import utility.MySQLUtility;

import java.security.SecureRandom;

public class CombatZone extends Thread {
    private Fighter fighterOne;
    private Fighter fighterTwo;
    private SecureRandom random;

    public CombatZone(Fighter fighterOne, Fighter fighterTwo) {
        this.fighterOne = fighterOne;
        this.fighterTwo = fighterTwo;
        random = new SecureRandom();
    }

    @Override
    public void run() {
        try {
            System.out.println("Combat lancé!");
            boolean playerOne = (int) random.nextInt()%1 == 0;
            String lastAttack = "";
            int lastHitDamage = 0;
            int i = 0;
            Fighter attacker, defenser;

            Combat combat;
            fighterOne.getOut().writeObject(new ServerResponse(true));
            fighterTwo.getOut().writeObject(new ServerResponse(true));
            do {
                //envoyer l'état du jeu aux joueur
                MiniPersonnage p1 = new MiniPersonnage(fighterOne.getPersonnage().getId(),
                        fighterOne.getPersonnage().getPointDeVie(),
                        fighterOne.getPersonnage().getPointVigMana(),
                        fighterOne.getPersonnage().getStatsPrinc().getForce(),
                        fighterOne.getPersonnage().getStatsPrinc().getAgitlite(),
                        fighterOne.getPersonnage().getStatsPrinc().getIntelligence(),
                        fighterOne.getPersonnage().getStatsPrinc().getConstitution(),
                        fighterOne.getPersonnage().getNom(),
                        fighterOne.getPersonnage().getRace(),
                        fighterOne.getPersonnage().getClasse(),
                        fighterOne.getPersonnage().getCompetencesName());
                MiniPersonnage p2 = new MiniPersonnage(fighterTwo.getPersonnage().getId(),
                        fighterTwo.getPersonnage().getPointDeVie(),
                        fighterTwo.getPersonnage().getPointVigMana(),
                        fighterTwo.getPersonnage().getStatsPrinc().getForce(),
                        fighterTwo.getPersonnage().getStatsPrinc().getAgitlite(),
                        fighterTwo.getPersonnage().getStatsPrinc().getIntelligence(),
                        fighterTwo.getPersonnage().getStatsPrinc().getConstitution(),
                        fighterTwo.getPersonnage().getNom(),
                        fighterTwo.getPersonnage().getRace(),
                        fighterTwo.getPersonnage().getClasse(),
                        fighterTwo.getPersonnage().getCompetencesName());

                fighterOne.getOut().reset();
                fighterTwo.getOut().reset();
                fighterOne.getOut().writeObject(new GameState(p1, p2, lastAttack, lastHitDamage, playerOne, i));
                fighterTwo.getOut().writeObject(new GameState(p2, p1, lastAttack, lastHitDamage, !playerOne, i));
                fighterOne.getOut().flush();
                fighterTwo.getOut().flush();

                if (playerOne) {
                    attacker = fighterOne;
                    defenser = fighterTwo;
                } else {
                    attacker = fighterTwo;
                    defenser = fighterOne;
                }

                Object o = attacker.getIn().readObject();
                if (!(o.getClass() == MakeAction.class))
                    throw new Exception("Not the object i expected.");

                MakeAction mka = (MakeAction) o;
                combat = new Combat(attacker, defenser, attacker.getPersonnage().getCompetence(mka.getNumCompetence()));
                lastAttack = attacker.getPersonnage().getCompetence(mka.getNumCompetence()).getNom();

                lastHitDamage = combat.getLastDegats();
                playerOne = !playerOne;
                i++;
            } while (!combat.finCombat());

            if(attacker.getPersonnage().getPointDeVie() == 0)
            {
                MySQLUtility.updateQuery("INSERT INTO Combat(nombreDeTour, ID_GAGNANT) VALUES(?,?)",
                        i, attacker.getPersonnage().getId());
                MySQLUtility.updateQuery("UPDATE Personnage SET nombreDeMatchPerdu = nombreDeMatchPerdu+1 WHERE ID_PERSONNAGE=?",
                        attacker.getPersonnage().getId());
                MySQLUtility.updateQuery("UPDATE Personnage SET nombreDeMatchGagne = nombreDeMatchGagne+1 WHERE ID_PERSONNAGE=?",
                        defenser.getPersonnage().getId());

                if(attacker.getPersonnage().getRace().equals("Homme Poireau"))
                    MySQLUtility.updateQuery("UPDATE hommePoireauTue SET nbVictimes = nbVictimes + 1");

                attacker.getOut().writeObject(new EndBattle(false));
                defenser.getOut().writeObject(new EndBattle(true));
            }
            else
            {
                MySQLUtility.updateQuery("INSERT INTO Combat(nombreDeTour, ID_GAGNANT) VALUES(?,?)",
                        i, defenser.getPersonnage().getId());
                MySQLUtility.updateQuery("UPDATE Personnage SET nombreDeMatchPerdu = nombreDeMatchPerdu+1 WHERE ID_PERSONNAGE=?",
                        defenser.getPersonnage().getId());
                MySQLUtility.updateQuery("UPDATE Personnage SET nombreDeMatchGagne = nombreDeMatchGagne+1 WHERE ID_PERSONNAGE=?",
                        attacker.getPersonnage().getId());
                attacker.getOut().writeObject(new EndBattle(true));
                defenser.getOut().writeObject(new EndBattle(false));
            }

            new WaitForPlayer( fighterOne.getOut(), fighterOne.getIn()).start();
            new WaitForPlayer( fighterTwo.getOut(), fighterTwo.getIn()).start();

        } catch (Exception e) {
            boolean one = false, two = false;
            try {
                fighterOne.getOut().writeObject(new ServerResponse(false));
                new WaitForPlayer( fighterOne.getOut(), fighterOne.getIn()).start();
            }
            catch (Exception e1)
            {
                System.err.println("[CombatZone]" + fighterOne.getId() + " has disconected.");
            }
            try {
                fighterTwo.getOut().writeObject(new ServerResponse(false));
                new WaitForPlayer( fighterTwo.getOut(),fighterTwo.getIn()).start();
            }
            catch (Exception e1)
            {
                System.err.println("[CombatZone]" + fighterTwo.getId() + " has disconected.");
            }
        }
    }
}
