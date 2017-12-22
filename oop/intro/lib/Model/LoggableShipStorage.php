<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 09/12/17
 * Time: 09:20 م
 */

namespace Model;

use Service\ShipStorageInterface;

class LoggableShipStorage implements ShipStorageInterface
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    public function fetchAllShipsData()
    {
        $ships = $this->shipStorage->fetchAllShipsData();
        $this->log(sprintf('just Fetched %s Ships' , count($ships)));
        return $ships;
    }

    public function fetchSingleShipData($id)
    {
        return $this->shipStorage->fetchSingleShipData($id);

    }

    private function log($message)
    {
        echo $message;
    }

}