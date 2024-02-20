<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    /** home dashboard */
    public function index()
    {
        return view('dashboard.home');
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** vendor dashboard */
    public function vendorDashboardIndex()
    {
        return view('dashboard.vendor_dashboard');
    }

    /** client dashboard */
    public function clientDashboardIndex()
    {
        return view('dashboard.client_dashboard');
    }
}
