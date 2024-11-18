<?php

namespace App\Models;

use InvalidArgumentException;

class BaseCar {
    protected $carType;
    protected $brand;
    protected $photoFileName;
    protected $carrying;

    const ALLOWED_CAR_TYPES = ['car', 'truck', 'spec_machine'];

    /**
     * @param string $carType
     * @param string $brand
     * @param string $photoFileName
     * @param string $carrying
     */
    public function __construct(string $carType, string $brand, string $photoFileName, string $carrying) {
        $this->setCarType($carType);
        $this->setCarrying($carrying);

        $this->brand = $brand;
        $this->photoFileName = $photoFileName;
    }

    private function setCarType($carType)
    {
        if (!in_array($carType, self::ALLOWED_CAR_TYPES)) {
            throw new InvalidArgumentException("Incorrect vehicle type. Valid values: " . implode(", ", self::ALLOWED_CAR_TYPES));
        }
        $this->carType = $carType;
    }

    private function setCarrying($carrying)
    {
        $this->validateNonNegativeNumericString($carrying);
        $this->carrying = (float)$carrying;
    }

    protected function validateNonNegativeNumericString($string): void
    {
        if (empty($string)) {
            throw new InvalidArgumentException("The string cannot be empty");
        }

        if (!is_numeric($string)) {
            throw new InvalidArgumentException("The value must contain only a number (integer or real): ". $string);
        }

        $number = (float)$string;

        if ($number < 0) {
            throw new InvalidArgumentException("The number must be non-negative");
        }
    }

    /**
     * Может быть возвращена пустая строка, если файл не имеет расширения
     * @return string
     */
    public function getPhotoFileExt() {
        $info = pathinfo($this->photoFileName);
        if (isset($info['extension']))
            return $info['extension'];
        else
            return "";
    }
}