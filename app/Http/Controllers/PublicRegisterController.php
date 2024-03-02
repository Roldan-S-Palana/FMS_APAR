<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor_users;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PublicRegisterController extends Controller
{
    public function publicregister()
    {
        $customerRole = DB::table('role_type_users')->where('role_type', 'Client End-User')->first();
        // $role = DB::table('fgms_g7_role_type_users')->get();

        return view('auth.public-register', compact('customerRole'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            //'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        // Ensure that only 'customer' role is selected
        if ($request->role_name !== 'Client End-User') {
            return back()->withInput()->withErrors(['role_name' => 'Invalid role selected.']);
        }

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'join_date' => $todayDate,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);
        Toastr::success('Create new account successfully :)', 'Success');
        return redirect()->route('login');
    }
}
