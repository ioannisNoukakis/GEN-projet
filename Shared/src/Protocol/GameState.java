package Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 02.06.16.
 */
public class GameState implements Serializable {
    private MiniPersonnage p1, p2;
    private String lastAttack;
    private int lastHitDamage;
    private boolean myTurn;
    private int turn;

    public GameState(MiniPersonnage p1, MiniPersonnage p2, String lastAttack, int lastHitDamage, boolean myTurn, int turn) {
        this.p1 = p1;
        this.p2 = p2;
        this.lastAttack = lastAttack;
        this.lastHitDamage = lastHitDamage;
        this.myTurn = myTurn;
        this.turn = turn;
    }

    public MiniPersonnage getP1() {
        return p1;
    }

    public MiniPersonnage getP2() {
        return p2;
    }

    public String getLastAttack() {
        return lastAttack;
    }

    public int getLastHitDamage() {
        return lastHitDamage;
    }

    public boolean isMyTurn() {
        return myTurn;
    }

    public int getTurn() {
        return turn;
    }
}
