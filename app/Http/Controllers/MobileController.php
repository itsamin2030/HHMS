<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use DateTime;
use Illuminate\Http\Request;
use App\Verify\Service;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use DB;

class MobileController extends Controller
{
    public function __construct(Service $verify)
    {
        $this->verify = $verify;
    }

    public function verify(Request $request){
        $phone = $request->to;
        $patInfo = Patient::where('pat_grPhone','=',$phone)->exists();
        if($patInfo){
            $countryCode = '+966'; // Replace with known country code of user.
            $phone = preg_replace('/^0/', $countryCode, $phone);
            $channel = $request->post('channel', 'sms');
            $verification = $this->verify->startVerification($phone, $channel);
            $status = 200;
            $response = [
                "status" => $status,
                "data"   => $verification->isValid(),
            ];
            if(!$verification->isValid()){
                array_push($response,['errors'=>$verification->getErrors()]);
            }
        }else{
            $status = 400;
            $response = [
                "status" => $status,
                "errors"   => 'Not match with DB',
            ];
        }
        return response()->json($response,$status);
    }

    public function checkVerify(Request $request){
        $phone = $request->to;
        $code = $request->code;
        $countryCode = '+966'; // Replace with known country code of user.
        $phone = preg_replace('/^0/', $countryCode, $phone);
        $verification = $this->verify->checkVerification($phone, $code);
        $token = Hash::make($phone+$code);
        Patient::where('pat_grPhone',$request->to)->update(['token'=>$token]);
        if ($verification->isValid()) {
            $status = 200;
            $response = [
                "status" => $status,
                "data"   => $verification->isValid(),
                "token"   => $token,
            ];
        }else{
            $status = 400;
            $response = [
                "status" => $status,
                "errors"   => 'Not match Otp',
            ];
        }
        return response()->json($response,$status);
    }

    public function readCountAppointment(Request $request){
        $token = $request->token;
        if(is_null($token)){
            return response()->json("Token is Null",500);
        }{
            if(Patient::where('token',$token)->exists()){
                $pat = Patient::where('token',$token)->first();
                $counthold = Appointment::where('pat_id','=',$pat->pat_id)
                    ->where('statue','=','hold')
                    ->where('app_datetime','>',(new DateTime)->format('Y-m-d 00:00:00'))
                    ->count();
                $countold = Appointment::where('pat_id','=',$pat->pat_id)
                    ->where('statue','=','confirmed')
                    ->where('app_datetime','<',(new DateTime)->format('Y-m-d 00:00:00'))
                    ->count();
                $countcoming = Appointment::where('pat_id','=',$pat->pat_id)->where('app_datetime','>',(new DateTime)->format('Y-m-d 00:00:00'))->count();
                $status = 200;
                $response = [
                    "status" => $status,
                    "countcoming"   => $countcoming,
                    "countholding"   => $counthold,
                    "countold"   => $countold,
                ];
                return response()->json($response,$status);
            }else{
                return response()->json("Token is Not Matched",500);
            }
        }
    }

    public function getAppointmentlist (Request $request){
        $token = $request->token;
        $type = $request->reqtype;
        if(is_null($token)){
            return response()->json("Token is Null",500);
        }else{
            if(Patient::where('token',$token)->exists()){
                $pat = Patient::where('token',$token)->first();
                switch ($type){
                    case 'coming':
                        $appointmentlist = Appointment::where('pat_id','=',$pat->pat_id)
                            ->where('app_datetime','>',(new DateTime)->format('Y-m-d 00:00:00'))
                            ->select('id', 'app_datetime', 'statue','patStatue','recommand', DB::raw("CASE
        WHEN statue = 'rejected' THEN '#FF0000'  -- Red
        WHEN statue = 'hold' THEN '#FFFF00'      -- Yellow
        WHEN statue = 'confirmed' THEN '#00FF00' -- Green
        END AS color"))
                            ->get();
                        break;
                    case 'hold':
                        $appointmentlist = Appointment::select('id', 'app_datetime', 'statue','patStatue','recommand', DB::raw("CASE
        WHEN statue = 'rejected' THEN '#FF0000'  -- Red
        WHEN statue = 'hold' THEN '#FFFF00'      -- Yellow
        WHEN statue = 'confirmed' THEN '#00FF00' -- Green
        END AS color"))
                            ->where('pat_id','=',$pat->pat_id)
                            ->where('statue','=','hold')
                            ->where('app_datetime','>',(new DateTime)->format('Y-m-d 00:00:00'))
                            ->get();
                        break;
                    case 'old':
                        $appointmentlist = Appointment::where('pat_id','=',$pat->pat_id)
                            ->where('statue','=','confirmed')
                            ->where('app_datetime','<',(new DateTime)->format('Y-m-d 00:00:00'))
                            ->select('id', 'app_datetime', 'statue','patStatue','recommand', DB::raw("CASE
        WHEN statue = 'rejected' THEN '#FF0000'  -- Red
        WHEN statue = 'hold' THEN '#FFFF00'      -- Yellow
        WHEN statue = 'confirmed' THEN '#00FF00' -- Green
        END AS color"))
                            ->get();
                        break;
                    default:
                        $appointmentlist = Appointment::select('id', 'app_datetime', 'statue')->get();
                        break;
                }
                $status = 200;
                $response = [
                    "status" => $status,
                    "appointments"   => $appointmentlist,
                ];
                return response()->json($response,$status);
            }else{
                return response()->json("Token is Not Matched",500);
            }
        }
    }

    public function updateAppointmentByPat (Request $request){
        $token = $request->token;
        $type = $request->reqtype;
        $appId = $request->appId;
        if(is_null($token)){
            return response()->json("Token is Null",500);
        }else{
            switch ($type){
                case 'confirmed':
                    Appointment::where('id',$appId)->update($type);
                break;
                case 'rejected':
                    Appointment::where('id',$appId)->update($type);
                break;
            }
        }
    }
}
