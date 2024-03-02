<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Validator};

class DepartmentControllerTest extends TestCase
{
    public function testSaveRecord()
    {
        // Create a mock request with required data
        $request = new Request([
            'department_name' => 'Test Department',
            'head_of_department' => 'Test Head',
            'department_start_date' => '2024-03-03',
            'no_of_employee' => '10',
        ]);

        // Instantiate the controller
        $controller = new DepartmentController();

        // Call the saveRecord method
        $response = $controller->saveRecord($request);

        // Assert that the response is a redirect back
        $this->assertEquals(302, $response->getStatusCode());
        
        // Assert that the department record has been saved to the database
        $this->assertDatabaseHas('departments', [
            'department_name' => 'Test Department',
            'head_of_department' => 'Test Head',
            'department_start_date' => '2024-03-03',
            'no_of_employee' => '10',
        ]);
    }
}
