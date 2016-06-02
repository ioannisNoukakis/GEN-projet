package server.logic_Pers;

public class Race {

   private StatsPrincipales statsBonus;
   private String nomRace;

   public Race(String nomRace, StatsPrincipales statsBonus) {
      this.nomRace = nomRace;
      this.statsBonus = statsBonus;
   }

   public String getNomRace() {
      return nomRace;
   }

   public StatsPrincipales getStatsBonus() {
      return statsBonus;
   }
}
