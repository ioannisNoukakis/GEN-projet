/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

/**
 *
 * @author durza9390
 */
public class Character {
    public String nomClasse, nomRace;
    public String[] nomCompétences;

    public Character(String nomClasse, String nomRace, String[] nomCompétences) {
        this.nomClasse = nomClasse;
        this.nomRace = nomRace;
        this.nomCompétences = nomCompétences;
    }
}
