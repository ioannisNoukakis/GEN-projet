package Client.pgm;

import javafx.scene.control.ProgressBar;

/**
 * Created by Ornidon on 11.06.2016.
 */
public abstract class CharacterBars extends ProgressBar {

    private final int max;
    private int current;

    public CharacterBars(int max){
        this.max = max;
        this.setProgress(1.0);
    }

    public void setCurrent(int current){
        this.current = current;
        this.setProgress((double)(current/max));
    }

}
