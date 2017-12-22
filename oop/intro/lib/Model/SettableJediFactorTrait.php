<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 09/12/17
 * Time: 09:04 م
 */

namespace Model;


trait SettableJediFactorTrait
{

    private $jediFactor;

    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }
}