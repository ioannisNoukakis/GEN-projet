package server.logic_Pers;

public class StatsSecondaires {

   private int melee;
   private int projectile;
   private int bouclier;
   private int feu;
   private int glace;
   private int divin;
   private int esquive;
   private int touche;
   private int vitesse;
   private int resistancePhysique;
   private int resistanceElementaire;
   private int resistanceDivine;

   private static int CARACTERISTIQUE_BASE = 10;

   public StatsSecondaires(int melee, int projectile, int bouclier, int feu,
           int glace, int divin, int esquive, int touche, int vitesse,
           int resistancePhysique, int resistanceElementaire,
           int resistanceDivine) {
      init();
      this.melee += melee;
      this.projectile += projectile;
      this.bouclier += bouclier;
      this.feu += feu;
      this.glace += glace;
      this.divin += divin;
      this.esquive += esquive;
      this.touche += touche;
      this.vitesse += vitesse;
      this.resistancePhysique += resistancePhysique;
      this.resistanceElementaire += resistanceElementaire;
      this.resistanceDivine += resistanceDivine;
   }

   public void init(){
      this.melee = CARACTERISTIQUE_BASE;
      this.projectile = CARACTERISTIQUE_BASE;
      this.bouclier = CARACTERISTIQUE_BASE;
      this.feu = CARACTERISTIQUE_BASE;
      this.glace = CARACTERISTIQUE_BASE;
      this.divin = CARACTERISTIQUE_BASE;
      this.esquive = CARACTERISTIQUE_BASE;
      this.touche = CARACTERISTIQUE_BASE;
      this.vitesse = CARACTERISTIQUE_BASE;
      this.resistancePhysique = CARACTERISTIQUE_BASE;
      this.resistanceElementaire = CARACTERISTIQUE_BASE;
      this.resistanceDivine = CARACTERISTIQUE_BASE;
   }

   @Override
   public String toString() {
      return "Mélée : " + melee + "\nProjectile : " + projectile
              + "\nBouclier : " + bouclier + "\nFeu : " + feu + "\nGlace : " + glace
              + "\nDivin : " + divin + "\nEsquive : " + esquive + "\nTouché : " + touche
              + "\nVitesse : " + vitesse + "\nReistance physique " + resistancePhysique
              + "\nRésistance élémentaire : " + resistanceElementaire
              + "\nRésistance Divine : " + resistanceDivine;
   }

   public int getBouclier() {
      return bouclier;
   }

   public int getDivin() {
      return divin;
   }

   public int getEsquive() {
      return esquive;
   }

   public int getFeu() {
      return feu;
   }

   public int getGlace() {
      return glace;
   }

   public int getMelee() {
      return melee;
   }

   public int getProjectile() {
      return projectile;
   }

   public int getResistanceDivine() {
      return resistanceDivine;
   }

   public int getResistanceElementaire() {
      return resistanceElementaire;
   }

   public int getResistancePhysique() {
      return resistancePhysique;
   }

   public int getTouche() {
      return touche;
   }

   public int getVitesse() {
      return vitesse;
   }

   public void setBouclier(int bouclier) {
      this.bouclier = bouclier;
   }

   public void setDivin(int divin) {
      this.divin = divin;
   }

   public void setEsquive(int esquive) {
      this.esquive = esquive;
   }

   public void setFeu(int feu) {
      this.feu = feu;
   }

   public void setGlace(int glace) {
      this.glace = glace;
   }

   public void setMelee(int melee) {
      this.melee = melee;
   }

   public void setProjectile(int projectile) {
      this.projectile = projectile;
   }

   public void setResistanceDivine(int resistanceDivine) {
      this.resistanceDivine = resistanceDivine;
   }

   public void setResistanceElementaire(int resistanceElementaire) {
      this.resistanceElementaire = resistanceElementaire;
   }

   public void setResistancePhysique(int resistancePhysique) {
      this.resistancePhysique = resistancePhysique;
   }

   public void setTouche(int touche) {
      this.touche = touche;
   }

   public void setVitesse(int vitesse) {
      this.vitesse = vitesse;
   }

}
