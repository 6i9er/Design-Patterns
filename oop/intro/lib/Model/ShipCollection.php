<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 08/12/17
 * Time: 08:19 م
 */

namespace Model;


use Traversable;

class ShipCollection implements \ArrayAccess , \IteratorAggregate
{
    private  $ships;
    public function __construct($ships)
    {
        $this->ships = $ships;
    }

    public function offsetExists($offset) {
        return array_key_exists($offset , $this->ships  );
    }
    public function offsetGet($offset) {
        return $this->ships[$offset];
    }
    public function offsetSet($offset, $value) {
        return $this->ships[$offset] = $value;
    }
    public function offsetUnset($offset) {
        unset($this->ships[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->ships);
    }
}