<pre>
<?php

// This function allows us to avoid making a mistake with file eiliskumu. Example below with TransportInterface.php
spl_autoload_register(function ($class_name){
    include "classes/" . $class_name . '.php';
});

/*require "classes/TransportInterface.php"; // Eiliskumas yra svarbu! Siuo atveju TransportInterface yra pirmas, nes Car.php ir ElectricVehicle.php naudoja TransportInterface.php
require "classes/Car.php";
require "classes/ElectricVehicle.php";*/

/*$petro_automobilis = new Car();
$jono_automobilis = new Car();

// by default
echo $petro_automobilis->doorCount . "<br>";

// change parameter
$petro_automobilis->doorCount = 8;

// new value
echo $petro_automobilis->doorCount . "<br>";

// Methods
$petro_automobilis->go();
$petro_automobilis->stop();
$petro_automobilis->getWeight();*/

/*$petro_automobilis = new Car (4,2,900,1199);
$jono_automobilis = new Car (3,1,300,550);

var_dump($petro_automobilis);
var_dump($jono_automobilis);

echo $petro_automobilis->wheelCount . "<br>";
echo $petro_automobilis->getWheels() . "<br>";
$petro_automobilis->doorCount=6;
echo $petro_automobilis;*/

$kazio_automobilis = new Car(4,2,1500,1199);
$vinco_automobilis = new ElectricVehicle(4,2,1700,1999);

var_dump($kazio_automobilis);
var_dump($vinco_automobilis);

$kazio_automobilis->go();
$vinco_automobilis->go();