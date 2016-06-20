package Client.pgm;

import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.VBox;
import javafx.stage.Modality;
import javafx.stage.Stage;

/**
 * Created by Ornidon on 07.06.2016.
 */
public class AlertWindow {

    public static void create(String title, String message){

        Stage window = new Stage();
        window.initModality(Modality.APPLICATION_MODAL);
        window.setTitle(title);

        window.setMinWidth(300);
        window.setMinHeight(200);

        VBox layout = new VBox(20);

        Label messageLabel = new Label();
        messageLabel.setText(message);

        Button closeButton = new Button("Close");
        closeButton.setOnAction(e -> window.close());

        layout.getChildren().addAll(messageLabel,closeButton);
        layout.setAlignment(Pos.CENTER);

        Scene scene = new Scene(layout);
        window.setScene(scene);
        window.showAndWait();

    }

}
