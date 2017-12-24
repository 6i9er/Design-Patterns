<?php
/**
 *
 * Created by PhpStorm.
 * User: minaamir
 * Date: 24/12/17
 * Time: 08:00 م
 * Facade Design pattern is used to implement all my Classes on one  sub class where i initialaize all the objects
 * on the facade Constructor and then all The Method of the other classess  will be implemented with another names
 * and make each method map to the real method
 */

 class Users
{
    private $name = '';
    private $age = 0;
    private  $address = '';

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }
}

 class Sports
{
    private $name = '';
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

 class Clubs
{
    private $name = '';
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

 class Facade
{
    private $user ;
    private $club ;
    private $sport ;
    public function __construct()
    {
        $this->club = new Clubs();
        $this->user = new Users();
        $this->sport = new Sports();
    }

    // User Methods Interface
    public function setUserName($name){
        $this->user->setName($name);
    }
    public function getUserName(){
        echo $this->user->getName()."<BR>";
    }

    public function setUserAge($age){
        $this->user->setAge($age);
    }
    public function getUserAge(){
        echo $this->user->getAge()."<BR>";
    }

    public function setUserAddress($address){
        $this->user->setAddress($address);
    }
    public function getUserAddress(){
        echo $this->user->getAddress()."<BR>";
    }

    // Club Function
    public function setClubName($name){
        $this->club->setName($name);
    }
    public function getClubName(){
        echo $this->club->getName()."<BR>";
    }

    // sport Function
    public function setSportName($name){
        $this->sport->setName($name);
    }
    public function getSportName(){
        echo $this->sport->getName()."<BR>";
    }

}

    $facade = new Facade();
    echo " <h1>print user data </h1><br>";
    $facade->setUserName("Mina Amir Samy");
    echo $facade->getUserName();
    $facade->setUserAge("28");
    echo $facade->getUserAge();
    $facade->setUserAddress("Mansoura Dakahlia Egypt");
    echo $facade->getUserAddress();
    echo " <br>---------------------------------</br>";
    echo " <h1>print Club data </h1><br>";
    $facade->setClubName("Barcelona");
    echo $facade->getClubName();
    echo " <br>---------------------------------</br>";
    echo " <h1>print Sport data </h1><br>";
    $facade->setSportName("Kong fu");
    echo $facade->getSportName();
    echo " <br>---------------------------------</br>";


