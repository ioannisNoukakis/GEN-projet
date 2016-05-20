/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import java.io.Serializable;

/**
 *
 * @author durza9390
 */
public class GameStatus implements Serializable {
    public String status;
    public long gameId;
    public Player player;

    public GameStatus(String status, long gameId, Player player) {
        this.status = status;
        this.gameId = gameId;
        this.player = player;
    }
    
    public String serialiser()
    {
        //Gson gson = new GsonBuilder().registerTypeAdapter(GameStatus.class, player);
    }
}
