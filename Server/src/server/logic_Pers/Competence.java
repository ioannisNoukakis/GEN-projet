package server.logic_Pers;

public class Competence {

   private String nom;
   private boolean estPrincipale;
   private int cout;
   private int facteurPuissance;
   private int degats;
   private TypeDegats typeDegats;

   public enum TypeDegats {
      Melee("melee","resistancePhysique"), 
      Projectile("projectile","resistancePhysique"), 
      Bouclier("bouclier","resistancePhysique"), 
      Feu("feu","resistanceElementaire"), 
      Glace("glace","resistanceElementaire"), 
      Divin("divin","resistanceElementaire");
      String nom;
      String resist;

      TypeDegats(String nom,String resist) {
         this.nom = nom;
         this.resist=resist;
      }
   }

   public Competence(String nom, boolean estPrincipale, int cout, int facteurPuissance,
           int degats, TypeDegats type) {
      this.nom = nom;
      this.estPrincipale = estPrincipale;
      this.cout = cout;
      this.facteurPuissance = facteurPuissance;
      this.degats = degats;
      this.typeDegats = type;
   }

   public int getFacteurPuissance() {
      return facteurPuissance;
   }

   public int getCout() {
      return cout;
   }

   public int getDegats() {
      return degats;
   }

   public String getNom() {
      return nom;
   }

   public String getTypeDegats() {
      return typeDegats.nom;
   }
   
   public String getResistanceTypeDegats(){
      return typeDegats.resist;
   }
   
   public boolean getEstPrincipale(){
      return estPrincipale;
   }

   @Override
   public String toString() {
      return nom;
   }

   public String print() {
      String s = "";
      if (estPrincipale == true) {
         s = "Attauque principale";
      } else {
         s = "Attaque secondaire";
      }
      return s + " - " + nom
              + "\nCoût : " + cout
              + "\nCooldown : " + facteurPuissance
              + "\nDégats : " + degats
              + "\nType de dégats : " + typeDegats;
   }
}
