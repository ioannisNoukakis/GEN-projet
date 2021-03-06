package Client.pgm;

import GameManager.API;
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.stage.Stage;

/**
 * Created by Ornidon on 07.06.2016.
 */
public class GameView extends Application{

    static Stage window;
    private API api;

    public static void main(String ...args){
        launch(args);
    }

    @Override
    public void start(Stage primaryStage) {

        API api = null;
        try {
            api = new API(this);
        } catch (Exception e) {
            AlertWindow.create("ERROR", "Can't connect to the server.");
            System.exit(0);
        }
        primaryStage.setResizable(false);
        window = primaryStage;
        window.setTitle("L'auberge des Légendes");
        window.setScene(Connect.create(api));
        window.show();
    }

    public static void changeScene(Scene scene){
        window.setScene(scene);
    }

}
