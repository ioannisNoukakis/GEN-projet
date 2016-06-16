package Client.pgm;

import GameManager.API;
import Shared.Protocol.GameState;
import Shared.Protocol.MakeAction;
import javafx.fxml.FXMLLoader;
import javafx.geometry.HPos;
import javafx.geometry.Insets;
import javafx.geometry.VPos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ProgressBar;
import javafx.scene.control.TextArea;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;

import java.io.IOException;

/**
 * Created by Ornidon on 10.06.2016.
 */
public class FightView {
    private static TextArea logs;
    private static HealthBar player1HealthBar;
    private static HealthBar player2HealthBar;
    private static ManaBar player1ManaBar;
    private static ManaBar player2ManaBar;

    public static Scene create(API api) throws IOException {
        GridPane grid = new GridPane();
        //                   haut, droite, bas, gauche
        grid.setPadding(new Insets(20,10,10,40));

        grid.setHgap(10);
        grid.setVgap(20);

        /*
        Printing of the opponent
         */
        GridPane opponentGrid = new GridPane();
        Label player1Name = new Label("opponent");
        GridPane.setHalignment(player1Name,HPos.RIGHT);
        player1HealthBar = new HealthBar(api.getGameState().getP2().getPv());
        GridPane.setConstraints(player1HealthBar,0,1);
        player1ManaBar = new ManaBar(api.getGameState().getP2().getMana());
        GridPane.setHalignment(player1ManaBar,HPos.RIGHT);
        GridPane.setConstraints(player1ManaBar,0,2);
        opponentGrid.getChildren().addAll(player1HealthBar,player1ManaBar, player1Name);

        ImageView player1Icon = new ImageView(new Image("ressources/" + api.getGameState().getP2().getNomPersonnage()+ ".jpg"));
        player1Icon.setFitHeight(150);
        player1Icon.setFitWidth(200);

        HBox player1Box = new HBox();
        player1Box.getChildren().addAll(opponentGrid,player1Icon);
        GridPane.setConstraints(player1Box,0, 0);
        player1Box.setSpacing(20);

        /*
        Printing of the user
         */
        GridPane userGrid = new GridPane();
        Label player2Name = new Label("you");
        player2HealthBar = new HealthBar(api.getGameState().getP1().getPv());
        GridPane.setConstraints(player2HealthBar,0,1);
        player2ManaBar = new ManaBar(api.getGameState().getP1().getMana());
        GridPane.setHalignment(player2ManaBar,HPos.LEFT);
        GridPane.setConstraints(player2ManaBar,0,2);
        userGrid.getChildren().addAll(player2HealthBar,player2ManaBar, player2Name);

        ImageView player2Icon = new ImageView(new Image("ressources/" + api.getGameState().getP1().getNomPersonnage()+ ".jpg"));
        player2Icon.setFitHeight(150);
        player2Icon.setFitWidth(200);

        HBox player2Box = new HBox();
        player2Box.getChildren().addAll(player2Icon,userGrid);
        GridPane.setConstraints(player2Box,0, 1);
        player2Box.setSpacing(20);

        /*
        Action of the player
         */

        int minH = 30;
        int minV = 125;

        GridPane attackGrid = new GridPane();
        attackGrid.setHgap(10);
        attackGrid.setVgap(10);
        Button AttP = new Button(api.getGameState().getP1().getCompetences()[0]);
        AttP.setOnAction(e -> takeAction(api, 0));
        AttP.setPrefSize(minV,minH);
        GridPane.setConstraints(AttP,0,0);
        Button AttS1 = new Button(api.getGameState().getP1().getCompetences()[1]);
        AttS1.setOnAction(e -> takeAction(api, 1));
        AttS1.setPrefSize(minV,minH);
        GridPane.setConstraints(AttS1,1,0);
        Button AttS2 = new Button(api.getGameState().getP1().getCompetences()[2]);
        AttS2.setOnAction(e -> takeAction(api, 2));
        AttS2.setPrefSize(minV,minH);
        GridPane.setConstraints(AttS2,0,1);
        Button AttS3 = new Button(api.getGameState().getP1().getCompetences()[3]);
        AttS3.setOnAction(e -> takeAction(api, 3));
        AttS3.setPrefSize(minV,minH);
        GridPane.setConstraints(AttS3,1,1);
        attackGrid.getChildren().addAll(AttP,AttS1,AttS2,AttS3);

        /*
        Logs
         */
        GridPane concedeAndLogs = new GridPane();
        attackGrid.setVgap(10);
        logs = new TextArea();
        logs.setPrefSize(350,200);
        logs.setEditable(false);
        GridPane.setConstraints(logs,0,0);

        Button concede = new Button("Concede");
        GridPane.setConstraints(concede,0,1);
        GridPane.setHalignment(concede,HPos.CENTER);
        concedeAndLogs.getChildren().addAll(logs,concede);

        HBox box= new HBox();
        box.setSpacing(20);
        box.getChildren().addAll(concedeAndLogs,attackGrid);
        GridPane.setConstraints(box,0,2);

        //grid.setGridLinesVisible(true);
        grid.getChildren().addAll(player1Box,player2Box, box);
        Scene scene = new Scene(grid, 720, 480);
        return scene;
    }

    public static TextArea getLogs() {
        return logs;
    }

    public static void takeAction(API api, int number){
        if(api.isMyTurn())
        {
            try {
                api.getOut().writeObject(new MakeAction(number));
            } catch (IOException e1) {
                e1.printStackTrace();
            }
        }
    }

    public synchronized static void update(GameState gameState)
    {
        player1HealthBar.setCurrent(gameState.getP2().getPv());
        player2HealthBar.setCurrent(gameState.getP1().getPv());
        player1ManaBar.setCurrent(gameState.getP2().getMana());
        player2ManaBar.setCurrent(gameState.getP1().getMana());
    }
}
