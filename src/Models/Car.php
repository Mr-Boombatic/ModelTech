<?php

namespace App\Models;

class Car extends BaseCar {
    private int $passengerSeatsCount;

    public function __construct($brand, $passengerSeatsCount, $photoFileName, $carrying) {
        parent::__construct('car', $brand, $photoFileName, $carrying);
        $this->setNumberOfSeats($passengerSeatsCount);
    }

    private function setNumberOfSeats($passengerSeatsCount): void {
        if (!is_numeric($passengerSeatsCount) || $passengerSeatsCount < 0) {
            throw new \InvalidArgumentException("The number of seats must be an even number");
        }

        $this->$passengerSeatsCount = (int)$passengerSeatsCount;
    }
}