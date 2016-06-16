package Client.pgm;

import GameManager.API;
import Shared.Protocol.SendCharacterData;
import Shared.Protocol.ServerResponse;
import javafx.application.Application;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

/**
 * Created by Ornidon on 07.06.2016.
 */
public class Connect{



    public static Scene create(API api){

        GridPane grid = new GridPane();
        grid.setPadding(new Insets(10,10,10,10));
        grid.setHgap(10);
        grid.setVgap(10);

        Label userName = new Label("Username :");
        GridPane.setConstraints(userName,0,0);

        TextField nameInput = new TextField();
        nameInput.setPromptText("username");
        GridPane.setConstraints(nameInput,1,0);

        Label password = new Label("Password :");
        GridPane.setConstraints(password,0,1);

        TextField passwordInput = new TextField();
        passwordInput.setPromptText("password");
        GridPane.setConstraints(passwordInput,1,1);

        Button connectButton = new Button("Connect");
        connectButton.setOnAction(event -> {
            try {
                SendCharacterData data = api.connect(nameInput.getText(), passwordInput.getText());
                if(data != null) {
                    GameView.changeScene(Menu.create(data, api));
                }
                else
                    GameView.changeScene(Connect.create(api));
            }
            catch(Exception e) {
                // else create an alertwindow;
                e.printStackTrace();
                AlertWindow.create("Connection Error: ", "Unknown error");
            }
        });
        GridPane.setConstraints(connectButton,1,3);

        grid.getChildren().addAll(userName,nameInput,password,passwordInput,connectButton);

        Scene scene = new Scene(grid, 300, 150);

        return scene;
    }

}
