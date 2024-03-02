<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\Setting;

class SettingControllerTest extends TestCase
{
    public function test_index()
    {
        // Instantiate the Setting controller
        $controller = new Setting();

        // Call the index method
        $response = $controller->index();

        // Assert that the view is returned
        $this->assertEquals('setting.settings', $response->getName());
    }
}
