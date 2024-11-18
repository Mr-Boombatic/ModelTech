<?php

namespace App\Models;

class SpecMachine extends BaseCar {
    private $extra;

    public function __construct($brand, $photoFileName, $carrying, $extra) {
        parent::__construct('spec_machine', $brand, $photoFileName, $carrying);
        $this->extra = $extra;
    }
}