package server;

import java.net.ServerSocket;
import java.net.Socket;

public class Main {

    public static void main(String[] args) {
        Lobby lobby = Lobby.getIntance();

        try {
            ServerSocket server = new ServerSocket(1412);

            while(true){
                Socket socket = server.accept();

                System.out.println("New fighter!");

                WaitForPlayer wfp = new WaitForPlayer(socket);
                wfp.start();
            }
        } catch(Exception e){
            e.printStackTrace();
        }
    }
}