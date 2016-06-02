package server;

import java.net.Socket;

public class WaitForPlayer extends Thread {
    private Socket socket;

    public WaitForPlayer(Socket socket) {
        this.socket = socket;
    }

    @Override
    public void run() {
        try {
            System.out.println("Wait for player choice");
            int i = socket.getInputStream().read(); // Réception du choix de perso
            Fighter fighter = new Fighter(socket);

            Lobby.getIntance().addFighter(fighter);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
