
package utility;

import java.sql.*;

/**
 * Class the represents a MYSQL utility to do queries on the specified MYSQL database
 */
public class MySQLUtility {
    private static Connection mConnection;
    // The specified MYSQL database (with the user and his password for the connection)
    private static final String URL = "jdbc:mysql://localhost/AubergeLegendesBdd?user=root&password=";

    /**
     * Make a SQL SELECT query on the database
     *
     * @param query the SQL query to execute
     * @param args  the eventual parameters that will be inserted on the SQL query (replace the '?')
     * @return the resultSet from the database
     * @throws SQLException if the query doesn't work
     */
    public static ResultSet doQuery(String query, Object... args) throws SQLException {
        // Connection with the database if it is not already done
        if (mConnection == null) {
            mConnection = DriverManager.getConnection(URL);
        }

        PreparedStatement stmt = mConnection.prepareStatement(query);

        // Insertion if needed of the given parameters
        for (int i = 0; i < args.length; i++) {
            stmt.setObject(i + 1, args[i]);
        }

        return stmt.executeQuery();
    }

    /**
     * Make a SQL DML (INSERT, UPDATE, DELETE) or DDL query on the database
     *
     * @param query the SQL query to execute
     * @param args  the eventual parameters that will be inserted on the SQL query (replace the '?')
     * @return the id of the inserted row in the database or -1 if it is an other query or if an error occurs (no row inserted, for example)
     * @throws SQLException if the query doesn't work
     */
    public static int updateQuery(String query, Object... args) throws SQLException {
        if (mConnection == null) {
            mConnection = DriverManager.getConnection(URL);
        }

        PreparedStatement stmt = mConnection.prepareStatement(query, Statement.RETURN_GENERATED_KEYS);

        for (int i = 0; i < args.length; i++) {
            stmt.setObject(i + 1, args[i]);
        }

        stmt.executeUpdate();

        // We are looking for the eventual id in the case of an insertion query
        ResultSet keys = stmt.getGeneratedKeys();

        if (keys.next()) {
            return keys.getInt(1);
        }

        return -1;
    }
}