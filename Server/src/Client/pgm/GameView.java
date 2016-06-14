package pgm;

import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.stage.Stage;

/**
 * Created by Ornidon on 07.06.2016.
 */
public class GameView extends Application{

    static Stage window;

    public static void main(String ...args){
        launch(args);
    }

    @Override
    public void start(Stage primaryStage) throws Exception {
        primaryStage.setResizable(false);
        window = primaryStage;
        window.setTitle("L'auberge des Légendes");
        window.setScene(Connect.create());
        window.show();
    }

    public static void changeScene(Scene scene){
        window.setScene(scene);
    }

}
