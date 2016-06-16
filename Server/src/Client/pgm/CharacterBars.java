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
        this.current = max;
        this.setProgress(1);
    }

    public void setCurrent(int current){
        this.current = current;
        double tmp = (double)current/(double)max;
        this.setProgress(tmp);
    }

}
