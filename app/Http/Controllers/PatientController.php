<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Toastr;
use Validator;

class PatientController extends Controller
{

    public function success(Request $request)
    {
        Toastr::success($request->status.' Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = Patient::orderBy('pat_id', 'desc')
            ->join('districts','pat_dist','=','dist_id')
            ->select('patients.*', 'districts.dist_name as district')
            ->get();
        $district = DB::table('districts')->get();
        return view('admin.patient.patients.patient_list')->with(compact(
            'patient',
            'district'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient = new Patient;
        $validation = Validator::make($request->all(), $patient->validation());
        if($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors"   => $validation->errors(),
            ];
        } else {
            $patient->fill($request->all())->save();
            $status = 201;
            $response = [
                "status" => $status,
                "data"   => $patient,
            ];
        }
        return response()->json($response, $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id=$request->id;
        $data['patient']=$patient=Patient::find($id);
        $data['district']=DB::table('districts')
        ->where('dist_id','=',$patient['pat_dist'])
        ->select('dist_name')
        ->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $patient = new Patient;
        $validation = Validator::make($request->all(), $patient->validation());
        if($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors"   => $validation->errors(),
            ];
        } else {
            $pat_id = $request->pat_id;
            $patient = Patient::find($pat_id);
            $patient->pat_name = $request->pat_name;
            $patient->pat_grName = $request->pat_grName;
            $patient->pat_grPhone = $request->pat_grPhone;
            $patient->gender = $request->gender;
            $patient->pat_age = $request->pat_age;
            $patient->birth_year = $request->birth_year;
            $patient->pat_symptoms = $request->pat_symptoms;
            $patient->pat_note = $request->pat_note;
            $patient->pat_dist = $request->pat_dist;
            $patient->pat_nid = $request->pat_nid;
            $patient->longitude = $request->pat_longitude;
            $patient->latitude = $request->pat_latitude;
            $patient->pat_statue = $request->pat_statue;
            $patient->save();
            $status = 201;
            $response = [
                "status" => $status,
                "data"   => $patient,
            ];
        }
        return response()->json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Patient::where('pat_id', $id)->delete();
        $status = 200;
        $response = [
            "status" => $status,
        ];
        return response()->json($response);
    }
}
