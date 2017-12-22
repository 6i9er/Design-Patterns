<?php

namespace Model;
class RebelShip extends AbstractShip
{
    public function getFavoriteJedi()
    {
        $jedi = array("youka" , "koko" , "soko" , "sodo");
        $rand = rand(0,3);
        return $jedi[$rand];
    }

    public function getType()
    {
        return "Rebel";
    }

    public function getNameAndSpaces($returnType = false){
        $val = parent::getNameAndSpaces();
        $val .= ' (rabel)';
        return $val;

    }

    public function getJediFactor()
    {
        return mt_rand(10 , 30);
    }
}