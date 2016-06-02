package Client.pgm;

import GameManager.GameManager;
import utility.Logs;

public class Game {
    public static void main(String[] args) {
        try {
            GameManager gm = new GameManager(args[0], 8000);
            gm.connect("Ioannis", "1234");
            gm.fight();
        }catch (Exception e)
        {
            Logs.writeError("something went wrong...");
            e.printStackTrace();
        }
    }
}
