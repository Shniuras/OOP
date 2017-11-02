<?php

class ElectricVehicle extends Car{

    public $maxRange;
    public $chargeTime;

    public function charge() {
        echo "Charging..<br>";
    }
    // Polymorphism. When different classes has same functions
    public function go (){
        echo "This electric vehicle is just flying over the road...<br>";
    }
}