package server.logic_Pers;

public class StatsPrincipales {

   private int force;
   private int intelligence;
   private int agitlite;
   private int constitution;
   private int vigueurMana;

   private static int CARACTERISTIQUE_BASE = 10;

   public StatsPrincipales(int force, int intelligence, int agilite,
      int constitution, int vigueurMana) {
      init();
      this.force += force;
      this.intelligence += intelligence;
      this.agitlite += agilite;
      this.constitution += constitution;
      this.vigueurMana += vigueurMana;
   }

   private void init(){
         this.force = CARACTERISTIQUE_BASE;
         this.intelligence = CARACTERISTIQUE_BASE;
         this.agitlite = CARACTERISTIQUE_BASE;
         this.constitution = CARACTERISTIQUE_BASE;
         this.vigueurMana = CARACTERISTIQUE_BASE;
   }

   public int getAgitlite() {
      return agitlite;
   }

   public int getConstitution() {
      return constitution;
   }

   public int getForce() {
      return force;
   }

   public int getIntelligence() {
      return intelligence;
   }

   public int getVigueurMana() {
      return vigueurMana;
   }

   public void setAgitlite(int agitlite) {
      this.agitlite = agitlite;
   }

   public void setConstitution(int constitution) {
      this.constitution = constitution;
   }

   public void setForce(int force) {
      this.force = force;
   }

   public void setIntelligence(int intelligence) {
      this.intelligence = intelligence;
   }

   public void setVigueurMana(int vigueurMana) {
      this.vigueurMana = vigueurMana;
   }

   @Override
   public String toString() {
      return "Force : " + force
              + "\nIntelligence : " + intelligence
              + "\nAgilité : " + agitlite
              + "\nConsitution : " + constitution
              + "\nVigueur / mana : " + vigueurMana;
   }
   
}
