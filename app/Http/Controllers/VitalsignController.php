<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Patient;
use App\VitalSign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Toastr;


class VitalsignController extends Controller
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
        $vitals = Vitalsign::all();
        $options = ['temp', 'pressure', 'pulse', 'respiration', 'suger'];
        $patients = Patient::where('pat_statue','Accepted')
            ->join('districts','pat_dist','=','dist_id')
            ->select('patients.*', 'districts.dist_name as district')
            ->get();
        return view('admin.vitalsign.vitalsign_list', ['vitals' => $vitals,'patients'=>$patients,'options' => $options]);
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
        $type = '`'.$request->vitaltype.'`';
        $vital = new VitalSign;
        $data = [
            'pat_id' => $request->app_pat_id,
            'vsNum' => $request->vsNum,
            'vsNum2' => $request->vsNum2,
            'type' => $request->vitaltype,
            'userBy' => 'doc',
        ];
        VitalSign::create($data);
        $status = 201;
        $response = [
            "status" => $status,
            "data"   => $vital,
        ];
        return response()->json($response, $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id=$request->id;
        $data['vital']=$vital=VitalSign::find($id);
        $data['created_at'] = Carbon::parse($vital->created_at)->format('Y-m-d h:i:s');
        $data['patient']=$patient=Patient::find($vital['pat_id']);
        $data['district']=DB::table('districts')
            ->where('dist_id','=',$patient['pat_dist'])
            ->select('dist_name')
            ->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VitalSign::where('id', $id)->delete();
        $status = 200;
        $response = [
            "status" => $status,
        ];
        return response()->json($response);
    }
}
