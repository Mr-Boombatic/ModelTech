<?php

namespace App\Models;

use InvalidArgumentException;

class Truck extends BaseCar
{
    private float $bodyWidth;
    private float $bodyHeight;
    private float $bodyLength;

    /**
     * Truck constructor.
     *
     * @param string $brand
     * @param string $photoFileName
     * @param string $bodyWhl
     * @param string|float $carrying
     * @throws InvalidArgumentException
     */
    public function __construct(string $brand, string $photoFileName, string $bodyWhl, $carrying)
    {
        parent::__construct('truck', $brand, $photoFileName, $carrying);
        $this->initializeDimensions($bodyWhl);
    }

    /**
     * Initializes the dimensions of the truck.
     *
     * @param string $bodyWhl
     * @throws InvalidArgumentException
     */
    private function initializeDimensions(string $bodyWhl): void
    {
        if (!empty($bodyWhl)) {
            $dimensions = explode('x', $bodyWhl);

            if (count($dimensions) !== 3) {
                throw new InvalidArgumentException('Dimensions must be specified as length x width x height.');
            }

            $this->bodyLength = $this->validateAndConvertDimension($dimensions[0]);
            $this->bodyWidth = $this->validateAndConvertDimension($dimensions[1]);
            $this->bodyHeight = $this->validateAndConvertDimension($dimensions[2]);
        } else {
            $this->bodyLength = $this->bodyWidth = $this->bodyHeight = 0;
        }
    }

    /**
     * Validates the dimension and converts it to float.
     *
     * @param string $dimension
     * @return float
     * @throws InvalidArgumentException
     */
    private function validateAndConvertDimension(string $dimension): float
    {
        $this->validateNonNegativeNumericString($dimension);
        return (float)$dimension;
    }

    /**
     * Calculates the body volume of the truck.
     *
     * @return float
     */
    public function getBodyVolume(): float
    {
        return $this->bodyLength * $this->bodyWidth * $this->bodyHeight;
    }
}