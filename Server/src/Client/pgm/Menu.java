package pgm;

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
import logic_Pers.*;

import java.io.IOException;

/**
 * Created by Ornidon on 07.06.2016.
 */
public class Menu {

    private static final int BUTTON_SIZE = 70;
    private static Personnage personnage = new Personnage("Bob", new Race("Humain", new StatsPrincipales(10, 10,10,10,10)), new Classe("Illusionniste", new StatsSecondaires(10,10,10,10,10,10,10,10,10,10,10,10)),new StatsPrincipales(), new StatsSecondaires(),
            new Competence("Coup d'artichaud", true, 20, 10, 50, Competence.TypeDegats.Melee),new Competence("Lancer de crayon", false, 5, 60, 20, Competence.TypeDegats.Projectile),new Competence("Coup de bouclier", false, 15, 10, 30, Competence.TypeDegats.Bouclier),
            new Competence("Baffe baffe", false, 5, 30, 10, Competence.TypeDegats.Melee));

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
        Label playerRace = new Label(personnage.getRace());

        Label classe = new Label("Class :");
        Label playerClasse = new Label(personnage.getClasse());

        Label strength = new Label("Strength :");
        Label playerStrength = new Label(String.valueOf(personnage.getStatsPrinc().getForce()));

        Label agility = new Label("Agility :");
        Label playerAgility = new Label(String.valueOf(personnage.getStatsPrinc().getAgitlite()));

        Label intelect = new Label("Intelect :");
        Label playerIntelect = new Label(String.valueOf(personnage.getStatsPrinc().getIntelligence()));

        Label constitution = new Label("Constitution :");
        Label playerConstitution = new Label(String.valueOf(personnage.getStatsPrinc().getConstitution()));

        Label mana = new Label("Mana :");
        Label playerMana = new Label(String.valueOf(personnage.getStatsPrinc().getVigueurMana()));

        Label health = new Label("Health :");
        Label playerHealth = new Label(String.valueOf(personnage.getPointDeVie()));

        Label attkP = new Label("Att. pr. :");
        Label playerAttP = new Label(personnage.getattPrinc().getNom());

        Label attkS1 = new Label("Att. pr. :");
        Label playerAttS1 = new Label(personnage.getattSec1().getNom());

        Label attkS2 = new Label("Att. pr. :");
        Label playerAttS2 = new Label(personnage.getattSec2().getNom());

        Label attkS3 = new Label("Att. pr. :");
        Label playerAttS3 = new Label(personnage.getattSec3().getNom());

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
