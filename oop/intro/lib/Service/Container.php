<?php
namespace Service;
use Model\LoggableShipStorage;
use Service\JsonFileShipStorageInterface;
use Service\ShipLoader;
use Service\PdoShipStorage;
use Service\BattleManager;
class Container
{
    private $configuration;
    private $pdo;
    private $shipLoader;
    private $shipStorage;
    private $battleManager;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new \PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    /**
     * @return ShipLoader
     */
    public function getShipLoader()
    {
        if($this->shipLoader === null)
        {
            $this->shipLoader = new ShipLoader($this->getShipStorage());
        }
        return $this->shipLoader;
    }

    /**
     * @return ShipLoader
     */
    public function getShipStorage()
    {
        if($this->shipStorage === null)
        {
            $this->shipStorage = new PdoShipStorage($this->getPDO());
//            $this->shipStorage = new JsonFileShipStorageInterface(__DIR__."../../resources/ships.json");
            $this->shipStorage = new LoggableShipStorage($this->shipStorage);
        }
        return $this->shipStorage;
    }

    /**
     * @return BattleManager
     */
    public function getBattleManager()
    {
        if($this->battleManager === null)
        {
            $this->battleManager = new BattleManager($this->getPDO());
        }
        return $this->battleManager;
    }
}