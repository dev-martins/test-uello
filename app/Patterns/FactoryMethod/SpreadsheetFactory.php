<?php

namespace App\Patterns\FactoryMethod;

use App\Patterns\FactoryMethod\Contracts\SpreadsheetInterface;

abstract class SpreadsheetFactory
{
    abstract public function factoryMethod(): SpreadsheetInterface;
}
