<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\vendor;
use Brian2694\Toastr\Facades\Toastr;

class vendorController extends Controller
{
    /** add vendor page */
    public function vendorAdd()
    {
        $users = User::where('role_name', 'vendors')->get();
        $payment_term = DB::table('paymentterm')->get();
        $payment_method = DB::table('paymentmethod')->get();
        return view('vendor.add-vendor', compact('users', 'payment_term', 'payment_method'));
    }
    public function payment_method()
    {
        
        return view('vendor.add-vendor', compact('payment_method'));
    }
    public function payment_term()
    {
        
        return view('vendor.add-vendor', compact('payment_term'));
    }

    /** vendor list */
    public function vendorList()
    {
        $listvendor = vendor::join('users', 'vendors.user_id', 'users.user_id')
            ->select('users.date_of_birth', 'users.join_date', 'users.phone_number', 'vendors.*')->get();
        return view('vendor.list-vendor', compact('listvendor'));
    }

    /** vendor Grid */
    public function vendorGrid()
    {
        $vendorGrid = vendor::all();

        return view('vendor.vendor-grid', compact('vendorGrid'));
    }

    /** save record */
    public function saveRecord(Request $request)
    {

        $request->validate([
            'full_name'     => 'required|string',
            'company_name'  => 'required|string',
            'gender'        => 'required|string',
            'contact_no'    => 'required|string',
            'address'       => 'required|string',
            'city'          => 'required|string',
            'state'         => 'required|string',
            'zip_code'      => 'required|string',
            'country'       => 'required|string',
            'contract_start' => 'required|string',
            'contract_due' => 'required|string',
            'payment_method' => 'required|string',
            'payment_term' => 'required|string',

            
        ]);

        try {

            $saveRecord = new vendor;
            $saveRecord->full_name     = $request->full_name;
            $saveRecord->company_name     = $request->company_name;
            $saveRecord->user_id       = $request->user_id;
            $saveRecord->gender        = $request->gender;
            $saveRecord->contact_no    = $request->contact_no;
            $saveRecord->contract_start = $request->contract_start;
            $saveRecord->contract_due = $request->contract_due;
            $saveRecord->payment_method = $request->payment_method;
            $saveRecord->payment_term = $request->payment_term;
            $saveRecord->address       = $request->address;
            $saveRecord->city          = $request->city;
            $saveRecord->state         = $request->state;
            $saveRecord->zip_code      = $request->zip_code;
            $saveRecord->country       = $request->country;
            $saveRecord->save();

            Toastr::success('Has been add successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('fail, Add new record  :)', 'Error');
            return redirect()->back();
        }
    }

    /** edit record */
    public function editRecord($user_id)
    {
        $vendor = vendor::join('users', 'vendors.user_id', 'users.user_id')
            ->select('users.date_of_birth', 'users.join_date', 'users.phone_number', 'vendors.*')
            ->where('users.user_id', $user_id)->first();
        return view('vendor.edit-vendor', compact('vendor'));
    }

    /** update record vendor */
    public function updateRecordvendor(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
               
                'full_name'     => $request->full_name,
                'company_name'   => $request->company_name,
                'gender'        => $request->gender,
                'contact_no'    => $request->contact_no,
                'address'       => $request->address,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip_code'      => $request->zip_code,
                'country'       => $request->country,
                'contract_start' => $request->contract_start,
                'contract_due' => $request->contract_due,
                'payment_method' => $request->payment_method,
                'payment_term' => $request->payment_term,

                
            ];
            vendor::where('user_id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update record  :)', 'Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function vendorDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            vendor::destroy($request->id);
            DB::commit();
            Toastr::success('Deleted record successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Deleted record fail :)', 'Error');
            return redirect()->back();
        }
    }
}
