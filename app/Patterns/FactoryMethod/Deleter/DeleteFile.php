<?php

namespace App\Patterns\FactoryMethod\Deleter;

use App\Patterns\FactoryMethod\Contracts\DeleteSpreadsheetInterface;
use Illuminate\Support\Facades\Storage;

class DeleteFile implements DeleteSpreadsheetInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->deleteWorksheet();
    }

    public function deleteWorksheet(): void
    {
        Storage::disk('public')->delete('csv/' . $this->data['file']);
    }
}
