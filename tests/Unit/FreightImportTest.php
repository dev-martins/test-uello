<?php

namespace Tests\Unit;

use App\Imports\FreightImport;
use PHPUnit\Framework\TestCase;

class FreightImportTest extends TestCase
{
    public function testCsvSettings()
    {
        $freight = new FreightImport(1);
        $csvSettings = $freight->getCsvSettings();

        $this->assertNotEmpty($csvSettings);
        $this->assertEquals(';', $csvSettings['delimiter']);
    }

    public function testBatchSize()
    {
        $freight = new FreightImport(1);
        $batchSize = $freight->batchSize();

        $this->assertNotEmpty($batchSize);
        $this->assertEquals(100, $batchSize);
    }

    public function testChunkSize()
    {
        $freight = new FreightImport(1);
        $chunkSize = $freight->chunkSize();

        $this->assertNotEmpty($chunkSize);
        $this->assertEquals(100, $chunkSize);
    }
}
