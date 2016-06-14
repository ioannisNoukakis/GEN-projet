package Client.pgm;

import Shared.Protocol.MiniPersonnage;
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

    private static List<MiniPersonnage> personnages = new LinkedList<>();
    private static final int BUTTON_SIZE = 70;
    private static int index = 0;



    public static Scene create(){



        GridPane grid = new GridPane();
        //                   haut, droite, bas, gauche
        grid.setPadding(new Insets(40,10,10,40));

        grid.setHgap(30);
        grid.setVgap(10);

        ImageView characterIcon = new ImageView(new Image("pgm/PersoTest.png"));
        characterIcon.setFitHeight(360);
        characterIcon.setFitWidth(300);
        GridPane.setConstraints(characterIcon,0, 0);

        Button next = new Button("Next");
        // TODO : function next
        next.setOnAction(event -> {

        });
        next.setMinWidth(BUTTON_SIZE);
        GridPane.setConstraints(next,0,1);
        GridPane.setHalignment(next, HPos.RIGHT);

        Button previous = new Button("Previous");
        // TODO : function previous
        previous.setMinWidth(BUTTON_SIZE);
        GridPane.setConstraints(previous,0,1);
        GridPane.setHalignment(previous,HPos.LEFT);

        Button fight = new Button("Fight");
        // TODO : function fight
        fight.setOnAction(event -> {
            // TODO : API find room
            try {
                GameView.changeScene(FightView.create());
            } catch (IOException e) {
                e.printStackTrace();
            }
        });
        fight.setMinWidth(BUTTON_SIZE);
        GridPane.setConstraints(fight,0,1);
        GridPane.setHalignment(fight,HPos.CENTER);

        Pane table = new GridPane();
        GridPane.setConstraints(table,0,2);

        Label race = new Label("Race :");
        Label playerRace = new Label(personnages.get(index).getRace());

        Label classe = new Label("Class :");
        Label playerClasse = new Label(personnages.get(index).getClasse());

        Label strength = new Label("Strength :");
        Label playerStrength = new Label(String.valueOf(personnages.get(index).getStatsPrinc().getForce()));

        Label agility = new Label("Agility :");
        Label playerAgility = new Label(String.valueOf(personnages.get(index).getStatsPrinc().getAgitlite()));

        Label intelect = new Label("Intelect :");
        Label playerIntelect = new Label(String.valueOf(personnages.get(index).getStatsPrinc().getIntelligence()));

        Label constitution = new Label("Constitution :");
        Label playerConstitution = new Label(String.valueOf(personnages.get(index).getStatsPrinc().getConstitution()));

        Label mana = new Label("Mana :");
        Label playerMana = new Label(String.valueOf(personnages.get(index).getStatsPrinc().getVigueurMana()));

        Label health = new Label("Health :");
        Label playerHealth = new Label(String.valueOf(personnages.get(index).getPv()));

        Label attkP = new Label("Att. pr. :");
        Label playerAttP = new Label(personnages.get(index).getattPrinc().getNom());

        Label attkS1 = new Label("Att. pr. :");
        Label playerAttS1 = new Label(personnages.get(index).getattSec1().getNom());

        Label attkS2 = new Label("Att. pr. :");
        Label playerAttS2 = new Label(personnages.get(index).getattSec2().getNom());

        Label attkS3 = new Label("Att. pr. :");
        Label playerAttS3 = new Label(personnages.get(index).getattSec3().getNom());

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

}
