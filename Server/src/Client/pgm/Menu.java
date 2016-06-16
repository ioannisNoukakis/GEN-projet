package Client.pgm;

import GameManager.API;
import Shared.Protocol.MiniPersonnage;
import Shared.Protocol.SendCharacterData;
import javafx.geometry.HPos;
import javafx.geometry.Insets;
import javafx.geometry.VPos;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import server.logic_Pers.*;

import java.io.IOException;
import java.util.LinkedList;
import java.util.List;


/**
 * Created by Ornidon on 07.06.2016.
 */
public class Menu {


    private static List<MiniPersonnage> personnages;
    private static final int BUTTON_SIZE = 70;
    private static int index = 0;
    private static ImageView characterIcon;

    //labels
    private static Label playerRace, playerClasse, playerStrength, playerAgility, playerIntelect,
            playerConstitution, playerMana, playerHealth, playerAttP, playerAttS1, playerAttS2, playerAttS3;

    public static Scene create(SendCharacterData data, API api){
        GridPane grid = new GridPane();
        //                   haut, droite, bas, gauche
        grid.setPadding(new Insets(40,10,10,40));


        //récupération des personnages
        personnages = data.getListPersonnage();

        characterIcon = new ImageView(new Image("ressources/"+ personnages.get(index).getNomPersonnage() +".jpg"));

        grid.setHgap(30);
        grid.setVgap(10);


        characterIcon.setFitHeight(360);
        characterIcon.setFitWidth(300);
        GridPane.setConstraints(characterIcon,0, 0);

        Button next = new Button("Next");
        next.setOnAction(event -> {
            if(index + 1 < personnages.size())
            {
                index++;
                update();
            }
        });
        next.setMinWidth(BUTTON_SIZE);
        GridPane.setConstraints(next,0,1);
        GridPane.setHalignment(next, HPos.RIGHT);

        Button previous = new Button("Previous");
        previous.setOnAction(event -> {
            if(index - 1 >= 0)
            {
                index--;
                update();
            }
        });
        previous.setMinWidth(BUTTON_SIZE);
        GridPane.setConstraints(previous,0,1);
        GridPane.setHalignment(previous,HPos.LEFT);

        Button fight = new Button("Fight");
        fight.setOnAction(event -> {
            // TODO : API find room
            try {
                if(api.joinFight(personnages.get(index).getId()) && api.init()) {
                    api.start();
                    GameView.changeScene(FightView.create(api));
                } else {
                    AlertWindow.create("Cannot connect to the server (try again later).", "");
                }

            } catch (Exception e) {
                e.printStackTrace();
            }
        });
        fight.setMinWidth(BUTTON_SIZE);
        GridPane.setConstraints(fight,0,1);
        GridPane.setHalignment(fight,HPos.CENTER);

        Pane table = new GridPane();
        GridPane.setConstraints(table,0,2);

        Label race = new Label("Race :");
        playerRace = new Label(personnages.get(index).getRace());

        Label classe = new Label("Class :");
        playerClasse = new Label(personnages.get(index).getClasse());

        Label strength = new Label("Strength :");
        playerStrength = new Label(String.valueOf(personnages.get(index).getForce()));

        Label agility = new Label("Agility :");
        playerAgility = new Label(String.valueOf(personnages.get(index).getAgility()));

        Label intelect = new Label("Intelect :");
        playerIntelect = new Label(String.valueOf(personnages.get(index).getIntelec()));

        Label constitution = new Label("Constitution :");
        playerConstitution = new Label(String.valueOf(personnages.get(index).getConstitution()));

        Label mana = new Label("Mana :");
        playerMana = new Label(String.valueOf(personnages.get(index).getMana()));

        Label health = new Label("Health :");
        playerHealth = new Label(String.valueOf(personnages.get(index).getPv()));

        Label attkP = new Label("Att. pr. :");
        playerAttP = new Label(personnages.get(index).getCompetences()[0]);

        Label attkS1 = new Label("Att. pr. :");
        playerAttS1 = new Label(personnages.get(index).getCompetences()[1]);

        Label attkS2 = new Label("Att. pr. :");
        playerAttS2 = new Label(personnages.get(index).getCompetences()[2]);

        Label attkS3 = new Label("Att. pr. :");
        playerAttS3 = new Label(personnages.get(index).getCompetences()[3]);

        VBox stats = new VBox();
        stats.getChildren().addAll(race,classe,health,mana,strength,agility,intelect,constitution, attkP,attkS1,attkS2,attkS3);
        stats.setSpacing(10);
        GridPane.setConstraints(stats,3,0);
        GridPane.setValignment(stats, VPos.CENTER);


        VBox playerStats = new VBox();
        playerStats.getChildren().addAll(playerRace,playerClasse,playerHealth,playerMana,playerStrength,playerAgility,playerIntelect,playerConstitution, playerAttP,playerAttS1,playerAttS2,playerAttS3);
        playerStats.setSpacing(10);
        GridPane.setConstraints(playerStats,4,0);
        GridPane.setValignment(playerStats, VPos.CENTER);

        table.getChildren().addAll();

        //grid.setGridLinesVisible(true);
        grid.getChildren().addAll(next,previous,fight, characterIcon, stats,playerStats);

        Scene scene = new Scene(grid, 720, 480);
        return scene;
    }

    public static void update(){
        playerRace.setText(personnages.get(index).getRace());
        playerClasse.setText(personnages.get(index).getClasse());
        playerStrength.setText(String.valueOf(personnages.get(index).getForce()));
        playerAgility.setText(String.valueOf(personnages.get(index).getAgility()));
        playerIntelect.setText(String.valueOf(personnages.get(index).getIntelec()));
        playerConstitution.setText(String.valueOf(personnages.get(index).getConstitution()));
        playerMana.setText(String.valueOf(personnages.get(index).getMana()));
        playerHealth.setText(String.valueOf(personnages.get(index).getPv()));
        playerAttP.setText(personnages.get(index).getCompetences()[0]);
        playerAttS1.setText(personnages.get(index).getCompetences()[1]);
        playerAttS2.setText(personnages.get(index).getCompetences()[2]);
        playerAttS3.setText(personnages.get(index).getCompetences()[3]);
        characterIcon.setImage(new Image("ressources/" + personnages.get(index).getNomPersonnage()+ ".jpg"));
    }

}
