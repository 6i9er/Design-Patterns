<?php
require_once __DIR__ . '/bootstrap.php';

function shipSummery($ship){
    echo $ship->getNameAndSpaces(true);
    echo " <HR>";
    echo $ship->getNameAndSpaces(false);
}

$newShip = new Ship();
$newShip->name = "star Ship";
$newShip->weponPower = 100;
shipSummery($newShip);

echo "<hr>";
$minaShip = new Ship();
$minaShip->name = "mina Ship";
$minaShip->weponPower = 100;
$minaShip->jediFactor = 100;
$minaShip->strength = 100;
shipSummery($minaShip);
echo "<hr>";
echo ($minaShip->doesThisShipStrongerThanOther($newShip))? $minaShip->name . " is Stronger " : $newShip->name . "is Stronger";
echo "<hr>";
$ships = getShips();
echo $ships['starFighter']->name;