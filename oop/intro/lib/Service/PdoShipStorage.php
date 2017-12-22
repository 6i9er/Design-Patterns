<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 04/12/17
 * Time: 09:49 م
 */

namespace Service;
use Service\ShipStorageInterface;
class PdoShipStorage implements ShipStorageInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllShipsData(){
        $pdo = $this->pdo;
        $statment = $pdo->prepare('select * from ship');
        $statment->execute();
        $ships = ($statment->fetchAll(\PDO::FETCH_ASSOC));
        return $ships;
    }

    public function fetchSingleShipData($id){
        $pdo = $this->pdo;
        $statment = $pdo->prepare('select * from ship WHERE id = :id');
        $statment->execute(array('id' => $id));
        $ships = ($statment->fetch(\PDO::FETCH_ASSOC));
        if(!$ships){
            return null;
        }
        return $ships;
    }
}