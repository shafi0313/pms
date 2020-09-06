<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Carbon\Carbon;
use App\Models\Medicine;
use App\Models\PrescriptionInfo;
use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $appointments = Prescription::where('doctor_id',auth()->user()->id)->groupBy('apnmt_id')->get();
        return view('admin.prescription.index', compact('appointments'));
    }

    public function prescriptionDates(Request $request, $patient_id)
    {
        $prescriptionDates = Prescription::orderBy('id', 'DESC')->where('patient_id', $patient_id)->groupBy('date')->get();
        return view('admin.prescription.prescription_date', compact('prescriptionDates'));
    }

    public function prescriptionShow(Request $request, $date)
    {

        // $prscriptionInfos = PrescriptionInfo::FindOrFail();
        // $prescriptionInfos = PrescriptionInfo::all();
        $prescriptionInfo = Prescription::where('doctor_id',auth()->user()->id)->first();
        $prescriptionShows = Prescription::where('date', $date)->get();
        return view('admin.prescription.prescription_show', compact(['prescriptionShows','prescriptionInfo']));
    }

    public function prescriptionCreate($id)
    {
        $appointments = Appointment::find($id);
        return view('admin.Prescription.create', compact('appointments'));
    }

    public function appointmentShow()
    {
        $appointments = Appointment::where('status',0)->where('doctor_id',auth()->user()->id)->get();
        return view('admin.Prescription.appointments', compact('appointments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $doctor = User::all();
        // return view('admin.Prescription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $s = 123;
        // return $ss =  str_split($s,1);

        $appId = $request->get('appointmentId');
        $appointments ['status'] = 1;

        foreach($request->medicine_id as $key => $v){
            $data=[
                'doctor_id' => $request->doctor_id[$key],
                'patient_id' => $request->patient_id[$key],
                'apnmt_id' => $request->apnmt_id[$key],
                'medicine_id' => $request->medicine_id[$key],
                'eating_time' => $request->eating_time[$key],
                'days'=>$request->days[$key],
                'note'=>$request->note[$key],
                'date'=> Carbon::now(),
            ];
            $prescription = Prescription::create($data);
        }

        $prescriptionInfo = [
            'apnmt_id' => $appId,
            'next_meet' => $request->input('next_meet'),
            'advice' => $request->input('advice'),
        ];

        try {
            PrescriptionInfo::create($prescriptionInfo);
            Appointment::where('id',$appId)->update($appointments);
            Alert::success('Prescription Updeated', 'Prescription Successfully Updeated');
            return redirect()->back();
        } catch(\Exception $ex){
            Alert::error('DataInsert', $ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchResponse(Request $request){
        $query = $request->get('term','');
        $medicines=DB::table('medicines');
        if($request->type=='medicinesName'){
            $medicines->where('name','LIKE','%'.$query.'%');
        }

        $medicines=$medicines->get();
        $data=array();
        foreach ($medicines as $medicine) {
            $data[]=array('id'=>$medicine->id, 'name'=>$medicine->name);
        }
        if(count($data))
             return $data;
        else
            return ['id'=>'', 'name'=>''];
    }
}
