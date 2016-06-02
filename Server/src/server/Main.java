package server;

import utility.Logs;

import java.net.ServerSocket;
import java.net.Socket;

public class Main {

    public static void main(String[] args) {

        try {
            ServerSocket server = new ServerSocket(8000);
            Logs.writeMessage("Server running on 8000");

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