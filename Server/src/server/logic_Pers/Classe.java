package server.logic_Pers;

public class Classe {

   private String nomClasse;
   private StatsSecondaires statsBonus;

   public Classe(String nomClasse, StatsSecondaires statsBonus) {
      this.nomClasse = nomClasse;
      this.statsBonus = statsBonus;
   }

   public String getNomClasse() {
      return nomClasse;
   }

   public StatsSecondaires getStatsBonus() {
      return statsBonus;
   }

}
