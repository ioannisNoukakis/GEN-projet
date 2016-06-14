package pgm;

/**
 * Created by Ornidon on 11.06.2016.
 */
public class HealthBar extends CharacterBars{

    public HealthBar(int max) {
        super(max);
        this.setStyle("-fx-accent: lightgreen;");
        this.setMinSize(400,25);
    }


}
