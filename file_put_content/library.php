<?php



abstract class carData
{
	private $color;
	private $type;
	private $model;
	private $object;
	private $horsePower;
	private $motor;

	abstract protected function setColor($color);
	abstract public function getColor();
	abstract protected function setType($type);
	abstract public function getType();
	abstract protected function setModel($model);
	abstract public function getModel();
	abstract protected function setObject($object);
	abstract public function getObject();
	abstract protected function setHorsePower($horsePower);
	abstract public function getHorsePower();
	abstract protected function setMotor($motor);
	abstract public function getMotor();
	
	


}

class SettingValues extends carData {
    function __construct()
    {
        echo "parent Constractor <br>";
    }

    protected function mapValues($car){
		$this->setColor($car['color']);
		$this->setModel($car['model']);
		$this->setMotor($car['motor']);
		$this->setHorsePower($car['horsePower']);
		$this->setType($car['type']);
		$this->setObject($car);
	}

	protected function setColor($color){
		 $this->color = $color;
	}
	function getColor(){
		return $this->color;
	}

	protected function setModel($model){
		 $this->model = $model;
	}
	function getModel(){
		return $this->model;
	}

	protected function setMotor($motor){
		 $this->motor = $motor;
	}
	function getMotor(){
		return $this->motor;
	}
	

	protected function setObject($object){
		 $this->object = $object;
	}
	function getObject(){
		return $this->object;
	}

	protected function setHorsePower($horsePower){
		 $this->horsePower = $horsePower;
	}
	function getHorsePower(){
		return $this->horsePower;
	}

	protected function setType($type){
		 $this->type = $type;
	}
	function getType(){
		return $this->type;
	}


}

// inhertance
class Car  extends SettingValues{
		
	function __construct($car){
//	    parent::__construct();
//	    echo 'aaaaaaa"';
		echo $this->mapValues($car);
	}

    function checkModel($type){
		return ($type == $this->getType()) ? "same Model" : " not The Same Model" ;
	}

    function __destruct(){
        echo 'aaaaaaa"';
    }
}



/*

to use parent Method or constructor ==> parent::
OOP Concepts : 
	Encapsulation 
	Abstraction
	Polimorphism
	Inhertance

	<!--------- Abstraction : ---------------->
1- Abstract method and declered method must be same access modifires
 
4- Abstract method must be Public or Protected
5- Public , Protected Method just used in class  and cannot called from object outside the class
-Abstract Class Canot create object  from it


<!--------- Polimorphism : ---------------->
	-Overriding[inherited method with new behaviour except final]
	-Overloading[duplicate method with different parameters or dataTypes]
	-i can make override if there is dublicate on method  
	-i cant use overload for method  only can do it using __Call

<!--------- Encapsulation : ---------------->
    Access Modifires
        - Public
        - Private
        - Protected




*/