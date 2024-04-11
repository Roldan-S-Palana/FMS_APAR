<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterVendorController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\APModuleAccountsController;
use App\Http\Controllers\APModuleapprovalinvoiceController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Setting;
use App\Http\Controllers\ARModuleInvoiceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PublicRegisterController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** for side bar menu active */
/*function set_active($route)
{
    $request = Request::instance();
    if (is_array($route)) {
        return in_array($request::path(), $route) ? 'active' : '';
    }
    return $request::path() == $route ? 'active' : '';
}*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
    Route::get('home', function () {
        return view('home');
    });
});

Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    // ----------------------------login ------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('change/password', 'changePassword')->name('change/password');
    });
        // ----------------------------- multi-register -------------------------//

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'storeUser')->name('register');
    });
});


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // ----------------------------- public-register -------------------------//
    Route::controller(PublicRegisterController::class)->group(function () {
        Route::get('/public-register', 'publicregister')->name('public-register');
        Route::post('/public-register', 'storeUser')->middleware('auth')->name('public-register');
    });

  
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->middleware('auth')->name('home');
        Route::get('ar/dashboard', 'arDashboardIndex')->middleware('auth')->name('ar/dashboard');
        Route::get('ap/dashboard', 'apDashboardIndex')->middleware('auth')->name('ap/dashboard');

        Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
        Route::get('vendor/dashboard', 'vendorDashboardIndex')->middleware('auth')->name('vendor/dashboard');
        Route::get('client/dashboard', 'clientDashboardIndex')->middleware('auth')->name('client/dashboard');
    });

    // ----------------------------- user controller ---------------------//
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('list/users', 'index')->middleware('auth')->name('list/users');
        Route::post('change/password', 'changePassword')->name('change/password');
        Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
        Route::post('user/update', 'userUpdate')->name('user/update');
        Route::post('user/delete', 'userDelete')->name('user/delete');
        Route::get('get-users-data', 'getUsersData')->name('get-users-data');
        /** get all data users */
    });

    // ------------------------ setting -------------------------------//
    Route::controller(Setting::class)->group(function () {
        Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
    });

    // ------------------------ client -------------------------------//
    Route::controller(clientController::class)->group(function () {
        Route::get('client/list', 'client')->middleware('auth')->name('client/list'); // list client
        Route::get('client/grid', 'clientGrid')->middleware('auth')->name('client/grid'); // grid client
        Route::get('client/add/page', 'clientAdd')->middleware('auth')->name('client/add/page'); // page client
        Route::post('client/add/save', 'clientSave')->name('client/add/save'); // save record client
        Route::get('client/edit/{id}', 'clientEdit'); // view for edit
        Route::post('client/update', 'clientUpdate')->name('client/update'); // update record client
        Route::post('client/delete', 'clientDelete')->name('client/delete'); // delete record client
        Route::get('client/profile/{id}', 'clientProfile')->middleware('auth'); // profile client
    });

    // ------------------------ vendor -------------------------------//
    Route::controller(vendorController::class)->group(function () {
        Route::get('vendor/add/page', 'vendorAdd')->middleware('auth')->name('vendor/add/page'); // page vendor
        Route::get('vendor/list/page', 'vendorList')->middleware('auth')->name('vendor/list/page'); // page vendor
        Route::get('vendor/grid/page', 'vendorGrid')->middleware('auth')->name('vendor/grid/page'); // page grid vendor
        Route::post('vendor/save', 'saveRecord')->middleware('auth')->name('vendor/save'); // save record
        Route::get('vendor/edit/{id}', 'editRecord'); // view vendor record
        Route::post('vendor/update', 'updateRecordvendor')->middleware('auth')->name('vendor/update'); // update record
        Route::post('vendor/delete', 'vendorDelete')->name('vendor/delete'); // delete record vendor
    });

    // ----------------------- department -----------------------------//
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('department/list/page', 'departmentList')->middleware('auth')->name('department/list/page'); // department/list/page
        Route::get('department/add/page', 'indexDepartment')->middleware('auth')->name('department/add/page'); // page add department
        Route::get('department/edit/{department_id}', 'editDepartment'); // page add department
        Route::post('department/save', 'saveRecord')->middleware('auth')->name('department/save'); // department/save
        Route::post('department/update', 'updateRecord')->middleware('auth')->name('department/update'); // department/update
        Route::post('department/delete', 'deleteRecord')->middleware('auth')->name('department/delete'); // department/delete
        Route::get('get-data-list', 'getDataList')->name('get-data-list'); // get data list

    });

    // ----------------------- subject -----------------------------//
    //Route::controller(SubjectController::class)->group(function () {
    //     Route::get('subject/list/page', 'subjectList')->middleware('auth')->name('subject/list/page'); // subject/list/page
    //   Route::get('subject/add/page', 'subjectAdd')->middleware('auth')->name('subject/add/page'); // subject/add/page
    // Route::post('subject/save', 'saveRecord')->name('subject/save'); // subject/save
    // Route::post('subject/update', 'updateRecord')->name('subject/update'); // subject/update
    // Route::post('subject/delete', 'deleteRecord')->name('subject/delete'); // subject/delete
    // Route::get('subject/edit/{subject_id}', 'subjectEdit'); // subject/edit/page
    // });

    // ----------------------- invoice -----------------------------//
    Route::controller(ARModuleInvoiceController::class)->group(function () {
        Route::get('armoduleinvoice/list/page', 'invoiceList')->middleware('auth')->name('armoduleinvoice/list/page'); // subjeinvoicect/list/page
        Route::get('armoduleinvoice/paid/page', 'invoicePaid')->middleware('auth')->name('armoduleinvoice/paid/page'); // armoduleinvoice/paid/page
        Route::get('armoduleinvoice/overdue/page', 'invoiceOverdue')->middleware('auth')->name('armoduleinvoice/overdue/page'); // armoduleinvoice/overdue/page
        Route::get('armoduleinvoice/draft/page', 'invoiceDraft')->middleware('auth')->name('armoduleinvoice/draft/page'); // armoduleinvoice/draft/page
        Route::get('armoduleinvoice/recurring/page', 'invoiceRecurring')->middleware('auth')->name('armoduleinvoice/recurring/page'); // armoduleinvoice/recurring/page
        Route::get('armoduleinvoice/cancelled/page', 'invoiceCancelled')->middleware('auth')->name('armoduleinvoice/cancelled/page'); // armoduleinvoice/cancelled/page
        Route::get('armoduleinvoice/grid/page', 'invoiceGrid')->middleware('auth')->name('armoduleinvoice/grid/page'); // armoduleinvoice/grid/page
        Route::get('armoduleinvoice/add/page', 'invoiceAdd')->middleware('auth')->name('armoduleinvoice/add/page'); // armoduleinvoice/add/page
        Route::post('armoduleinvoice/add/save', 'saveRecord')->name('armoduleinvoice/add/save'); // armoduleinvoice/add/save
        Route::get('armoduleinvoice/edit/page', 'invoiceEdit')->middleware('auth')->name('armoduleinvoice/edit/page'); // armoduleinvoice/edit/page
        Route::get('armoduleinvoice/view/page', 'invoiceView')->middleware('auth')->name('armoduleinvoice/view/page'); // armoduleinvoice/view/page
        Route::get('armoduleinvoice/settings/page', 'invoiceSettings')->middleware('auth')->name('armoduleinvoice/settings/page'); // armoduleinvoice/settings/page
        Route::get('armoduleinvoice/settings/tax/page', 'invoiceSettingsTax')->middleware('auth')->name('armoduleinvoice/settings/tax/page'); // armoduleinvoice/settings/tax/page
        Route::get('armoduleinvoice/settings/bank/page', 'invoiceSettingsBank')->middleware('auth')->name('armoduleinvoice/settings/bank/page'); // armoduleinvoice/settings/bank/page
    });

    // ----------------------- accounts ----------------------------//
    Route::controller(APModuleAccountsController::class)->group(function () {
        Route::get('apmoduleaccounts/fees/collections/page', 'feeCollectionView')->middleware('auth')->name('apmoduleaccounts/fees/collections/page'); // apmoduleaccounts/fees/collections/page
        Route::get('apmoduleaccounts/fees/add/page', 'showInvoices')->middleware('auth')->name('apmoduleaccounts/fees/add/page'); // apmoduleaccounts/fees/collections/page
        Route::post('apmoduleaccounts/fees/add/save', 'feeSave')->name('apmoduleaccounts/fees/add/save'); // apmoduleaccounts/fees/collections/page
        Route::get('apmoduleaccounts/fees/overdue', 'ApInvoiceOverdue')->middleware('auth')->name('apmoduleaccounts/fees/overdue'); // apmoduleaccounts/fees/overdue/page

    });
    // ----------------------- approval invoice ----------------------------//
    Route::controller(APModuleapprovalinvoiceController::class)->group(function () {
        Route::get('apmoduleaccounts/workflow/approval/page', 'approvalView')->middleware('auth')->name('apmoduleaccounts/workflow/approval/page'); // apmoduleaccounts/fees/collections/page
        Route::post('apmoduleaccounts/workflow/approval/save', 'approvalSave')->middleware('auth')->name('apmoduleaccounts/workflow/approval/save'); // apmoduleaccounts/fees/collections/page
        Route::get('apmoduleaccounts/approval/grid/page', 'approvalGrid')->middleware('auth')->name('apmoduleaccounts/approval/grid/page'); // armoduleinvoice/grid/page
        Route::get('apmoduleaccounts/approval/list/page', 'approvalList')->middleware('auth')->name('apmoduleaccounts/approval/list/page'); // subjeinvoicect/list/page

    });
});
