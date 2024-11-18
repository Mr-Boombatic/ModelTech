<?php

namespace App\Models;

use InvalidArgumentException;

class BaseCar
{
    protected string $carType;
    protected string $brand;
    protected string $photoFileName;
    protected float $carrying;

    private const ALLOWED_CAR_TYPES = ['car', 'truck', 'spec_machine'];

    /**
     * BaseCar constructor.
     *
     * @param string $carType
     * @param string $brand
     * @param string $photoFileName
     * @param string|float $carrying
     * @throws InvalidArgumentException
     */
    public function __construct(string $carType, string $brand, string $photoFileName, $carrying)
    {
        $this->setCarType($carType);
        $this->setCarrying($carrying);

        $this->brand = $brand;
        $this->photoFileName = $photoFileName;
    }

    /**
     * @param string $carType
     * @throws InvalidArgumentException
     */
    private function setCarType(string $carType): void
    {
        if (!in_array($carType, self::ALLOWED_CAR_TYPES, true)) {
            throw new InvalidArgumentException("Incorrect vehicle type. Valid values: " . implode(", ", self::ALLOWED_CAR_TYPES));
        }
        $this->carType = $carType;
    }

    /**
     * @param string $carrying
     * @throws InvalidArgumentException
     */
    private function setCarrying(string $carrying): void
    {
        $this->validateNonNegativeNumericString($carrying);
        $this->carrying = (float)$carrying;
    }

    /**
     * @param string $string
     * @throws InvalidArgumentException
     */
    protected function validateNonNegativeNumericString(string $string): void
    {
        if (empty($string)) {
            throw new InvalidArgumentException("The string cannot be empty.");
        }

        if (!is_numeric($string)) {
            throw new InvalidArgumentException("The value must contain only a number (integer or real): " . $string);
        }

        $number = (float)$string;

        if ($number < 0) {
            throw new InvalidArgumentException("The number must be non-negative.");
        }
    }

    /**
     * Returns the extension of the photo file or an empty string if none exists.
     *
     * @return string
     */
    public function getPhotoFileExt(): string
    {
        $info = pathinfo($this->photoFileName);
        return $info['extension'] ?? '';
    }
}