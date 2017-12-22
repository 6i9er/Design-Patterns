<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 22/12/17
 * Time: 09:01 م
 */

/**
 * Class Singleton is the Parent class
 */
class Singleton
{
    /**
     * @var bool|object
     */
    private static $instance = false;

    /**its not allowed to create new Object
     * Singleton constructor.
     */
    protected function __construct()
    {
        echo "Connected".PHP_EOL;
    }

    /**
     * create new object or return the current object if its already created
     * @return bool|object
     */
    public static function getInstance()
    {
        // check if the object is null
        if(self::$instance == false) {
            $class = __CLASS__;
        return self::$instance = new static();
        }
        return self::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    private function __sleep()
    {
        // TODO: Implement __sleep() method.
    }
}

class Database extends Singleton
{
    protected $dsn;
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
    }

    public function getDsn()
    {
        return $this->dsn;
    }
}

/**
 * create new object first and the second variable
 * will affect on the first object without creating new object
 */

$database = Database::getInstance();
$database ->setDsn("mysql://");
echo $database ->getDsn();
echo "<hr>";
$secondObject = Database::getInstance();
$secondObject ->setDsn("Oracle://");
echo $secondObject->getDsn();
echo "<br>";
echo $database->getDsn();
