<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Event\registrationEvent;
use App\Http\Controllers\Auth\RegisterController;
use App\Mail\registrationGreetings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use File;
use Toastr;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor['data'] = Doctor::orderBy('doc_id', 'desc')->get();
        return view('admin.doctor.doctor_list', $doctor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.add_doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \App\User
     */
    public function store(Request $request)
    {
        $request->validate([
            'doc_name'           => 'required',
            'doc_phone'          => 'required',
            'doc_address'        => 'required',
            'doc_email'          => 'required|email',
            'doc_password'       => 'required',
            'doc_profile'        => 'required'
        ]);
        $data = [
            'doc_name'           => $request->doc_name,
            'doc_phone'          => $request->doc_phone,
            'doc_address'        => $request->doc_address,
            'doc_email'          => $request->doc_email,
            'doc_password'       => Hash::make($request->doc_password),
            'doc_profile'        => $request->doc_profile
        ];
        Doctor::create($data);
        DB::table('users')->insert([
            'name' => $data['doc_name'],
            'email' => $data['doc_email'],
            'password' => $data['doc_password']
        ]);
//        event(new registrationEvent($data['doc_email']));

//        $mail = new registrationGreetings();
//        Mail::to($data['doc_email'])->send($mail);
        User::create([
            'name' => $data['doc_name'],
            'email' => $data['doc_email'],
            'password' => $data['doc_password'],
        ]);
        Toastr::success('Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor['doctor']  = Doctor::findOrFail($id);
        return view('admin.doctor.edit_doctor', $doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'doc_name'           => 'required',
            'doc_phone'          => 'required',
            'doc_address'        => 'required',
            'doc_profile'        => 'required'
        ]);

        $data = [
                'doc_name'           => $request->doc_name,
                'doc_phone'          => $request->doc_phone,
                'doc_address'        => $request->doc_address,
                'doc_profile'        => $request->doc_profile
        ];
        Doctor::where('doc_id', $id)->update($data);
        Toastr::success('Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Doctor::where('doc_id', $id)->delete();
        Toastr::success('Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
