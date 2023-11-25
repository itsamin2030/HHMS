<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Verify\Service;

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
                "error"   => @$verification->getErrors(),
            ];
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
        if ($verification->isValid()) {
            $status = 200;
            $response = [
                "status" => $status,
                "data"   => $verification->isValid(),
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
}
