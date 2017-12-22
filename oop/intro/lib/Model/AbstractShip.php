<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 04/12/17
 * Time: 08:59 م
 */

namespace Model;
abstract class AbstractShip
{

    private $name = '';
    private $weaponPower = 0;
    private $strength = 0;
    private $jediFactor = 0;
    private $underRepair;
    private $id=0;

    abstract public function getJediFactor();
    abstract public function getType();

    public function __construct($name)
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1,100) < 30;
    }

    public function isRepaired(){
        return $this->underRepair;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength( $strength)
    {
        if(!is_numeric($strength)){
            throw new \Exception('Strength must be numeric');

        }
        $this->strength = $strength;
    }


    /**
     * @param int $jediFactor
     */
    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }




    public function getNameAndSpaces($returnType = false){
        if($returnType)
        {
            return sprintf(
                '%s : ,weponPower : %s,strength : %s,jediFactor: %s',
                $this->getName() , $this->getWeaponPower(),$this->getStrength(), $this->getJediFactor()
            );
        }
        else
        {
            return sprintf(
                '%s/%s/%s/%s',
                $this->getName() , $this->getWeaponPower(),$this->getStrength(), $this->getJediFactor()
            );
        }
    }


    public function doesThisShipStrongerThanOther($otherShip)
    {
        return $this->strength > $otherShip->strength;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function __get($propertyName)
    {
        return $this->$propertyName;
    }
}