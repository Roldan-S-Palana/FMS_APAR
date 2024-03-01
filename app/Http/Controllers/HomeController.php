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
        $this->middleware('CheckRole:Admin');
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
        $this->middleware('CheckRole:Vendor');
        return view('dashboard.vendor_dashboard');
    }

    /** client dashboard */
    public function clientDashboardIndex()
    {
        $this->middleware('CheckRole:Client');
        return view('dashboard.client_dashboard');
    }

    public function arDashboardIndex()
    {
        $this->middleware('CheckRole:Staff');
        return view('dashboard.ar');
    }
    public function apDashboardIndex()
    {
        $this->middleware('CheckRole:Staff');
        return view('dashboard.ap');
    }
}
