package Shared.Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 02.06.16.
 */
public class EndBattle implements Serializable {
    boolean winner;

    public EndBattle(boolean winner) {
        this.winner = winner;
    }

    public boolean isWinner() {
        return winner;
    }
}
