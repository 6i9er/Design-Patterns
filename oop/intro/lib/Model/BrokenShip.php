<?php
namespace Model;
class BrokenShip extends AbstractShip
{


//    /**
//     * @return int
//     */
    public function getJediFactor()
    {
        return 0;
    }

    public function getType(){
        return "Broken";
    }
}