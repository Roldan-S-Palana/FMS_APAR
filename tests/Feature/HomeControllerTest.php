<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class HomeControllerTest extends TestCase
{
    public function testIndexReturnsHomeDashboardViewForAdmin()
    {
        // Mock the Auth facade to authenticate an admin user
        Auth::shouldReceive('check')->once()->andReturn(true);
        Auth::shouldReceive('user->role')->once()->andReturn('Admin');

        // Mock the View facade to ensure the home dashboard view is returned
        View::shouldReceive('make')->with('dashboard.home')->once()->andReturn('home_dashboard_view');

        // Instantiate the HomeController
        $controller = new HomeController();

        // Call the index method and assert the home dashboard view is returned
        $response = $controller->index();
        $this->assertEquals('home_dashboard_view', $response);
    }

    // Add similar tests for userProfile, vendorDashboardIndex, clientDashboardIndex,
    // arDashboardIndex, and apDashboardIndex methods to ensure they return their respective views.
    public function testUserProfileReturnsProfileView()
    {
        // Mock the View facade to ensure the profile view is returned
        View::shouldReceive('make')->with('dashboard.profile')->once()->andReturn('profile_view');

        // Instantiate the HomeController
        $controller = new HomeController();

        // Call the userProfile method and assert the profile view is returned
        $response = $controller->userProfile();
        $this->assertEquals('profile_view', $response);
    }

    // Repeat the above pattern for other methods such as vendorDashboardIndex, clientDashboardIndex, arDashboardIndex, and apDashboardIndex.
}
