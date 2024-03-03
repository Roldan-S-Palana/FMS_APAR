<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentTerm;
use App\Models\PaymentMethod;
use Hash;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\vendors;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;


class vendorController extends Controller
{
    /** add vendor page */
    public function vendorAdd()
    {
        $users = User::where('role_name', 'vendor')->get();
        //$payment_term = DB::table('fgms_g7_paymentterm')->get();

        $payment_method = PaymentMethod::all();
        //$payment_method = DB::table('fgms_g7_paymentmethod')->get()
        $payment_term = PaymentTerm::all();
        return view('vendor.add-vendor', compact('users', 'payment_term', 'payment_method'));
    }
   

    /** vendor list */
    public function vendorList()
    {
//$listvendor = vendors::join('fgms_g7_users', 'fgms_g7_vendors.id', 'fgms_g7_users.user_id')
           // ->select('fgms_g7_users.date_of_birth', 'fgms_g7_users.join_date', 'fgms_g7_users.phone_number', 'fgms_g7_vendors.*')->get();
       // $listvendor = vendors::join('fgms_g7_users', 'fgms_g7_vendors.id', 'fgms_g7_users.user_id')
         //   ->select('fgms_g7_users.date_of_birth', 'fgms_g7_users.join_date', 'fgms_g7_users.phone_number', 'fgms_g7_vendors.*')->get();
         $listvendor = vendors::join('users', 'vendors.id', 'users.user_id')
           ->select('users.date_of_birth', 'users.join_date', 'users.phone_number', 'vendors.*')->get();
        $listvendor = vendors::join('users', 'vendors.id', 'users.user_id')
            ->select('users.date_of_birth', 'users.join_date', 'users.phone_number', 'vendors.*')->get();
        return view('vendor.list-vendor', compact('listvendor'));
    }

    /** vendor Grid */
    public function vendorGrid()
    {
        $vendorGrid = vendors::all();

        return view('vendor.vendor-grid', compact('vendorGrid'));
    }

    /** save record */
    public function saveRecord(Request $request)
    {

        $request->validate([
            'full_name'     => 'required|string',
            'company_name'  => 'required|string',
            'gender'        => 'required|not_in:0',
            'contact_no'    => 'required',
            'address'       => 'required|string',
            'city'          => 'required|string',
            'zip_code'      => 'required',
            'region'       => 'required|string',
            'contract_start' => 'required',
            'contract_due' => 'required',
            'payment_method' => 'required|string',
            'payment_term' => 'required|string',
            'signature' => 'required|file|mimes:jpeg,png,jpg,gif',
            'bir_2302' => 'required|file|mimes:jpeg,png,jpg,gif',
            'sec_dti_reg' => 'required|file|mimes:jpeg,png,jpg,gif',
            'business_perm' => 'required|file|mimes:jpeg,png,jpg,gif',
            'accred_docu' => 'required|file|mimes:jpeg,png,jpg,gif',
            'other_docu' => 'required|file|mimes:jpeg,png,jpg,gif',


        ]);

        
        try {

            $saveRecord = new vendors;
            $saveRecord->full_name     = $request->full_name;
            $saveRecord->company_name     = $request->company_name;
            $saveRecord->gender        = $request->gender;
            $saveRecord->contact_no    = $request->contact_no;
            $saveRecord->address        = $request->address;
            $saveRecord->city          = $request->city;
            $saveRecord->zip_code      = $request->zip_code;
            $saveRecord->region       = $request->region;
            $saveRecord->contract_start = $request->contract_start;
            $saveRecord->contract_due = $request->contract_due;
            $saveRecord->payment_method = $request->payment_method;
            $saveRecord->payment_term = $request->payment_term;
            $saveRecord->fill($request->except([ 'signature', 'bir_2302', 'sec_dti_reg','business_perm', 'accred_docu', 'other_docu']));
            

            if ($request->hasFile('signature')) {
                $signature = $request->file('signature');
                $signaturePath = 'signature';
                $filename = time() . '.' . $signature->getClientOriginalExtension();
                $signature->move($signaturePath, $filename);
                $saveRecord->signature = $filename;
            }

            if ($request->hasFile('bir_2302')) {
                $bir_2302 = $request->file('bir_2302');
                $bir_2302Path = 'bir_2302';
                $filename = time() . '.' . $bir_2302->getClientOriginalExtension();
                $bir_2302->move($bir_2302Path, $filename);
                $saveRecord->bir_2302 = $filename;
            }

            if ($request->hasFile('sec_dti_reg')) {
                $sec_dti_reg = $request->file('sec_dti_reg');
                $sec_dti_regPath = 'sec_dti_reg';
                $filename = time() . '.' . $sec_dti_reg->getClientOriginalExtension();
                $sec_dti_reg->move($sec_dti_regPath, $filename);
                $saveRecord->sec_dti_reg = $filename;
            }

            if ($request->hasFile('business_perm')) {
                $business_perm = $request->file('business_perm');
                $business_permPath = 'business_perm';
                $filename = time() . '.' . $business_perm->getClientOriginalExtension();
                $business_perm->move($business_permPath, $filename);
                $saveRecord->business_perm = $filename;
            }

            if ($request->hasFile('accred_docu')) {
                $accred_docu = $request->file('accred_docu');
                $accred_docuPath = 'accred_docu';
                $filename = time() . '.' . $accred_docu->getClientOriginalExtension();
                $accred_docu->move($accred_docuPath, $filename);
                $saveRecord->accred_docu = $filename;
            }

            if ($request->hasFile('other_docu')) {
                $other_docu = $request->file('other_docu');
                $other_docuPath = 'other_docu';
                $filename = time() . '.' . $other_docu->getClientOriginalExtension();
                $other_docu->move($other_docuPath, $filename);
                $saveRecord->other_docu = $filename;
            }

            $saveRecord->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            $errorMessage = $e->getMessage();
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
            //Toastr::error('fail, Add new record  :)', 'Error');
            //return redirect()->back();
        }
    }

    /** edit record */
    public function editRecord($id)
    {
        $editRecord = vendors::where('id',$id)->first();
        $payment_term = DB::table('paymentterm')->get();
        $payment_method = DB::table('paymentmethod')->get();
   
        return view('vendor.edit-vendor', compact('editRecord', 'payment_term', 'payment_method'));
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
                'zip_code'      => $request->zip_code,
                'region'       => $request->region,
                'contract_start' => $request->contract_start,
                'contract_due' => $request->contract_due,
                'payment_method' => $request->payment_method,
                'payment_term' => $request->payment_term,
                'signature' => $request->signature,
                'bir_2302' => $request->bir_2302,
                'business_perm' => $request->business_perm,
                'sec_dti_reg'=> $request->sec_dti_reg,
                'accred_docu' => $request->accred_docu,
                'other_docu' => $request->other_docu,
            ];
            vendors::where('id', $request->id)->update($updateRecord);

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

            vendors::destroy($request->id);
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
