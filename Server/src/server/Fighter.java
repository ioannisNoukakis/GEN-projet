package server;

import server.logic_Pers.*;
import utility.MySQLUtility;

import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.sql.ResultSet;

public class Fighter {
    private Socket socket;
    private ObjectOutputStream out;
    private ObjectInputStream in;
    private Personnage personnage;
    private int id;

    public Fighter(Socket socket, int idPersonnage, int id, ObjectOutputStream out, ObjectInputStream in) throws Exception {
        this.id = id;
        this.in = in;
        this.out = out;
        this.socket = socket;

        personnage = Fighter.makePersonnage(idPersonnage);
    }

    public static Personnage makePersonnage(int idPersonnage) {
        try {
            ResultSet perso = MySQLUtility.doQuery("SELECT * FROM Personnage WHERE ID_PERSONNAGE=?", idPersonnage);
            perso.next();

            ResultSet statsP = MySQLUtility.doQuery("SELECT * FROM StatistiquesPrincipales WHERE NOM_RACE=?", perso.getString("NOM_RACE"));
            statsP.next();
            StatsPrincipales statsPrincipales = new StatsPrincipales(statsP.getInt("strenght"),
                    statsP.getInt("intelligence"),
                    statsP.getInt("agilite"),
                    statsP.getInt("constitution"),
                    statsP.getInt("vigueurMana"));

            ResultSet statsS = MySQLUtility.doQuery("SELECT * FROM StatistiquesSecondaires WHERE NOM_CLASSE=?", perso.getString("NOM_CLASSE"));
            statsS.next();
            StatsSecondaires statsSecondaires = new StatsSecondaires(statsS.getInt("mele"),
                    statsS.getInt("projectile"),
                    statsS.getInt("bouclier"),
                    statsS.getInt("feu"),
                    statsS.getInt("glace"),
                    statsS.getInt("divin"),
                    statsS.getInt("esquive"),
                    statsS.getInt("touche"),
                    statsS.getInt("vitesse"),
                    statsS.getInt("resistancePhysique"),
                    statsS.getInt("resistanceElementaire"),
                    statsS.getInt("resistanceDivine"));

            Competence[] tabCompetence = new Competence[4];
            for (int i = 0; i < 4; i++) {
                ResultSet competence = MySQLUtility.doQuery("SELECT * FROM Competence WHERE NOM_COMPETENCE=?",
                        perso.getString("NOM_COMPETENCE" + String.valueOf(i + 1)));
                competence.next();
                tabCompetence[i] = new Competence(competence.getString("NOM_COMPETENCE"),
                        i == 0,
                        competence.getInt("cout"),
                        competence.getInt("cooldown"),
                        competence.getInt("degats"),
                        Competence.TypeDegats.valueOf(competence.getString("typeDeDegats")));
            }
            return new Personnage(perso.getInt("ID_PERSONNAGE"),
                    perso.getString("nom"),
                    new Race(perso.getString("NOM_RACE"), statsPrincipales),
                    new Classe(perso.getString("NOM_CLASSE"), statsSecondaires),
                    statsPrincipales,
                    statsSecondaires,
                    tabCompetence);
        } catch (Exception e)
        {
            e.printStackTrace();
        }
        return null;
    }

    public ObjectInputStream getIn() {
        return in;
    }

    public ObjectOutputStream getOut() {
        return out;
    }

    public int getId() {
        return id;
    }

    public Personnage getPersonnage() {
        return personnage;
    }

    public Socket getSocket() {
        return socket;
    }
}
