package utility;

import Protocol.Connect;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.security.SecureRandom;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Arrays;

/**
 * Created by durza9390 on 20.06.16.
 */
public class UserDataHandeler {
    private SecureRandom secureRandom;
    private static UserDataHandeler instance;

    private UserDataHandeler() {
        this.secureRandom = new SecureRandom();
    }

    public static UserDataHandeler getInstance()
    {
        if(instance == null)
        {
            instance = new UserDataHandeler();
        }
        return instance;
    }

    public void registerUser(Connect connect) throws NoSuchAlgorithmException, SQLException {
        MessageDigest md = MessageDigest.getInstance("SHA-256");
        byte[] salt = new byte[20];
        md.update(connect.getPassword().getBytes());
        secureRandom.nextBytes(salt);
        md.update(salt);
        byte[] digest = md.digest();

        MySQLUtility.updateQuery("INSERT INTO Utilisateur(pseudonyme, motDePasse, salt, banni)VALUES(?,?,?,?)",
                connect.getName(), digest, salt, "0");
    }

    public boolean verifyUSer(Connect connect) throws SQLException, NoSuchAlgorithmException {
        ResultSet resultSet = MySQLUtility.doQuery("SELECT * FROM Utilisateur WHERE pseudonyme=?", connect.getName());
        resultSet.next();

        byte[] passwd = resultSet.getBytes("motDePasse");
        byte[] salt = resultSet.getBytes("salt");
        MessageDigest md = MessageDigest.getInstance("SHA-256");
        md.update(connect.getPassword().getBytes());
        md.update(salt);
        byte[] digest = md.digest();
        return Arrays.equals(passwd, digest);
    }
}
