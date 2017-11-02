<?php
// PSR - 0 - standartai, pagal kuriuos yra rasomas kodas
// PSR - 4 - standartai, pagal kuriuos yra rasomas kodas

class Car implements TransportInterface {

    private $wheelCount; // public scope to make that variable/function available from anywhere, other classes and instances of the object.
    private $doorCount; // protected scope when you want to make your variable/function visible in all classes that extend current class including the parent class.
    public $weight; // private scope when you want your variable/function to be visible in its own class only.
    public $engineVolume;


    // Magic method.
    function __construct(int $wheelCount, int $doorCount, int $weight, int $engineVolume) {

        $this->wheelCount = $wheelCount;
        $this->doorCount = $doorCount;
        $this->weight = $weight;
        $this->engineVolume = $engineVolume;
        echo "New car was created." . "<br>";
    }

    // allows us to get wheelCount parameter. We couldn't do that as parameter is private
    public function getWheels() {
        return $this->wheelCount;
    }

    // Magic method. Will get parameter even if that parameter is set to private(e.g. echo $petro_automobilis->wheelCount;)
    function __get($parameter) {
        return $this->$parameter;
    }

    // Magic method. Will set parameter into the value that you like (e.g. $petro_automobilis->doorCount=6;)
    function __set($parameter, $value) {
        echo "Someone is changing $parameter to $value <br>";
        if($parameter == "doorCount" && $value>5){
            echo "This car has too many doors <br>";
            $this->doorCount = $value;
        }
    }

    /*function __destruct() {
        echo "This car was destroyed.<br>";
    }*/

    // Magic method. Will show you the information below if you will try to echo object (e.g. echo $petro_automobilis;)
    function __toString(){
        return "This is the car!";
    }

    public function go() {

        echo "This car is going..." . "<br>";
    }

    public function stop() {

        echo "This car has stopped.". "<br>";
    }

    public function break() {
        echo "This car is broken";
    }

    public function getWeight() {
        echo "Weight is " . $this->weight;
    }
}