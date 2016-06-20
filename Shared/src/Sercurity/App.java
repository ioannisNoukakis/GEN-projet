package Sercurity;

import javax.net.ssl.KeyManagerFactory;
import javax.net.ssl.SSLContext;
import javax.net.ssl.TrustManagerFactory;
import java.io.FileInputStream;
import java.security.KeyStore;
import java.security.SecureRandom;

/**
 * Created by durza9390 on 19.06.2016.
 */
public abstract class App{
    private SSLContext sslContext;

    public App(String pathToKeys, String pathToTrustKeys) throws Exception {
        // Create/initialize the SSLContext with key material
        char[] passphrase = "triton12".toCharArray();

        // First initialize the key and trust material.
        KeyStore keyStore = KeyStore.getInstance("JKS");
        keyStore.load(new FileInputStream(pathToKeys), passphrase);
        KeyStore ksTrust = KeyStore.getInstance("JKS");
        ksTrust.load(new FileInputStream(pathToTrustKeys), "public".toCharArray());

        // KeyManager's decide which key material to use.
        KeyManagerFactory kmf = KeyManagerFactory.getInstance("SunX509");
        kmf.init(keyStore, passphrase);

        // TrustManager's decide whether to allow connections.
        TrustManagerFactory tmf = TrustManagerFactory.getInstance("SunX509");
        tmf.init(ksTrust);

        sslContext = SSLContext.getInstance("TLS");
        sslContext.init(kmf.getKeyManagers(), tmf.getTrustManagers(), new SecureRandom());
    }

    public SSLContext getSslContext() {
        return sslContext;
    }
}
