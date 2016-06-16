package Client.pgm;

/**
 * Created by Ornidon on 11.06.2016.
 */
public class ManaBar extends CharacterBars {

    public ManaBar(int max) {
        super(max);
        this.setStyle("-fx-accent: lightblue;");
        this.setMinSize(300,25);
    }
}
