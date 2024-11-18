<?php

namespace App\Models;

use http\Exception;
use InvalidArgumentException;

class Truck extends BaseCar {
    private $bodyWidth;
    private $bodyHeight;
    private $bodyLength;

    /**
     * @param string $brand
     * @param string $photoFileName
     * @param string $bodyWhl
     * @param string $carrying
     */
    public function __construct(string $brand, string $photoFileName, string $bodyWhl, string $carrying) {
        parent::__construct('truck', $brand, $photoFileName, $carrying);

        if (!empty($bodyWhl)) {
            $dimensions = explode('x', $bodyWhl);

            if (count($dimensions) <> 3) {
                throw new InvalidArgumentException('Dimensions don\'t require specification.');
            }

            foreach ($dimensions as $dimension) {
                $this->validateNonNegativeNumericString($dimension);
            }

            $this->bodyLength = floatval($dimensions[0]);
            $this->bodyWidth = floatval($dimensions[1] ?? 0);
            $this->bodyHeight = floatval($dimensions[2] ?? 0);
        } else {
            $this->bodyLength = $this->bodyWidth = $this->bodyHeight = 0;
        }
    }

    public function getBodyVolume() {
        return $this->bodyLength * $this->bodyWidth * $this->bodyHeight;
    }
}