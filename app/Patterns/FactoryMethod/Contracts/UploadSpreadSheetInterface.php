<?php

namespace App\Patterns\FactoryMethod\Contracts;

interface UploadSpreadSheetInterface
{
    public function uploadWorksheet(): bool;
}
