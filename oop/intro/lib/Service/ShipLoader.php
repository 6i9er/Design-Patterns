<?php
namespace Service;

use Model\BountyHunterShip;
use Model\RebelShip;
use Model\Ship;
use Model\ShipCollection;
use Service\ShipStorageInterface;

class ShipLoader
{
    private $shipStorage;

    public function __construct( $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    function getShips()
    {
        try
        {
            $shipsData = $this->shipStorage->fetchAllShipsData();
        } catch (\PDOException $e){
            trigger_error("Database  exception ".$e->getMessage());
            $shipsData = [];
        }
            $shipsArray = array();
            foreach($shipsData as $shipData){
                $shipsArray[] =  $this->createShipFromShipData($shipData);
//                array_push($shipsArray , $this->createShipFromShipData($shipData));
            }
            $shipsArray[] = new BountyHunterShip('Slave I');
//            return $shipsArray;
            return new ShipCollection($shipsArray);

    }
    public function findShipById($id)
    {
        $shipArray = $this->shipStorage->fetchSingleShipData($id);
        return ($this->createShipFromShipData($shipArray));
    }

    private function createShipFromShipData(array $shipData)
    {
        if($shipData['team'] == "rebel"){
            $ship = new RebelShip($shipData['name']);
        }else{
            $ship = new Ship($shipData['name']);
        }
        $ship->setStrength($shipData['strength']);
        $ship->setId($shipData['id']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setWeaponPower($shipData['weapon_power']);
        return $ship;
    }


}