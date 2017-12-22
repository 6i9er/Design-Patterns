<?php
namespace Model;
class Ship extends AbstractShip
{

   use SettableJediFactorTrait;
    public function getType(){
        return "Empire";
    }
}