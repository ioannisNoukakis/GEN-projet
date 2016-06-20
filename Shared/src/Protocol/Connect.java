package Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 02.06.16.
 */
public class Connect implements Serializable {
    private String name;
    private String password;

    public Connect(String name, String password) {
        this.name = name;
        this.password = password;
    }

    public String getName() {
        return name;
    }

    public String getPassword() {
        return password;
    }
}
