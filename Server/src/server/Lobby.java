package server;

import java.util.LinkedList;
import java.util.Queue;

public class Lobby extends Thread  {
    private Queue<Fighter> waitingQueue;
    private static Lobby instance = null;

    private Lobby(){
        waitingQueue = new LinkedList();
    }

    public static Lobby getIntance(){
        if(instance == null){
            instance = new Lobby();
            instance.start();
        }

        return instance;
    }

    public void addFighter(Fighter f){
        waitingQueue.add(f);
        System.out.println("Fighter waiting for combat!");
    }

    @Override
    public void run() {
        while(true) {
            if (waitingQueue.size() >= 2){
                CombatZone cz = new CombatZone(waitingQueue.poll(), waitingQueue.poll());
                cz.start();
            }

            try {
                sleep(10);
            } catch(Exception e){
                e.printStackTrace();
            }
        }
    }
}
