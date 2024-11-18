<?php

namespace App;

use App\Models\Car;
use App\Models\SpecMachine;
use App\Models\Truck;
use Exception;

class CarHelper
{
    public static function getCarList($fileName): array
    {
        $carList = [];

        if (($stream = fopen($fileName, 'r')) !== false) {
            fgetcsv($stream);

            // empty rows is automatically skipped
            while (($row = fgetcsv($stream, null, ';')) !== false) {
                try {
                    $carType = $row[0];
                    $brand = $row[1];
                    $photoFileName = $row[3];
                    $carrying = $row[5];

                    if ($carType === 'car') {
                        $passengerSeatsCount = ($row[2] ?? 0);
                        $car = new Car($brand, $passengerSeatsCount, $photoFileName, $carrying);
                        $carList[] = $car;

                    } elseif ($carType === 'truck') {
                        $bodyWhl = ($row[4] ?? '');
                        $truck = new Truck($brand, $photoFileName, $bodyWhl, $carrying);
                        $carList[] = $truck;

                    } elseif ($carType === 'spec_machine') {
                        $extra = ($row[6] ?? '');
                        $specMachine = new SpecMachine($brand, $photoFileName, $carrying, $extra);
                        $carList[] = $specMachine;
                    }
                } catch (Exception $e) {
                    echo 'Создание объекта для строки "' . implode(';', $row) . '" пропущено: ' . $e->getMessage() . "\n";
                }
            }
            fclose($stream);
        }

        return $carList;
    }
}