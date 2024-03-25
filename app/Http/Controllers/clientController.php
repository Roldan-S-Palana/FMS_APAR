<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\clients;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;


class clientController extends Controller
{
    /** index page client list */
    public function client()
    {
        $clientList = clients::all();
        return view('client.client', compact('clientList'));
    }

    /** index page client grid */
    public function clientGrid()
    {
        $clientList = clients::all();
        return view('client.client-grid', compact('clientList'));
    }

    /** client add page */
    public function clientAdd()
    {
        return view('client.add-client');
    }

    /** client save record */
    /* public function clientSave(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'=> 'required|string',
            'gender'  => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|email',
            'phone_number'  => 'required',
            'zip_code' => 'required',
            'city'   => 'required|string',
            'region'  => 'required|string',
            'upload' => 'required|file',
            'signature'=> 'required|file',
        ]);

        try {

            DB::beginTransaction();

            $clientSave = new clients;
            $clientSave->first_name   = $request->first_name;
            $clientSave->last_name    = $request->last_name;
            $clientSave->gender       = $request->gender;
            $clientSave->date_of_birth = $request->date_of_birth;
            $clientSave->email        = $request->email;
            $clientSave->phone_number = $request->phone_number;
            $clientSave->zip_code         = $request->zip_code;
            $clientSave->city  = $request->city;
            $clientSave->region     = $request->region;
            //$clientSave->upload =  $request->upload;
            if ($request->hasFile('upload')) {
                $upload = $request->file('upload');
                $uploadPath = 'uploads'; // Define your upload directory
                $filename = time() . '.' . $upload->getClientOriginalExtension();
                $upload->move($uploadPath, $filename);
                $clientSave->upload = $filename;
            }
            if ($request->hasFile('signature')) {
                $upload = $request->file('signature');
                $uploadPath = 'signature'; // Define your upload directory
                $filename = time() . '.' . $upload->getClientOriginalExtension();
                $upload->move($uploadPath, $filename);
                $clientSave->upload = $filename;
            }
           // $clientSave->signature = $request->signature;
            $clientSave->save();
            DB::commit();

            Toastr::success('Has been add successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Add new client  :)', 'Error');
            return redirect()->back();
        }
    }*/
    public function clientSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender'  => 'required',
            'date_of_birth' => 'required|date',
            'email' => 'required|string',
            'phone_number'  => 'required',
            'zip_code' => 'required',
            'city'   => 'required|string',
            'region'  => 'required|string',
            'upload' => 'required|file',
            'signature' => 'required|file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {


            $clientSave = new clients;
            $clientSave->first_name   = $request->first_name;
            $clientSave->last_name    = $request->last_name;
            $clientSave->gender       = $request->gender;
            $clientSave->date_of_birth = $request->date_of_birth;
            $clientSave->email        = $request->email;
            $clientSave->phone_number = $request->phone_number;
            $clientSave->zip_code         = $request->zip_code;
            $clientSave->city  = $request->city;
            $clientSave->region     = $request->region;
            $clientSave->fill($request->except(['upload', 'signature']));

            if ($request->hasFile('upload')) {
                $upload = $request->file('upload');
                $uploadPath = 'uploads';
                $filename = time() . '.' . $upload->getClientOriginalExtension();
                $upload->move($uploadPath, $filename);
                $clientSave->upload = $filename;
            }

            if ($request->hasFile('signature')) {
                $signature = $request->file('signature');
                $signaturePath = 'signature';
                $filename = time() . '.' . $signature->getClientOriginalExtension();
                $signature->move($signaturePath, $filename);
                $clientSave->signature = $filename;
            }

            $clientSave->save();

            Toastr::success('Client has been added successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
           // return redirect()->back();
        }
    }


    /** view for edit client */
    public function clientEdit($id)
    {
        $clientEdit = clients::where('id', $id)->first();
        return view('client.edit-client', compact('clientEdit'));
    }

    /** update record */
    public function clientUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            if (!empty($request->upload)) {
                unlink(storage_path('app/public/client-photos/' . $request->image_hidden));
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/client-photos/'), $upload_file);

                $upload_sign = rand() . '.' . $request->signature->extension();
                $request->signature->move(storage_path('app/public/client-photos/'), $upload_sign);
            } else {
                $upload_file = $request->image_hidden;
            }

            $updateRecord = [
                'upload' => $upload_file,
                'signature' => $upload_sign,
            ];
            clients::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update client  :)', 'Error');
            return redirect()->back();
        }
    }

    /** client delete */
    public function clientDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            if (!empty($request->id)) {
                clients::destroy($request->id);
                unlink(storage_path('app/public/client-photos/' . $request->avatar));
                DB::commit();
                Toastr::success('client deleted successfully :)', 'Success');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('client deleted fail :)', 'Error');
            return redirect()->back();
        }
    }

    /** client profile page */
    public function clientProfile($id)
    {
        $clientProfile = clients::where('id', $id)->first();
        return view('client.client-profile', compact('clientProfile'));
    }
}
