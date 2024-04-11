<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\vendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\vendors;
use Illuminate\Http\UploadedFile;

class VendorControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSaveRecord()
    {
        // Mock a request object
        $request = new Request([
            'full_name' => 'John Doe',
            'company_name' => 'ACME Inc.',
            'gender' => 'male',
            'contact_no' => '9876.',
            'address' => '76 jhv',
            'city' => 'vajaj',
            'zip_code' => '98',
            'region' => 'NCR',
            'contract_start' => '01-09-2022',
            'contract_due' => '01-19-2022',
            'payment_method' => 'Cash',
            'payment_term' => '7 days',
        ]);
            $request->files->add([
                'signature' => UploadedFile::fake()->create('signature.pdf', 100), // Example file name and size
                'bir_2302' => UploadedFile::fake()->create('bir_2302.pdf', 100), // Example file name and size
                'business_perm' => UploadedFile::fake()->create('business_perm.pdf', 100), // Example file name and size
                'sec_dti_reg' => UploadedFile::fake()->create('sec_dti_reg.pdf', 100), // Example file name and size
                'accred_docu' => UploadedFile::fake()->create('business_perm.pdf', 100), // Example file name and size
                'other_docu' => UploadedFile::fake()->create('sec_dti_reg.pdf', 100), // Example file name and size
            ]);
            // Add other required fields here
        

        // Create an instance of the controller
        $controller = new vendorController();

        // Call the method and assert the response
        $response = $controller->saveRecord($request);
        
        // Assert that the response is a redirect
        $this->assertIsObject($response);
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        // You can further test the behavior of the method based on different scenarios
    }
}
