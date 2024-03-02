<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Http\Controllers\UserManagementController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserManagementControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserUpdate()
    {
        // Create a user to update
        $user = User::factory()->create();

        // Mock a request object with necessary data
        $request = new \Illuminate\Http\Request([
            'user_id' => $user->user_id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'role_name' => 'Admin',
            'position' => 'Updated Position',
            'phone_number' => '1234567890',
            'date_of_birth' => '1990-01-01',
            'department' => 'Updated Department',
            'status' => 'Active',
            'hidden_avatar' => 'photo_defaults.png', // Mock avatar filename
        ]);

        // Mock session data
        // Mock session data
        Session::shouldReceive('flash')
            ->with('toastr::messages', ['User updated successfully :)'])
            ->once();



        // Instantiate the controller
        $controller = new UserManagementController();

        // Call the method and assert the response
        $response = $controller->userUpdate($request);

        // Assert that the user details have been updated
        $this->assertDatabaseHas('users', [
            'user_id' => $user->user_id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'position' => 'Updated Position',
            'phone_number' => '1234567890',
            'date_of_birth' => '1990-01-01',
            'department' => 'Updated Department',
            'status' => 'Active',
        ]);

        // Assert the success message
        $this->assertEquals('User updated successfully :)', $response->getSession());

        // Ensure proper cleanup
        $user->delete();
    }
}
