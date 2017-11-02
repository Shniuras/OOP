<pre>
<?php
// Microtime is needed to count how much time it takes to execute code. Code continues bellow...
$start = microtime(true);

require "vendor/autoload.php";

// This is a function that we have downloaded into our PC. This function enables Whoops.
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

/*// This function allows us to avoid making a mistake with file eiliskumu. This will automatically set eiliskuma. Example below with TransportInterface.php
spl_autoload_register(function ($class_name){
    include "classes/" . $class_name . '.php';
});*/

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

/*$kazio_automobilis = new Car(4,2,1500,1199);
$vinco_automobilis = new ElectricVehicle(4,2,1700,1999);

var_dump($kazio_automobilis);
var_dump($vinco_automobilis);

$kazio_automobilis->go();
$vinco_automobilis->go();*/


// Application Modules
$db = new Database();
echo "<br>";
$user = new User($db);

//Application

require "app/index.php";

// This object was created in Database.php and using select method we show user from our database
/*print_r($db->select("SELECT * FROM users WHERE username = :username",["username" => "Jonas"]));*/

// This object creates new user. This method is used from Database.php
/*echo $db->insert("INSERT INTO users (username, password) VALUES (:username, :password)",
    [
        "username" => "Ona",
        "password" => password_hash("dievu miskas",PASSWORD_DEFAULT)
    ]);*/

// ...(continues)...this part of code checks how much time does it take to execute whole code and how much ram it uses...
echo "<div style='position: absolute; left: 0; bottom:0;'>";
echo "It took " . round((microtime(true) - $start)*1000,2) . "ms ";
echo "& " . round(memory_get_peak_usage()/(1024*1024),2) . "MB.";
echo "</div>";