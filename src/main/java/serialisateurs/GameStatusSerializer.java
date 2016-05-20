/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serialisateurs;

import Models.GameStatus;
import com.google.gson.JsonDeserializationContext;
import com.google.gson.JsonDeserializer;
import com.google.gson.JsonElement;
import com.google.gson.JsonObject;
import com.google.gson.JsonParseException;
import com.google.gson.JsonPrimitive;
import com.google.gson.JsonSerializationContext;
import java.lang.ProcessBuilder.Redirect.Type;

/**
 *
 * @author durza9390
 */
public class GameStatusSerializer implements JsonDeserializer<GameStatus>{
    public JsonElement serialize(final GameStatus gs, final Type type, final JsonSerializationContext context) {
        JsonObject result = new JsonObject();
        result.add("status", new JsonPrimitive(gs.status));
        result.add("gameId", new JsonPrimitive(gs.gameId));
        result.add("player", "");

        return result;
    }

    @Override
    public GameStatus deserialize(JsonElement je, java.lang.reflect.Type type, JsonDeserializationContext jdc) throws JsonParseException {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    
}
