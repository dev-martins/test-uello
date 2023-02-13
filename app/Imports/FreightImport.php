<?php

namespace App\Imports;

use App\Models\Freight;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class FreightImport implements ToModel, WithHeadingRow, WithCustomCsvSettings, WithBatchInserts, WithChunkReading
{
    /**
     * @var string
     */
    protected $customerId;

    /**
     * @param string $data
     * @return void
     */
    public function __construct($data)
    {
        $this->customerId = $data;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model(array $row)
    {
        return new Freight([
            'from_postcode'     => $row['from_postcode'],
            'to_postcode'       => $row['to_postcode'],
            'from_weight'       => str_replace(",", ".", str_replace(".", "", $row['from_weight'])),
            'to_weight'         => str_replace(",", ".", str_replace(".", "", $row['to_weight'])),
            'cost'              => str_replace(",", ".", str_replace(".", "", $row['cost'])),
            'client_id'         => $this->customerId,
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
