<?php

namespace App\Models;

class SpecMachine extends BaseCar
{
    private string $extra;

    /**
     * SpecMachine constructor.
     *
     * @param string $brand
     * @param string $photoFileName
     * @param string|float $carrying
     * @param string $extra
     */
    public function __construct(string $brand, string $photoFileName, $carrying, string $extra)
    {
        parent::__construct('spec_machine', $brand, $photoFileName, $carrying);
        $this->setExtra($extra);
    }

    /**
     * Sets the extra feature for the special machine.
     *
     * @param string $extra
     */
    private function setExtra(string $extra): void
    {
        $this->extra = $extra;
    }
}