package Client.pgm.GameAlerts;

import javax.swing.*;
import java.awt.*;

/**
 * Created by durza9390 on 20.06.16.
 */
public class SearchingPlayer extends JFrame {
    private JPanel contentPane;
    private JLabel imageLabel = new JLabel();
    private JLabel headerLabel = new JLabel();

    public SearchingPlayer() {
        try {
            contentPane = (JPanel) getContentPane();
            contentPane.setLayout(new BorderLayout());
            setTitle("Searching an opponent");
            // add the header label
            headerLabel.setFont(new java.awt.Font("Comic Sans MS", Font.BOLD, 16));
            headerLabel.setText("Searching an opponent...");
            contentPane.add(headerLabel, java.awt.BorderLayout.NORTH);
            // add the image label
            ImageIcon ii = new ImageIcon("ressources/Ramoloss-centipede.gif");
            imageLabel.setIcon(ii);
            contentPane.add(imageLabel, java.awt.BorderLayout.CENTER);
            // show it
            this.setLocationRelativeTo(null);
            this.pack();
            this.setVisible(true);
        } catch (Exception exception) {
            exception.printStackTrace();
        }
    }

    public void setAlerteVisible(boolean isVisible)
    {
        this.setVisible(isVisible);
    }
}
