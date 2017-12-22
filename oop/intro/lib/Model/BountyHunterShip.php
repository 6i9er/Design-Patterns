<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 09/12/17
 * Time: 08:56 م
 */

namespace Model;


class BountyHunterShip extends AbstractShip
{

    use SettableJediFactorTrait;
    public function getType()
    {
        return 'Bounty Hunter';
    }


}