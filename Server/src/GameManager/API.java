package GameManager;

import Client.pgm.FightView;
import Client.pgm.GameAlerts.AToiDeJouer;
import Client.pgm.GameView;
import Client.pgm.ImgView;
import Shared.Protocol.*;
import javafx.application.Platform;
import javafx.concurrent.Task;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;

/**
 * Created by durza9390 on 02.06.16.
 */
public class API {

    private Socket socket;
    private ObjectOutputStream out;
    private ObjectInputStream in;
    private GameState gameState;
    private AToiDeJouer alerte;
    private Task miseAJourClient;
    private GameView gameView;

    public API(String hostname, int port, GameView gameView) throws IOException {
        this.socket = new Socket(hostname, port);
        this.gameView = gameView;
        out = new ObjectOutputStream(socket.getOutputStream());
        in = new ObjectInputStream(socket.getInputStream());
        alerte = new AToiDeJouer(1000);

        miseAJourClient = new Task<Void>() {
            @Override
            public Void call() {
                while (true) {
                    Object o = null;
                    try {
                        o = in.readObject();
                    } catch (Exception e) {
                        break;
                    }

                    if (o.getClass() == GameState.class) {

                        gameState = (GameState) o;

                        if (gameState.isMyTurn())
                            alerte.createAlert();

                        Platform.runLater(() -> {
                            if (FightView.getLogs() != null) {
                                FightView.getLogs().setText(FightView.getLogs().getText() + "====================================================\n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + "TOUR " + gameState.getTurn() + "\n\n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + "Your charcacter: \n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + gameState.getP1().toString() + "\n\n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + "Your opponent: \n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + gameState.getP2().toString() + "\n\n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + "----------------------------------------------------\n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + "last hit was : " + gameState.getLastAttack() + " and delt " + gameState.getLastHitDamage() + "\n");
                                FightView.getLogs().setText(FightView.getLogs().getText() + "----------------------------------------------------\n");
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
                    } else {
                        throw new RuntimeException("Not the object i expected.");
                    }
                }
                return null;
            }
        };
    }

    public SendCharacterData connect(String userName, String password) throws Exception {
        out.writeObject(new Connect(userName, password));

        Object o = in.readObject();
        if (o.getClass() != SendCharacterData.class) {
            throw new RuntimeException("Not the class i expected");
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

        return true;
    }

    public void start() {
        new Thread(miseAJourClient).start();
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
