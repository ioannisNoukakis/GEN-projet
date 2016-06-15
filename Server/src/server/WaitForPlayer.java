package server;

import Shared.Protocol.ChooseCharacter;
import Shared.Protocol.Connect;
import Shared.Protocol.MiniPersonnage;
import Shared.Protocol.SendCharacterData;
import utility.Logs;
import utility.MySQLUtility;

import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.sql.ResultSet;
import java.util.LinkedList;

public class WaitForPlayer extends Thread {
    private Socket socket;
    private ObjectInputStream in;
    private ObjectOutputStream out;

    public WaitForPlayer(Socket socket) throws Exception {
        this.socket = socket;
        out = new ObjectOutputStream(socket.getOutputStream());
        in = new ObjectInputStream(socket.getInputStream());
    }

    @Override
    public void run() {
        try {
            ResultSet result;
            Object o = in.readObject();
            if(o.getClass() != Connect.class) {
                throw new Exception("Not the class i expected");
            }

            Connect c = (Connect) o;
            result = MySQLUtility.doQuery("SELECT * FROM Utilisateur WHERE pseudonyme=?", c.getName());

            //la on vérifie le mot de passe si c'est bon sinon on l'inscrit
            if(!(result.next() && result.getString("motDePasse").equals(c.getPassword())))
            {
                MySQLUtility.updateQuery("INSERT INTO Utilisateur(pseudonyme, motDePasse, adresseIP, banni) " +
                        "VALUES(?,?,?,?,?,?,?)",
                        c.getName(),
                        c.getPassword(),
                        socket.getInetAddress().getHostAddress(),
                        "0");
            }
            result = MySQLUtility.doQuery("SELECT * FROM Utilisateur WHERE pseudonyme=?", c.getName());
            result.next();

            //on envoie les personnages à l'utilisateur
            result = MySQLUtility.doQuery("SELECT * FROM Personnage");
            LinkedList<MiniPersonnage> list = new LinkedList<>();
            while(result.next())
            {
                String[] comp = new String[4];
                for(int i = 0; i < 4; i++)
                {
                    ResultSet competence = MySQLUtility.doQuery("SELECT * FROM Competence WHERE NOM_COMPETENCE=?",
                            result.getString("NOM_COMPETENCE" + String.valueOf(i+1)));
                    competence.next();
                    comp[i] = i + " : " + competence.getString("NOM_COMPETENCE");
                }
                list.add(new MiniPersonnage(result.getInt("ID_PERSONNAGE"), 0, 0,
                        result.getString("nom"),
                        result.getString("NOM_RACE"),
                        result.getString("NOM_CLASSE"),
                        comp));
            }
            out.writeObject(new SendCharacterData(list));

            //on recoit son choix de personnage
            o = in.readObject();
            if(o.getClass() != ChooseCharacter.class) {
                throw new Exception("Not the class i expected");
            }

            Fighter fighter = new Fighter(socket, ((ChooseCharacter)o).getIdPersonnage(), result.getInt("ID_UTILISATEUR"), out, in);
            Lobby.getIntance().addFighter(fighter);
            Logs.writeMessage("Player registered successfully");

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

/**
 * if(result.next() && result.getString("motDePasse").equals(c.getPassword()))
 {
 MySQLUtility.updateQuery("UPDATE Utilisateur SET ID_PERSONNAGE=? WHERE pseudonyme=?",
 c.getIdPersonnage(), c.getName());
 }
 */
