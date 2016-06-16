package Client.pgm.GameAlerts;

import javax.imageio.ImageIO;
import javax.swing.*;
import java.awt.*;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.awt.event.WindowEvent;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;

/**
 * Created by durza9390 on 16.06.16.
 */
public class AToiDeJouer extends JFrame {

    private int timeToDisplay;
    public AToiDeJouer(int timeToDisplay) {
        this.timeToDisplay = timeToDisplay;
        try {
            FileInputStream input = new FileInputStream("ressources/AToiDeJouer.jpeg");
            BufferedImage image = ImageIO.read(input);
            JPanel panel = new JPanel(){
                @Override
                protected void paintComponent(Graphics g) {
                    super.paintComponent(g);
                    g.drawImage(image, 0, 0, null); // see javadoc for more info on the parameters
                }
            };
            add(panel);
            setSize(new Dimension(image.getWidth(), image.getHeight()));
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }

    public void createAlert()
    {
        setVisible(true);
        toFront();
        repaint();
        try {
            Thread.sleep(timeToDisplay);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        setVisible(false);
    }
}
