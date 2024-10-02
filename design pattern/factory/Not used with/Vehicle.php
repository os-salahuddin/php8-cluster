<?php

abstract class Vehicle
{
    public abstract function printVehicle();
}

class TwoWheeler extends Vehicle {
    public function printVehicle() {
        echo 'I am two wheeler';
    }
}

class ThreeWheeler extends Vehicle {
    public function printVehicle() {
        echo 'I am three wheeler';
    }
}


class Client {
    private ?Vehicle $pVehicle = null;
    public function setVehicleType($type): Client
    {
        if($type == 1) {
            $this->pVehicle = new TwoWheeler();
        } else if($type == 2) {
            $this->pVehicle = new ThreeWheeler();
        } else {
            $this->pVehicle = null;
        }

        return $this;
    }

    public function cleanup(): void {
        $this->pVehicle = null;
    }

    public function getVehicle(): ?Vehicle {
        return $this->pVehicle;
    }
}

$client = (new Client())->setVehicleType(1);
$vehicle = $client->getVehicle();
if($vehicle != null) {
    $vehicle->printVehicle();
}
$client->cleanup();