package Client.pgm;

import GameManager.API;
import Protocol.SendCharacterData;
import javafx.geometry.HPos;
import javafx.geometry.Insets;
import javafx.geometry.VPos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.image.Image;
import javafx.scene.layout.GridPane;


/**
 * Created by Ornidon on 16.06.2016.
 */
public class ImgView {
    public static Scene create(API api, String img){

        GridPane grid = new GridPane();
        //                   haut, droite, bas, gauche
        grid.setPadding(new Insets(0,0,0,0));

        grid.setHgap(30);
        grid.setVgap(10);

        javafx.scene.image.ImageView characterIcon = new javafx.scene.image.ImageView(new Image(img));

        GridPane.setConstraints(characterIcon,0, 0);

        Button menu = new Button("Go to menu");
        menu.setOnAction(event -> {
            try {
                SendCharacterData data = api.connect(Connect.userName, Connect.password);
                GameView.changeScene(Menu.create(data, api));
            } catch (Exception e) {
                e.printStackTrace();
                AlertWindow.create("Erreur", "Erreur");
            }
        });
        menu.setMinWidth(200);
        GridPane.setConstraints(menu,0,0);
        GridPane.setHalignment(menu,HPos.CENTER);
        GridPane.setValignment(menu,VPos.BOTTOM);

        //grid.setGridLinesVisible(true);
        grid.getChildren().addAll(characterIcon,menu);

        Scene scene = new Scene(grid, 720, 480);
        characterIcon.setFitWidth(scene.getWidth());
        characterIcon.setFitHeight(scene.getHeight());
        return scene;
    }
}