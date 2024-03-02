<?php

namespace Tests\Unit;

use App\Http\Controllers\AccountsController;
use App\Models\Fees;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AccountsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test feeCollectionView method.
     *
     * @return void
     */
    public function testFeeCollectionView()
    {
        // Mocking the Fees model
        $feesList = [
            new Fees(['id' => 1, 'name' => 'Fee 1']),
            new Fees(['id' => 2, 'name' => 'Fee 2']),
        ];

        // Creating a new instance of the AccountsController
        $controller = new AccountsController();

        // Calling the feeCollectionView method
        $response = $controller->feeCollectionView();

        // Asserting that the returned view is correct
        $this->assertEquals('accounts.feescollections', $response->getName());

        // Optionally, you can assert that specific data is passed to the view
        $this->assertArrayHasKey('feesList', $response->getData());
    }

    /**
     * Test feeSave method.
     *
     * @return void
     */
    public function testFeeSave()
    {
        // Mocking the request data
        $requestData = [
            'invoice_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'male',
            'fee_type' => 'Tuition Fee',
            'amount' => 1000,
            'paid_date' => '2022-03-01',
            'status' => 'paid',
        ];

        // Creating a new instance of the AccountsController
        $controller = new AccountsController();

        // Creating a new Request object with the mock data
        $request = new Request($requestData);

        // Mocking the Validator facade
        Validator::shouldReceive('make')->once()->andReturn(new \Illuminate\Validation\Validator());

        // Calling the feeSave method
        $response = $controller->feeSave($request);

        // Asserting that the response is a redirect back
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
    }
}
