package Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 02.06.16.
 */
public class MakeAction implements Serializable {
    int numCompetence;

    public MakeAction(int numCompetence) {
        this.numCompetence = numCompetence;
    }

    public int getNumCompetence() {
        return numCompetence;
    }
}
