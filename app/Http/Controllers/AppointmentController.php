<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use App\Patient;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;
use Toastr;
use function PHPUnit\Framework\isNull;

class AppointmentController extends Controller
{
    public function success(Request $request)
    {
        Toastr::success($request->status.' Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function index()
    {
        $appointment = Appointment::all();
        $doctor = Doctor::all();
        $patients = Patient::where('pat_statue','Accepted')
            ->join('districts','pat_dist','=','dist_id')
            ->select('patients.*', 'districts.dist_name as district')
            ->get();
        return view('admin.appointment.appointment_list', ['appointments'=>$appointment,'doctors' => $doctor,'patients'=>$patients]);
    }

    public function patient($id)
    {
        $data['pat'] = Patient::find($id);
        $data['district']=DB::table('districts')
            ->where('dist_id','=',$data['pat']->pat_dist)
            ->select('dist_name')
            ->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $appointment = new Appointment;
        if(isNull($request->app_patStatue)){
            $patStatue = "NA";
        }
        if(isNull($request->app_recomand)){
            $recommand = "NA";
        }
        $data = [
            "pat_id" => $request->app_pat_id,
            "app_datetime"   => $request->app_datetime,
            "patStatue"   => $patStatue,
            "recommand"   => $recommand,
            "statue"   => $request->app_statue,
        ];
        $validation = Validator::make($data, $appointment->validation());
        if($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors"   => $validation->errors(),
            ];
        } else {
            $onehour_date = Carbon::parse($request->app_datetime)->addHour();
            $appointmentExists = Appointment::where('app_datetime', '>=', $request->app_datetime)->where('app_datetime', '<', $onehour_date)->whereNull('deleted_at')->exists();
            if($appointmentExists){
                $status = 400;
                $response = [
                    "status" => $status,
                    "errors"   => 'Have appointment at same datetime.',
                ];
            }else{
                $appointment->fill($data)->save();
                $status = 201;
                $response = [
                    "status" => $status,
                    "data"   => $appointment,
                ];
            }
        }
        return response()->json($response, $status);
    }

    public function show(Request $request)
    {
        $id=$request->id;
        $data['appointment']=$appointment=Appointment::find($id);
        $data['patient']=$patient=Patient::find($appointment['pat_id']);
        $data['district']=DB::table('districts')
            ->where('dist_id','=',$patient['pat_dist'])
            ->select('dist_name')
            ->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $status=['statue'=>$request->status];
        Appointment::where('id',$id)->update($status);
        $status = 200;
        $response = [
            "status" => $status,
        ];
        return response()->json($response);
    }

    public function updateDatetime(Request $request){
        $id=$request->id;
        $datetime=['app_datetime'=>$request->app_datetime];
        $onehour_date = Carbon::parse($request->app_datetime)->addHour();
        $appointmentExists = Appointment::where('app_datetime', '>=', $request->app_datetime)->where('app_datetime', '<', $onehour_date)->whereNull('deleted_at')->exists();
        if($appointmentExists){
            $status = 400;
            $response = [
                "status" => $status,
                "errors"   => 'Have appointment at same datetime.',
            ];
        }else{
            Appointment::where('id',$id)->update($datetime);
            $status = 200;
            $response = [
                "status" => $status,
                "data"   => $datetime,
            ];
        }
        return response()->json($response, $status);
    }

    public function destroy($id)
    {
        Appointment::where('id', $id)->delete();
        $status = 200;
        $response = [
            "status" => $status,
        ];
        return response()->json($response);
    }
}
