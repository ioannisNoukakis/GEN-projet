package server;

import java.net.Socket;

public class Fighter {
    private Socket socket;

    public Fighter(Socket socket){
        this.socket = socket;
    }

    public Socket socket(){
        return socket;
    }
}
