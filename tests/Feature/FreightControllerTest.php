<?php

namespace Tests\Feature;

use App\Jobs\FreightImportJob;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FreightControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {
        $uuid = Factory::create()->uuid();

        $file = Storage::disk('public')->get('csv-test/test.csv');

        $response = $this->post('/api/freight/import', [$uuid => $file]);

        $response->assertStatus(200);
    }
}
