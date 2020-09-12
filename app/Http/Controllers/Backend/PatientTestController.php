<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\PatientTest;
use Illuminate\Http\Request;
use App\Models\PrescriptionInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PatientTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = PatientTest::where('doctor_id',auth()->user()->id)->groupBy('apnmt_id')->get();
        return view('admin.patient_test.index', compact('appointments'));
    }

    public function testDate(Request $request, $patient_id)
    {
        $prescriptionDates = PatientTest::orderBy('id', 'DESC')->where('patient_id', $patient_id)->groupBy('date')->get();
        return view('admin.patient_test.test_date', compact('prescriptionDates'));
    }

    public function patientTestCreate($id)
    {
        $appointments = Appointment::find($id);
        return view('admin.patient_test.create', compact('appointments'));
    }

    public function appointmentShow()
    {
        $appointments = Appointment::where('t_status',0)->where('doctor_id',auth()->user()->id)->get();
        return view('admin.patient_test.appointments', compact('appointments'));
    }

    public function testShow(Request $request, $date)
    {

        // $prscriptionInfos = PrescriptionInfo::FindOrFail();
        $testInfo = PatientTest::where('doctor_id',auth()->user()->id)->first();

        $patient_tests = PatientTest::where('date', $date)->get();
        return view('admin.patient_test.test_show', compact(['patient_tests','testInfo']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appId = $request->get('appointmentId');
        $appointments ['t_status'] = 1;

        foreach($request->test_id as $key => $v){
            $data=[
                'doctor_id' => $request->doctor_id[$key],
                'patient_id' => $request->patient_id[$key],
                'apnmt_id' => $request->apnmt_id[$key],
                'test_id' => $request->test_id[$key],
                'date'=> Carbon::now(),
            ];
            $prescription = PatientTest::create($data);
        }

        // $prescriptionInfo = [
        //     'apnmt_id' => $appId,
        //     'next_meet' => $request->input('next_meet'),
        //     'advice' => $request->input('advice'),
        // ];

        try {
            // PrescriptionInfo::create($prescriptionInfo);
            Appointment::where('id',$appId)->update($appointments);
            Alert::success('Patient Test Updeated', 'Patient Test Successfully Updeated');
            return redirect()->route('patient_test.appointment');
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

    public function patientsearch(Request $request){
        $query = $request->get('term','');
        $medical_tests=DB::table('medical_tests');
        if($request->type=='medicalTest'){
            $medical_tests->where('name','LIKE','%'.$query.'%');
        }

        $medical_tests=$medical_tests->get();
        $data=array();
        foreach ($medical_tests as $medical_test) {
            $data[]=array('id'=>$medical_test->id, 'name'=>$medical_test->name);
        }
        if(count($data))
             return $data;
        else
            return ['id'=>'', 'name'=>''];
    }
}
