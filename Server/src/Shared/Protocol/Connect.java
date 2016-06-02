package Shared.Protocol;

import java.io.Serializable;

/**
 * Created by durza9390 on 02.06.16.
 */
public class Connect implements Serializable {
    private String name;
    private String password;
    private int idPersonnage;

    public Connect(String name, String password, int idPersonnage) {
        this.name = name;
        this.password = password;
        this.idPersonnage = idPersonnage;
    }

    public String getName() {
        return name;
    }

    public String getPassword() {
        return password;
    }

    public int getIdPersonnage() {
        return idPersonnage;
    }
}
