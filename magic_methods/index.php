<?php
class Device {
    public $name;           // the name of the device
    public $battery;        // holds a Battery object
    public $data = array(); // stores misc. data in an array
    public $connection;     // holds some connection resource

    public function  __construct(Battery $battery, $name) {
        // $battery can only be a valid Battery object
        $this->battery = $battery;
        $this->name = $name;
        // connect to the network
        $this->connect();
    }

    protected function connect() {
        // connect to some external network
        $this->connection = 'resource';
        echo $this->name . ' connected '."<br>" ;
    }

    protected function disconnect() {
        // safely disconnect from network
        $this->connection = null;
        echo $this->name . ' disconnected' ."<br>";
    }

    public function  __destruct() {
        // disconnect from the network
        $this->disconnect();
        echo $this->name . ' was destroyed' ."<br>";
    }

    public function  __toString() {
        // are we connected?
        $connected = (isset($this->connection)) ? 'connected' : 'disconnected';
        // how much data do we have?
        $count = count($this->data);
        // put it all together
        return $this->name . ' is ' . $connected . ' with ' . $count . ' items in memory' . PHP_EOL;
    }

    public function  __clone() {
        // copy our Battery object
        $this->battery = clone $this->battery;
    }

    public function  __call($name, $arguments) {
//        // make sure our child object has this method
//        if(method_exists($this->connection, $name)) {
//            // forward the call to our child object
//            return call_user_func_array(array($this->connection, $name), $arguments);
//        }
        return "no  Function found with this data";
    }
}

class Battery {
//    private $charge = 0;
    private $data = array(
        "charge" => 0,
        "method" => "post"
    );

    public function setCharge($charge) {
        $charge = (int)$charge;
        if($charge < 0) {
            $charge = 0;
        }
        elseif($charge > 100) {
            $charge = 100;
        }
        $this->charge = $charge;
    }
    public function  __get($name) {
        if(isset($this->data[$name])) {
            return $this->data[$name];
        }
        return null;
    }

    public function  __set($name, $value) {
        // use the property name as the array key
        $this->data[$name] = $value;
    }

    public function  __isset($name) {
        // you could also use isset() here
        return array_key_exists($name, $this->data);
    }
//    public function  __unset($name) {
//        // forward the unset() to our array element
//        unset($this->data[$name]);
//    }

}

$battery = new Battery();

$device = new Device($battery , 'Hp');
// iMagic connected
// $device->battery->charge = 250;
//echo $battery->charge."<BR>";
//echo (isset($battery->charge , $battery))? "yes<br>"  : "no<br>" ;
//unset($battery->charge , $battery);
// iMagic\\
//$device = new Device(new Battery(), 'iMagic');
$device2 = clone $device;

echo $device->battery->charge;
$device2->battery->setCharge(605);
$device2->name = "aAA";
echo $device."<BR>";
echo $device2."<BR>";
echo "<hr>";

$device2->noExist();

?>

