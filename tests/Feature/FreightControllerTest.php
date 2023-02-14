<?php

namespace Tests\Feature;

use App\Http\Traits\Test;
use App\Jobs\FreightImportJob;
use App\Models\Freight;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FreightControllerTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {
        // $this->artisanComands();
        $client_id = 'b2707dcd-f266-3192-9207-01c594adf91f';
        $response = $this->post(
            '/api/freight/import',
            [$client_id => new UploadedFile(base_path('storage/app/public/csv-test/test.csv'),'test.csv')],
            [
                'Content-Type'  => 'multipart/form-data',
                'Accept'        => 'application/json',
                'Content-Type'  => 'text/csv'
            ]
        );

        $response->assertStatus(200);
    }
}
