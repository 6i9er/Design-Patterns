<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 04/12/17
 * Time: 10:13 م
 */

namespace Model;
interface ShipStorageInterface
{
     public function fetchAllShipsData();

       public function fetchSingleShipData($id);
}