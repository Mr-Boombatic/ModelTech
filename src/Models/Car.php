<?php

namespace App\Models;

use InvalidArgumentException;

class Car extends BaseCar
{
    private int $passengerSeatsCount;

    /**
     * Car constructor.
     *
     * @param string $brand
     * @param int $passengerSeatsCount
     * @param string $photoFileName
     * @param string|float $carrying
     * @throws InvalidArgumentException
     */
    public function __construct(string $brand, int $passengerSeatsCount, string $photoFileName, $carrying)
    {
        parent::__construct('car', $brand, $photoFileName, $carrying);
        $this->setNumberOfSeats($passengerSeatsCount);
    }

    /**
     * @param int $passengerSeatsCount
     * @throws InvalidArgumentException
     */
    private function setNumberOfSeats(int $passengerSeatsCount): void
    {
        if ($passengerSeatsCount < 0) {
            throw new InvalidArgumentException("The number of seats must be a non-negative integer");
        }

        if ($passengerSeatsCount % 1 !== 0) {
            throw new InvalidArgumentException("The number of seats must be an integer");
        }

        $this->passengerSeatsCount = $passengerSeatsCount;
    }
}