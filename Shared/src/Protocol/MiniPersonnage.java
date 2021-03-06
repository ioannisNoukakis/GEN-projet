package Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 02.06.16.
 */
public class MiniPersonnage implements Serializable{
    private int id, pv, mana, force, agility, intelec, constitution;
    private String nomPersonnage;
    private String race;
    private String classe;
    private String[] competences;

    public MiniPersonnage(int id, int pv, int mana, int force, int agility, int intelec, int constitution,
                          String nomPersonnage, String race, String classe, String[] competences) {
        this.id = id;
        this.pv = pv;
        this.mana = mana;
        this.force = force;
        this.agility = agility;
        this.intelec = intelec;
        this.constitution = constitution;
        this.nomPersonnage = nomPersonnage;
        this.race = race;
        this.classe = classe;
        this.competences = competences;
    }

    public int getForce() {
        return force;
    }

    public int getAgility() {
        return agility;
    }

    public int getIntelec() {
        return intelec;
    }

    public int getConstitution() {
        return constitution;
    }

    public void setPv(int pv) {
        this.pv = pv;
    }

    public void setMana(int mana) {
        this.mana = mana;
    }

    public int getId() {
        return id;
    }

    public String getNomPersonnage() {
        return nomPersonnage;
    }

    public int getPv() {
        return pv;
    }

    public int getMana() {
        return mana;
    }

    public String getRace() {
        return race;
    }

    public String getClasse() {
        return classe;
    }

    public String[] getCompetences() {
        return competences;
    }

    @Override
    public String toString() {
        String tmp = id + " : nom: " + nomPersonnage + "\nRace: " + race + "\nClasse: " + classe;

        if(pv > 0)
            tmp += "\nPV: " + pv;

        if(mana > 0)
            tmp += "\nMana: " + mana;

        return tmp;
    }
}
