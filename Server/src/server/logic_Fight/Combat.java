/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package server.logic_Fight;

import server.logic_Pers.Competence;
import server.logic_Pers.Personnage;
import utility.MySQLUtility;

/**
 *
 * @author User
 */
public class Combat {
   Personnage pOff;
   Personnage pDef;
   Competence attaque;
   int bonusDef;
   int bonusOff;
   boolean estPhysique = false;
   boolean combatPerdu = false;
   int lastDegats;

   public Combat(Personnage pOff, Personnage pDef, Competence attaque) {
      this.pOff = pOff;
      this.pDef = pDef;
      this.attaque = attaque;
      calculBonus(attaque);
      calculDegats();
   }

   public int getLastDegats()
   {
      return lastDegats;
   }

   private void calculDegats() {
      int degats = 0 ;
     if(chanceEsquive() != true){
        degats = (attaque.getDegats()*(10 + attaque.getFacteurPuissance()*(bonusOff-bonusDef))/10);
        pDef.setPointDeVie(pDef.getPointDeVie() - degats);
        System.out.println("DEGATS : "+degats);
        if(pDef.getPointDeVie() <= 0){
           combatPerdu = true;
           pDef.setPointDeVie(0);
        }
        // journal de comabt save les donnée
     }else{
        System.out.println("ESQUIVE");
        // journal de combat esquive de l'attaque
      }
      lastDegats = degats;
   }
   
   public boolean finCombat() {
      if(combatPerdu)
         System.out.println(pOff.getNom() + " a massacré " + pDef.getNom() + " avec la puissance de " + attaque.getNom());

      return combatPerdu;
   }

   private boolean chanceEsquive(){   
      return estPhysique == true ? 
              pOff.getStatsSec().getTouche() < pDef.getStatsSec().getEsquive() 
            : pOff.getStatsSec().getTouche() < pDef.getStatsSec().getVitesse();
   }
   
   // retourne la valeur de la statistiques qui influence le type de dégats
   private void calculBonus(Competence attaque) {
      String statInfluence = attaque.getTypeDegats();

      if (attaque.getEstPrincipale() == true) {
         switch (statInfluence) {
            case "melee":
               bonusOff = pOff.getStatsPrinc().getForce();
               bonusDef = pDef.getStatsPrinc().getConstitution() /2;
               estPhysique = true;
            case "projectile":
               bonusOff = pOff.getStatsPrinc().getAgitlite();
               bonusDef = pDef.getStatsPrinc().getConstitution() /2;
                estPhysique = true;
            case "bouclier":
               bonusOff = pOff.getStatsPrinc().getForce();
               bonusDef = pDef.getStatsPrinc().getConstitution() /2;
                estPhysique = true;
            case "feu":
               bonusOff = pOff.getStatsPrinc().getIntelligence();
               bonusDef = pDef.getStatsPrinc().getIntelligence() /2;
            case "glace":
               bonusOff = pOff.getStatsPrinc().getIntelligence();
               bonusDef = pDef.getStatsPrinc().getIntelligence() /2;
            case "divin":
               bonusOff = pOff.getStatsPrinc().getIntelligence();
               bonusDef = pDef.getStatsPrinc().getIntelligence() /2;
         }
      } else {
         switch (statInfluence) {
            case "melee":
               bonusOff = pOff.getStatsSec().getMelee();
               bonusDef = pDef.getStatsSec().getResistancePhysique() / 2;
                estPhysique = true;
            case "projectile":
               bonusOff = pOff.getStatsSec().getProjectile();
                bonusDef = pDef.getStatsSec().getResistancePhysique() /2;
                estPhysique = true;
            case "bouclier":
               bonusOff = pOff.getStatsSec().getBouclier();
                bonusDef = pDef.getStatsSec().getResistancePhysique() /2;
                estPhysique = true;
            case "feu":
               bonusOff = pOff.getStatsSec().getFeu();
                bonusDef = pDef.getStatsSec().getResistanceElementaire() /2;
            case "glace":
               bonusOff = pOff.getStatsSec().getGlace();
                bonusDef = pDef.getStatsSec().getResistanceElementaire()/2;
            case "divin":
               bonusOff = pOff.getStatsSec().getDivin();
               bonusDef = pDef.getStatsSec().getResistanceDivine() /2;
         }
      }
   }
}
