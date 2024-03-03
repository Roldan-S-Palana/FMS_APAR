<?php

namespace Tests\Feature;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test saveRecord method with valid data.
     *
     * @return void
     */
    public function testSaveRecordWithValidData()
    {
        // Create a department request data
        $requestData = [
            'department_name' => 'Test Department',
            'head_of_department' => 'John Doe',
            'department_start_date' => '2022-01-01',
            'no_of_employee' => 10,
        ];

        // Send a POST request to the saveRecord route with valid data
        $response = $this->post('/save-record', $requestData);

        // Assert that the request was successful
        $response->assertStatus(302); // Assuming successful redirect

        // Assert that the department record was saved to the database
        $this->assertDatabaseHas('departments', $requestData);

        // Optionally, you can assert that a success message is flashed
        $response->assertSessionHas('success');
    }

    /**
     * Test saveRecord method with invalid data.
     *
     * @return void
     */
    public function testSaveRecordWithInvalidData()
    {
        // Send a POST request to the saveRecord route with invalid data
        $response = $this->post('/save-record', []);

        // Assert that the request was redirected back
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['department_name', 'head_of_department', 
        'department_start_date', 'no_of_employee']);
    }

    // You can continue with similar tests for other scenarios...
}
