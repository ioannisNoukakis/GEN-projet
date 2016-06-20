package Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 14.06.16.
 */
public class ChooseCharacter implements Serializable {
    private int idPersonnage;

    public ChooseCharacter(int idPersonnage) {
        this.idPersonnage = idPersonnage;
    }

    public int getIdPersonnage() {
        return idPersonnage;
    }
}
