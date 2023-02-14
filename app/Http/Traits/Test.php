<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Artisan;

trait Test
{
    public function artisanComands()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function headers()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ];
    }
}
