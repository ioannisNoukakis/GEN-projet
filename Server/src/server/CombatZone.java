package server;

public class CombatZone extends Thread {
    private Fighter fighterOne;
    private Fighter fighterTwo;
    
    public CombatZone(Fighter fighterOne, Fighter fighterTwo){
        this.fighterOne = fighterOne;
        this.fighterTwo = fighterTwo;
    }

    @Override
    public void run() {
        System.out.println("Combat lancé!");
    }
}
