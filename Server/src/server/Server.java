package server;

import Sercurity.App;

import javax.net.ssl.SSLServerSocket;
import javax.net.ssl.SSLServerSocketFactory;
import java.net.Socket;

public class Server extends App {

    private SSLServerSocket securedServerSocket;

    public Server(String pathToKeys, String pathToTrustKeys, int port) throws Exception {
        super(pathToKeys, pathToTrustKeys);
        SSLServerSocketFactory sf = super.getSslContext().getServerSocketFactory();
        securedServerSocket = (SSLServerSocket) sf.createServerSocket(port);
        securedServerSocket.setEnabledCipherSuites(securedServerSocket.getEnabledCipherSuites());
        securedServerSocket.setNeedClientAuth(true);
    }

    public void run() throws Exception
    {
        System.out.println("Running on 8000");
        while(true)
        {
            Socket socket = securedServerSocket.accept();
            System.out.println("New fighter!");

            WaitForPlayer wfp = new WaitForPlayer(socket);
            wfp.start();
        }
    }

    public static void main(String[] args)
    {
        try {
            Server server = new Server("keys/server.private", "keys/client.public", 8000);
            server.run();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}