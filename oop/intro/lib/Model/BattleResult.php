<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 24/11/17
 * Time: 09:07 م
 */
//require_once __DIR__.'/Ship.php';
    namespace Model;
class BattleResult implements \ArrayAccess
{

    private $usedJediPower;
    private $winningShip;
    private $loosingShip;
    private $strength;
    private $drowUp;

    public function __construct($usedJediPower, AbstractShip $winningPower = null, AbstractShip $loosigPower = null, $drownUp, $strength )
    {
        $this->loosingShip = $loosigPower;
        $this->winningShip = $winningPower;
        $this->usedJediPower = $usedJediPower;
        $this->strength = $strength;
        $this->drowUp = $drownUp;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @return mixed
     */
    public function getDrowUp()
    {
        return $this->drowUp;
    }
    /**
     * @return Ship|null
     */
    public function getUsedJediPower()
    {
        return $this->usedJediPower;
    }

    /**
     * @return Ship|null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     * @return Ship
     */
    public function getLoosingShip()
    {
        return $this->loosingShip;
    }

    public function __get($pname)
    {
        return $this->$pname;
    }


    public function offsetExists($offset)
    {
        return property_exists($this , $offset);
    }

    public function offsetGet($offset)
    {
       return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
       return $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}