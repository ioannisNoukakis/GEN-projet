package Shared.Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 15.06.16.
 */
public class ServerResponse implements Serializable {
    boolean response;

    public ServerResponse(boolean response) {
        this.response = response;
    }

    public boolean isResponse() {
        return response;
    }
}
