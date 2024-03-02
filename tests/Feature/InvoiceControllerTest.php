<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Http\Controllers\InvoiceController;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Mockery;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSaveRecord()
    {
        // Mock request data
        $requestData = [
            // Provide your request data here
        ];

        // Mock UploadedFile
        $file = UploadedFile::fake()->create('document.pdf');

        // Mock the Toastr facade
        $toastr = Mockery::mock('alias:Toastr');
        $toastr->shouldReceive('success')->once()->andReturnNull();


        // Mock database transactions
        DB::shouldReceive('beginTransaction')->once();
        DB::shouldReceive('commit')->once();

        // Mock file storage
        Storage::fake('local');
        Storage::shouldReceive('put')->once()->andReturn('upload_sign/document.pdf');

        // Mock the InvoiceController
        $controller = new InvoiceController();

        // Call the method and assert the response
        $response = $controller->saveRecord(new \Illuminate\Http\Request($requestData));

        // Assert the response
        $this->assertEquals(302, $response->getStatusCode()); // Assuming a redirect is returned
    }
}
