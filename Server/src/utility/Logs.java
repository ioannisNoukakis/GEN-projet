package utility;

/**
 * Simple class that represents general messages and error messages
 */
public class Logs {
    private static final String BASE = "[TIS-server] ";

    /**
     * Write on the console the log message
     *
     * @param log the message to write
     */
    public static void writeMessage(String log) {
        System.out.println(BASE + log);
    }

    /**
     * Write on the console the log error message
     *
     * @param log the error message to write
     */
    public static void writeError(String log) {
        System.err.println(BASE + log);
    }
}