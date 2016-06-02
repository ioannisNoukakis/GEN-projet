package Shared.Protocol;

import java.io.Serializable;
import java.util.LinkedList;

/**
 * Created by durza9390 on 02.06.16.
 */
public class SendCharacterData implements Serializable {
    LinkedList<MiniPersonnage> listPersonnage;

    public SendCharacterData(LinkedList<MiniPersonnage> listPersonnage) {
        this.listPersonnage = listPersonnage;
    }

    public LinkedList<MiniPersonnage> getListPersonnage() {
        return listPersonnage;
    }
}
