<?php

namespace App\Patterns\FactoryMethod\Uploader;

use App\Jobs\FreightImportJob;
use App\Models\Freight;
use App\Patterns\FactoryMethod\Contracts\UploadSpreadSheetInterface;

class UploadFile implements UploadSpreadSheetInterface
{
    protected object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
        $this->uploadWorksheet();
    }

    public function uploadWorksheet(): bool
    {
        $files = $this->data->allFiles();
        if (count($files) > 0) {
            foreach ($files as $customerId => $file) {
                $file->storeAs('public/csv', $customerId . '_' . $file->getClientOriginalName());
                FreightImportJob::dispatch(['customerId' => $customerId, 'file' => $customerId . '_' . $file->getClientOriginalName()])
                    ->onQueue('freight-import');
                Freight::where('client_id', $customerId)->delete();
            }
            return true;
        }
        return false;
    }
}
