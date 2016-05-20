/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.aubergedeslegendes;

import static spark.Spark.*;

/**
 *
 * @author durza9390
 */
public class serveur {

    public static void main(String[] args) {
        port(9000);
        int loggedIn = 3;
        get("/", (req, res) -> "Auberge des legendes V1.0");
        
        get("/joinGameRequests", (request, response) -> {
            String name = "Currently logged in: " + 3;
            return name;
        });
    }
}
