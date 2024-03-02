<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\clients;

class clientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testFullNameAccessor()
    {
        // Create a new User instance
        $user = new clients();

        // Set the first name and last name attributes
        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->gender = 'Male';
        $user->date_of_birth = '1990-01-01';
        $user->email = 'john@doe.com';
        $user->phone_number = '0123456789';
        $user->zip_code = '12345';
        $user->city = 'Dubai';
        $user->region = 'Dubai';
        $user->upload = 'upload';
        $user->signature = 'signature';

        // Assert that the full name access

        // Assert that the full name accessor returns the expected value
        $this->assertEquals('John', $user->first_name, 'The first name should be "John".');
        $this->assertEquals('Doe', $user->last_name, 'The last_name should be "Doe".');
        $this->assertEquals('Male', $user->gender, 'The gender should be "Male".');
        $this->assertEquals('1990-01-01', $user->date_of_birth, 'The date of birth should be "1990-01-01".');
        $this->assertEquals('john@doe.com', $user->email, 'The email should be "john@doe.com".');
        $this->assertEquals('0123456789', $user->phone_number, 'The phone number should be "0123456789".');
        $this->assertEquals('12345', $user->zip_code, 'The zip_code should be "12345".');
        $this->assertEquals('Dubai', $user->city, 'The city should be "Dubai".');
        $this->assertEquals('Dubai', $user->region, 'The region should be "Dubai".');
        $this->assertEquals('upload', $user->upload, 'The upload should be "upload".');
        $this->assertEquals('signature', $user->signature, 'The signature should be "signature".');

    }
}
