package GameManager;

import Client.pgm.*;
import Client.pgm.GameAlerts.AToiDeJouer;
import Protocol.*;
import Protocol.Connect;
import Sercurity.App;
import javafx.application.Platform;
import javafx.concurrent.Task;

import javax.net.ssl.HandshakeCompletedEvent;
import javax.net.ssl.HandshakeCompletedListener;
import javax.net.ssl.SSLSocket;
import javax.net.ssl.SSLSocketFactory;
import java.io.*;
import java.util.Properties;

/**
 * Created by durza9390 on 02.06.16.
 */
public class API extends App {

    private SSLSocket socket;
    private ObjectOutputStream out;
    private ObjectInputStream in;
    private GameState gameState;
    private AToiDeJouer alerte;
    private Task miseAJourClient;
    private GameView gameView;
    private Thread thread;

    public API(GameView gameView) throws Exception {
        super("keys/client.private", "keys/server.public");
        Properties properties = new Properties();
        InputStream propertiesStream = this.getClass().getClassLoader().getResourceAsStream("ressources/app.properties");
        properties.load(propertiesStream);

        String host = properties.getProperty("hostname");
        int port = Integer.parseInt(properties.getProperty("port"));

        SSLSocketFactory sf = super.getSslContext().getSocketFactory();
        socket = (SSLSocket) sf.createSocket(host, port);
        socket.setEnabledCipherSuites(socket.getEnabledCipherSuites());
        socket.addHandshakeCompletedListener(new HandshakeCompletedListener() {
            @Override
            public void handshakeCompleted(HandshakeCompletedEvent handshakeCompletedEvent) {
                System.out.println("[INFO] HandShakeCompleted");
            }
        });
        this.gameView = gameView;
        out = new ObjectOutputStream(socket.getOutputStream());
        in = new ObjectInputStream(socket.getInputStream());
        alerte = new AToiDeJouer(1000);
    }

    public SendCharacterData connect(String userName, String password) throws Exception {
        out.writeObject(new Connect(userName, password));

        Object o = in.readObject();
        if (o.getClass() != SendCharacterData.class) {
            AlertWindow.create("Error while connecting: ", "Wrong password");
            return null;
        }

        return (SendCharacterData) o;
    }

    public boolean joinFight(int idChar) throws IOException, ClassNotFoundException {
        out.writeObject(new ChooseCharacter(idChar));
        Object o = in.readObject();
        if (o.getClass() != ServerResponse.class) {
            throw new RuntimeException("Not the class i expected");
        }

        return ((ServerResponse) o).isResponse();
    }

    public boolean init() {
        Object o = null;
        try {
            o = in.readObject();
        } catch (Exception e) {
            return false;
        }

        if (o.getClass() == GameState.class) {
            gameState = (GameState) o;
            if (gameState.isMyTurn())
                alerte.createAlert();
        } else
            return false;

        miseAJourClient = new Task<Void>() {
            @Override
            public Void call() {
                try {
                    while (true) {
                        Object o = in.readObject();
                        if (o.getClass() == GameState.class) {
                            gameState = (GameState) o;

                            if (gameState.isMyTurn())
                                alerte.createAlert();

                            Platform.runLater(() -> {
                                if (FightView.getLogs() != null) {
                                    FightView.getLogs().setText("====================================================\n");
                                    FightView.getLogs().setText("TOUR " + gameState.getTurn() + "\n\n");
                                    FightView.getLogs().setText("Your charcacter: \n");
                                    FightView.getLogs().setText(gameState.getP1().toString() + "\n\n");
                                    FightView.getLogs().setText("Your opponent: \n");
                                    FightView.getLogs().setText(gameState.getP2().toString() + "\n\n");
                                    FightView.getLogs().setText("----------------------------------------------------\n");
                                    FightView.getLogs().setText("last hit was : " + gameState.getLastAttack() + " and has done " + gameState.getLastHitDamage() + "\n");
                                    FightView.getLogs().setText("----------------------------------------------------\n");
                                }
                            });

                            FightView.update(gameState);
                        } else if (o.getClass() == EndBattle.class) {
                            EndBattle end = (EndBattle) o;
                            if (end.isWinner()) {
                                System.out.println("VICTORY!");
                                Platform.runLater(() -> {
                                    gameView.changeScene(ImgView.create(API.this, "ressources/victory.jpg"));
                                });
                            } else {
                                System.out.println("YOU HAVE BEEN DEFEATED!");
                                Platform.runLater(() -> {
                                    gameView.changeScene(ImgView.create(API.this, "ressources/dead.jpg"));
                                });
                            }

                            break;
                        } else if (o.getClass() == ServerResponse.class) {
                            Platform.runLater(() -> {
                                try {
                                    AlertWindow.create("System error", "Your opponent has disconnected\nGoing back to the main menu...");
                                    SendCharacterData data = API.this.connect(Client.pgm.Connect.userName, Client.pgm.Connect.password);
                                    gameView.changeScene(Menu.create(data, API.this));
                                } catch (Exception e) {
                                    e.printStackTrace();
                                }
                            });
                            break;
                        } else {
                            throw new RuntimeException("Not the object i expected: " + o.getClass().getName());
                        }
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
                return null;
            }
        };
        return true;
    }

    public void start() {
        thread = new Thread(miseAJourClient);
        thread.start();
    }

    public boolean isMyTurn() {
        return gameState.isMyTurn();
    }

    public ObjectInputStream getIn() {
        return in;
    }

    public ObjectOutputStream getOut() {
        return out;
    }

    public GameState getGameState() {
        return gameState;
    }
}
