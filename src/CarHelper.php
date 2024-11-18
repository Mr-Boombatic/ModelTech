<?php

namespace App;

use App\Models\Car;
use App\Models\SpecMachine;
use App\Models\Truck;
use Exception;
use InvalidArgumentException;

class CarHelper
{
    /**
     * Get a list of cars from a CSV file.
     *
     * @param string $fileName
     * @return Car[] An array of Car objects created from the CSV file.
     * @throws InvalidArgumentException If the file cannot be opened.
     */
    public static function getCarList(string $fileName): array
    {
        $carList = [];

        if (!file_exists($fileName) || !is_readable($fileName)) {
            throw new InvalidArgumentException('Cannot open the file: ' . $fileName);
        }

        if (($stream = fopen($fileName, 'r')) !== false) {
            fgetcsv($stream);

            while (($row = fgetcsv($stream, null, ';')) !== false) {
                if (empty(array_filter($row))) {
                    continue;
                }

                try {
                    $carType = $row[0] ?? '';
                    $brand = $row[1] ?? '';
                    $photoFileName = $row[3] ?? '';
                    $carrying = $row[5] ?? '';

                    switch ($carType) {
                        case 'car':
                            $passengerSeatsCount = $row[2] ?? 0;
                            $car = new Car($brand, (int)$passengerSeatsCount, $photoFileName, $carrying);
                            $carList[] = $car;
                            break;

                        case 'truck':
                            $bodyWhl = $row[4] ?? '';
                            $truck = new Truck($brand, $photoFileName, $bodyWhl, $carrying);
                            $carList[] = $truck;
                            break;

                        case 'spec_machine':
                            $extra = $row[6] ?? '';
                            $specMachine = new SpecMachine($brand, $photoFileName, $carrying, $extra);
                            $carList[] = $specMachine;
                            break;

                        default:
                            throw new InvalidArgumentException('Invalid car type: ' . $carType);
                    }
                } catch (Exception $e) {
                    echo 'Object creation to "' . implode(';', $row) . '" is missed: ' . $e->getMessage() . "\n";
                }
            }
            fclose($stream);
        }

        return $carList;
    }
}