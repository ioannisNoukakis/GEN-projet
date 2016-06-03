package GameManager;

import Shared.Protocol.*;

import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.util.Scanner;

/**
 * Created by durza9390 on 02.06.16.
 */
public class GameManager {

    private Socket socket;
    private ObjectOutputStream out;
    private ObjectInputStream in;

    public GameManager(String hostname, int port) throws Exception
    {
        this.socket = new Socket(hostname, port);
        out = new ObjectOutputStream(socket.getOutputStream());
        in = new ObjectInputStream(socket.getInputStream());
    }

    public void connect(String userName, String password) throws Exception
    {
        Object o = in.readObject();

        if (!(o.getClass() == SendCharacterData.class))
            throw new Exception("Not the object i expected.");

        SendCharacterData sendCharacterData = (SendCharacterData) o;
        System.out.println("=====================================");
        System.out.println("LISTE DES PERSONNAGES");
        for(MiniPersonnage p : sendCharacterData.getListPersonnage())
        {
            System.out.println(p.toString());
        }
        System.out.println("=====================================\n");
        System.out.print("SELECT YOUR CARACTER: ");
        Scanner x = new Scanner(System.in);
        int perso = Integer.parseInt(x.next());

        out.writeObject(new Connect(userName, password, perso));

        System.out.println("Joining Game...");
    }

    public void fight() throws Exception
    {
        while(true) {
            Object o = in.readObject();

            if (o.getClass() == GameState.class) {

                GameState gameState = (GameState) o;
                System.out.println("====================================================");
                System.out.println("TOUR " + gameState.getTurn() + "\n");
                System.out.println("Your charcacter: ");
                System.out.println(gameState.getP1().toString() + "\n");
                System.out.println("Your opponent: ");
                System.out.println(gameState.getP2().toString() + "\n");
                System.out.println("----------------------------------------------------");
                System.out.println("last hit was : " + gameState.getLastAttack() + " and delt " + gameState.getLastHitDamage());
                System.out.println("----------------------------------------------------");

                if(gameState.isMyTurn())
                {
                    System.out.println("Choose your next action:");
                    for (String comp : gameState.getP1().getCompetences()) {
                        System.out.println(comp);
                    }

                    Scanner x = new Scanner(System.in);
                    int nextCompetence = Integer.parseInt(x.next());
                    out.writeObject(new MakeAction(nextCompetence));
                }
            } else if (o.getClass() == EndBattle.class) {
                EndBattle end = (EndBattle) o;
                if(end.isWinner())
                    System.out.println("VICTORY");
                else
                    System.out.println("YOU HAVE BEEN DEFEATED!");
                break;
            } else {
                throw new Exception("Not the object i expected.");
            }
        }
    }
}
