<?php

require __DIR__ . '/vendor/autoload.php';

use App\CarHelper;

$fileName = 'cars.csv';
$cars = CarHelper::getCarList($argv[1]);

echo "\nCreated vehicle objects: \n";
foreach ($cars as $car) {
    $reflection = new \ReflectionClass($car);
    $properties = $reflection->getProperties();

    foreach ($properties as $property) {
        $property->setAccessible(true);

        echo "  " . $property->getName() . ": " . $property->getValue($car);

        if ($property->getName() == 'photoFileName')
            echo "; file extension: " . $car->getPhotoFileExt();

        echo "\n";
    }

    echo "\n";
}