<?php

namespace App\Http\Controllers;

use DB;
use App\Models\client;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class clientController extends Controller
{
    /** index page client list */
    public function client()
    {
        $clientList = client::all();
        return view('client.client',compact('clientList'));
    }

    /** index page client grid */
    public function clientGrid()
    {
        $clientList = client::all();
        return view('client.client-grid',compact('clientList'));
    }

    /** client add page */
    public function clientAdd()
    {
        return view('client.add-client');
    }
    
    /** client save record */
    public function clientSave(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'gender'        => 'required|not_in:0',
            'date_of_birth' => 'required|string',
            'roll'          => 'required|string',
            'blood_group'   => 'required|string',
            'religion'      => 'required|string',
            'email'         => 'required|email',
            'class'         => 'required|string',
            'section'       => 'required|string',
            'admission_id'  => 'required|string',
            'phone_number'  => 'required',
            'upload'        => 'required|image',
        ]);
        
        DB::beginTransaction();
        try {
           
            $upload_file = rand() . '.' . $request->upload->extension();
            $request->upload->move(storage_path('app/public/client-photos/'), $upload_file);
            if(!empty($request->upload)) {
                $client = new client;
                $client->first_name   = $request->first_name;
                $client->last_name    = $request->last_name;
                $client->gender       = $request->gender;
                $client->date_of_birth= $request->date_of_birth;
                $client->roll         = $request->roll;
                $client->blood_group  = $request->blood_group;
                $client->religion     = $request->religion;
                $client->email        = $request->email;
                $client->class        = $request->class;
                $client->section      = $request->section;
                $client->admission_id = $request->admission_id;
                $client->phone_number = $request->phone_number;
                $client->upload = $upload_file;
                $client->save();

                Toastr::success('Has been add successfully :)','Success');
                DB::commit();
            }

            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Add new client  :)','Error');
            return redirect()->back();
        }
    }

    /** view for edit client */
    public function clientEdit($id)
    {
        $clientEdit = client::where('id',$id)->first();
        return view('client.edit-client',compact('clientEdit'));
    }

    /** update record */
    public function clientUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            if (!empty($request->upload)) {
                unlink(storage_path('app/public/client-photos/'.$request->image_hidden));
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/client-photos/'), $upload_file);
            } else {
                $upload_file = $request->image_hidden;
            }
           
            $updateRecord = [
                'upload' => $upload_file,
            ];
            client::where('id',$request->id)->update($updateRecord);
            
            Toastr::success('Has been update successfully :)','Success');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update client  :)','Error');
            return redirect()->back();
        }
    }

    /** client delete */
    public function clientDelete(Request $request)
    {
        DB::beginTransaction();
        try {
           
            if (!empty($request->id)) {
                client::destroy($request->id);
                unlink(storage_path('app/public/client-photos/'.$request->avatar));
                DB::commit();
                Toastr::success('client deleted successfully :)','Success');
                return redirect()->back();
            }
    
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('client deleted fail :)','Error');
            return redirect()->back();
        }
    }

    /** client profile page */
    public function clientProfile($id)
    {
        $clientProfile = client::where('id',$id)->first();
        return view('client.client-profile',compact('clientProfile'));
    }
}
