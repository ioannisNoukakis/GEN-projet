package server;

import Shared.Protocol.*;
import server.logic_Fight.Combat;
import utility.MySQLUtility;
import utility.RandomUniformGenerator;

import javax.crypto.ExemptionMechanismException;
import javax.management.BadAttributeValueExpException;

public class CombatZone extends Thread {
    private Fighter fighterOne;
    private Fighter fighterTwo;
    private RandomUniformGenerator RUG;

    public CombatZone(Fighter fighterOne, Fighter fighterTwo) {
        this.fighterOne = fighterOne;
        this.fighterTwo = fighterTwo;
        RUG = new RandomUniformGenerator(System.currentTimeMillis());
    }

    @Override
    public void run() {
        try {
            System.out.println("Combat lancé!");
            boolean playerOne = (int) RUG.U(0, 1) == 0;
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

                fighterOne.getOut().writeObject(new GameState(p1, p2, lastAttack, lastHitDamage, playerOne, i));
                fighterTwo.getOut().writeObject(new GameState(p2, p1, lastAttack, lastHitDamage, !playerOne, i));

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
                        i, attacker.getId());
                attacker.getOut().writeObject(new EndBattle(false));
                defenser.getOut().writeObject(new EndBattle(true));
            }
            else
            {
                MySQLUtility.updateQuery("INSERT INTO Combat(nombreDeTour, ID_GAGNANT) VALUES(?,?)",
                        i, defenser.getId());
                attacker.getOut().writeObject(new EndBattle(true));
                defenser.getOut().writeObject(new EndBattle(false));
            }

        } catch (Exception e) {
            e.printStackTrace();
        }

    }
}
