<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use Illuminate\Http\Request;
use App\Verify\Service;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

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

    public function readCountComingAppointment(Request $request){
        $token = $request->token;
        if(is_null($token)){
            return response()->json("Token is Null",500);
        }{
            if(Patient::where('token',$token)->exists()){
                $pat = Patient::where('token',$token)->first();
                $countcoming = Appointment::where('pat_id','=',$pat->pat_id)->where('app_datetime','>','')->count();
                $status = 200;
                $response = [
                    "status" => $status,
                    "count"   => $countcoming,
                ];
                return response()->json($response,$status);
            }else{
                return response()->json("Token is Not Matched",500);
            }
        }
    }
    public function readCountHoldAppointment(Request $request){
        $token = $request->token;
        if(is_null($token)){
            return response()->json("Token is Null",500);
        }{
            if(Patient::where('token',$token)->exists()){
                $pat = Patient::where('token',$token)->first();
                $countcoming = Appointment::where('pat_id','=',$pat->pat_id)->where('app_datetime','>','')->where('statue','=','hold')->count();
                $status = 200;
                $response = [
                    "status" => $status,
                    "count"   => $countcoming,
                ];
                return response()->json($response,$status);
            }else{
                return response()->json("Token is Not Matched",500);
            }
        }
    }
}
