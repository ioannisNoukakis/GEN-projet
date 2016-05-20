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
public class Player {
    public int id;
    public String name;
    public Character character;

    public Player(int id, String name, Character character) {
        this.id = id;
        this.name = name;
        this.character = character;
    }
}
