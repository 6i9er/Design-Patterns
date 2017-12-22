<?php
namespace Service;
//require_once __DIR__.'/BattleResult.php';
define("TEST" , "minaaaaaaaaaaaaaaaaaaaaaa",true);
use Model\AbstractShip;
use Model\BattleResult;
class BattleManager
{
    const  TYPE_NORMAL = 'normal';
    const  TYPE_NO_JEDI = 'no_jedi';
    const  TYPE_ONLY_JEDi = 'only_jedi';
    public function battle(AbstractShip $ship1, $ship1Quantity, $ship2, $ship2Quantity , $battleType)
    {
        $ship1Strength = $ship1->getStrength()*$ship1Quantity;
        $ship2Strength = $ship2->getStrength()*$ship2Quantity;
        $ship1UsedJediForce = false;
        $ship2UsedJediForce = false;
        $returnArray = '';
        $index = 0;
        $i=0;
        while($ship1Strength > 0 && $ship2Strength >0){
            if($battleType != self::TYPE_NO_JEDI && self::didJediDestroiedTheShipUsingForce($ship1)){
                $ship2Strength = 0;
                $ship2UsedJediForce = true;
                break;
            }

            if($battleType != self::TYPE_NO_JEDI &&  self::didJediDestroiedTheShipUsingForce($ship2)){
                $ship1Strength = 0;
                $ship1UsedJediForce = true;
                break;
            }

            if($battleType != self::TYPE_ONLY_JEDi){
                $ship1Strength = $ship1Strength -1;
                $ship2Strength = $ship2Strength-1;
            }

            if($i == 100){
                $ship1Strength = 0;
                $ship2Strength = 0;
            }
            $i++;
            $index++;
        }
        if($ship1Strength > $ship2Strength){
            $returnArray['winnerName'] = $ship1;
            $returnArray['looserName'] = $ship2;
            $returnArray['strength'] = $ship1Strength;
            $returnArray['drawUp'] = 0;
            $returnArray['usedJediPower'] = $ship1UsedJediForce || $ship2UsedJediForce;
        }elseif($ship1Strength < $ship2Strength){
            $returnArray['winnerName'] = $ship2;
            $returnArray['looserName'] = $ship1;
            $returnArray['strength'] = $ship2Strength;
            $returnArray['drawUp'] = 0;
            $returnArray['usedJediPower'] = $ship1UsedJediForce || $ship2UsedJediForce;
        }else{
            $returnArray['winnerName'] = $ship1;
            $returnArray['looserName'] = $ship2;
            $returnArray['strength'] = $ship1Strength;
            $returnArray['drawUp'] = 1;
            $returnArray['usedJediPower'] = $ship1UsedJediForce || $ship2UsedJediForce;
        }
        return new BattleResult($returnArray['usedJediPower'] , $returnArray['looserName'], $returnArray['looserName'], $returnArray['drawUp'] , $returnArray['strength'] );
        return $returnArray;
    }

    private function didJediDestroiedTheShipUsingForce(AbstractShip  $ship){
        $jediHeroProbabiliy = $ship->getJediFactor()/100;
        return mt_rand(1,100) <= ($jediHeroProbabiliy*100);
    }

    public static function getAllBattleTypes(){
        return array(
          self::TYPE_NORMAL => 'normal',
          self::TYPE_NO_JEDI => 'no Jedi Power',
          self::TYPE_ONLY_JEDi => 'With Kedi PoWer'
        );
    }

    protected static function getAllBattleTypes1(){
        return array(
            self::TYPE_NORMAL => 'normal',
            self::TYPE_NO_JEDI => 'no Jedi Power',
            self::TYPE_ONLY_JEDi => 'With Kedi PoWer'
        );
    }

    private static function getAllBattleTypes2(){
        return array(
            self::TYPE_NORMAL => 'normal',
            self::TYPE_NO_JEDI => 'no Jedi Power',
            self::TYPE_ONLY_JEDi => 'With Kedi PoWer'
        );
    }

    public static function method(){
        return self::getAllBattleTypes2();
    }
}