<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreightImportRequest;
use App\Patterns\FactoryMethod\Uploader\UploadFile;

class ImportFreightController extends Controller
{
    /**
     * @param FreightImportRequest $request
     * @return object
     */
    public function store(FreightImportRequest $request)
    {
        new UploadFile($request);
        return response()->json(['message' => 'Arquivos enviados com sucesso!'], 200);
    }
}
