<?php

namespace App\Patterns\FactoryMethod\Readers;

use App\Models\Freight;
use App\Patterns\FactoryMethod\Contracts\SpreadsheetInterface;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class StoreCSV implements
    SpreadsheetInterface,
    ToModel,
    WithHeadingRow,
    WithCustomCsvSettings,
    WithBatchInserts,
    WithChunkReading
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->storeWorksheet();
    }

    public function storeWorksheet(): void
    {
        Excel::import(
            $this,
            base_path('storage/app/public/csv/' . $this->data['file'])
        );
    }

    public function model(array $row)
    {
        return new Freight([
            'from_postcode'     => $row['from_postcode'],
            'to_postcode'       => $row['to_postcode'],
            'from_weight'       => str_replace(",", ".", str_replace(".", "", $row['from_weight'])),
            'to_weight'         => str_replace(",", ".", str_replace(".", "", $row['to_weight'])),
            'cost'              => str_replace(",", ".", str_replace(".", "", $row['cost'])),
            'client_id'         => $this->data['customerId'],
            'freight'           => Str::uuid(),

        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
