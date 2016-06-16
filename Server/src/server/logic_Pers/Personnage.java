package server.logic_Pers;

import server.logic_Fight.Combat;

/*
 GEN Projet
 */
public class Personnage {

   private String nom;
   private StatsPrincipales statsPrinc;
   private StatsSecondaires statsSec;
   private Competence[] attaques;
   private String race;
   private String classe;
   private int pointDeVie;
   private int pointVigMana;
   private int id;

   public Personnage(int id, String nom, Race race, Classe classe,
           StatsPrincipales statsP, StatsSecondaires statsS,
                     Competence[] attaques) {
         this.id = id;
         this.nom = nom;
         this.statsPrinc = statsP;
         this.statsSec = statsS;
         this.attaques = attaques;
         this.race = race.getNomRace();
         this.classe = classe.getNomClasse();
         initPersonnage(race, classe);
   }

   private void initPersonnage(Race race, Classe classe) {
      // calcul des statistiques principales
      statsPrinc.setAgitlite(statsPrinc.getAgitlite() + race.getStatsBonus().getAgitlite());
      statsPrinc.setConstitution(statsPrinc.getConstitution() + race.getStatsBonus().getConstitution());
      statsPrinc.setForce(statsPrinc.getForce() + race.getStatsBonus().getForce());
      statsPrinc.setIntelligence(statsPrinc.getIntelligence() + race.getStatsBonus().getIntelligence());
      statsPrinc.setVigueurMana(statsPrinc.getVigueurMana() + race.getStatsBonus().getVigueurMana());
      // calcul des statistiques secondaires
      statsSec.setBouclier(statsSec.getBouclier() + classe.getStatsBonus().getBouclier());
      statsSec.setDivin(statsSec.getDivin() + classe.getStatsBonus().getDivin());
      statsSec.setEsquive(statsSec.getEsquive() + classe.getStatsBonus().getEsquive());
      statsSec.setFeu(statsSec.getFeu() + classe.getStatsBonus().getFeu());
      statsSec.setGlace(statsSec.getGlace() + classe.getStatsBonus().getGlace());
      statsSec.setMelee(statsSec.getMelee() + classe.getStatsBonus().getMelee());
      statsSec.setProjectile(statsSec.getProjectile() + classe.getStatsBonus().getProjectile());
      statsSec.setResistanceDivine(statsSec.getResistanceDivine() + classe.getStatsBonus().getResistanceDivine());
      statsSec.setResistanceElementaire(statsSec.getResistanceElementaire() + classe.getStatsBonus().getResistanceElementaire());
      statsSec.setResistancePhysique(statsSec.getResistancePhysique() + classe.getStatsBonus().getResistancePhysique());
      statsSec.setTouche(statsSec.getTouche() + classe.getStatsBonus().getTouche());
      statsSec.setVitesse(statsSec.getVitesse() + classe.getStatsBonus().getVitesse());
      // calcul des points de vie
      this.pointDeVie = statsPrinc.getConstitution() * 100;
      this.pointVigMana = statsPrinc.getIntelligence() * 10;
   }

   @Override
   public String toString() {
      String s = "Nom : " + nom 
              + "\nRace : " + race + "\nClasse : " + classe
              + "\nPoint de vie :" + pointDeVie
              + "\nPoint de vigueur / mana : " + pointVigMana
              + "\n\nStatistiques principales\n" + statsPrinc.toString()
              + "\n\nStatistiques secondaires\n" + statsSec.toString()
              + "\n\nAttaques\n" + attaques[0].toString()
              + "\n\nAttaques\n" + attaques[1].toString()
              + "\n\nAttaques\n" + attaques[2].toString()
              + "\n\nAttaques\n" + attaques[3].toString();
      return s;
   }

   public String getNom() {
      return nom;
   }

   public StatsSecondaires getStatsSec() {
      return statsSec;
   }

   public StatsPrincipales getStatsPrinc() {
      return statsPrinc;
   }

   public Competence getCompetence(int i) {
      if(i < 0 || i > 3)
         return null;

      return attaques[i];
   }

   public String[] getCompetencesName()
   {
      String[] comp = new String[4];
      for(int i = 0; i < attaques.length; i++)
         comp[i] = i + " : " + attaques[i].getNom();

      return comp;
   }

   public int getPointDeVie() {
      return pointDeVie;
   }

   public void setPointDeVie(int newPV) {
      this.pointDeVie = newPV;
   }

   public int getPointVigMana() {
      return pointVigMana;
   }

   public void setPointVigMana(int mana) {
      this.pointVigMana = mana;
   }

   public void setNom(String nom) {
      this.nom = nom;
   }

   public int getId() {
      return id;
   }

   public String getRace() {
      return race;
   }

   public String getClasse() {
      return classe;
   }
}
