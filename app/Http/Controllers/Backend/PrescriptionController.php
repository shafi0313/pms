<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\PatientTest;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\PrescriptionInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

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

    public function prescriptionShow(Request $request, $date, $apnmt_id)
    {

        $appointments = Appointment::where('id',auth()->user()->id);
        $patient_tests = PatientTest::where('apnmt_id', $apnmt_id)->where('date', $date)->get();
        $prescriptionInfo = Prescription::where('doctor_id',auth()->user()->id)->first();
        $doctorDeg = User::where('id',auth()->user()->id)->get();
        $prescriptionShows = Prescription::where('date', $date)->get();
        return view('admin.prescription.prescription_show', compact(['prescriptionShows','prescriptionInfo','patient_tests','doctorDeg']));
    }

    public function prescriptionShowPdf(Request $request, $date, $apnmt_id)
    {
        $appointments = Appointment::where('id',auth()->user()->id);
        $patient_tests = PatientTest::where('apnmt_id', $apnmt_id)->where('date', $date)->get();
        $prescriptionInfo = Prescription::where('doctor_id',auth()->user()->id)->first();
        $doctorDeg = User::where('id',auth()->user()->id)->get();
        $prescriptionShows = Prescription::where('date', $date)->get();
        return view('admin.prescription.prescription_show_pdf', compact(['prescriptionShows','prescriptionInfo','patient_tests','doctorDeg']));
    }

    public function prescriptionPdfDownload(Request $request, $date, $apnmt_id)
    {
        $appointments = Appointment::where('id',auth()->user()->id);
        $patient_tests = PatientTest::where('apnmt_id', $apnmt_id)->where('date', $date)->get();
        $prescriptionInfo = Prescription::where('doctor_id',auth()->user()->id)->first();
        $doctorDeg = User::where('id',auth()->user()->id)->get();
        $prescriptionShows = Prescription::where('date', $date)->get();

        $pdf = PDF::loadView('admin.prescription.prescription_show_pdf', compact(['prescriptionShows','prescriptionInfo','patient_tests','doctorDeg']));
        return $pdf->download('presscription-pdf');
    }

    public function appointmentReject(Request $request, $id)
    {
        $data = ['a_status' => $request->get('a_status')];

        try {
            $update  = Appointment::find($id);
            $update->update($data);
            // Alert::success('Slider Updeated', 'Slider Successfully Updeated');
            return redirect()->back();
        } catch(\Exception $ex){
            // Alert::error('DataInsert', $ex->getMessage());
            return redirect()->back();
        }

    }

    public function prescriptionCreate($id)
    {
        $doctorDeg = User::where('id',auth()->user()->id)->get();
        $appointments = Appointment::find($id);
        return view('admin.prescription.create', compact(['appointments','doctorDeg']));
    }

    public function appointmentShow()
    {
        $appointments = Appointment::where('p_status',0)->where('a_status',0)->where('doctor_id',auth()->user()->id)->get();
        return view('admin.prescription.appointments', compact('appointments'));
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
        $this->validate($request, [
            'next_meet' => 'required',
            'days' => 'required',
            'eating_time' => 'required',
        ]);
        // $s = 123;
        // return $ss =  str_split($s,1);

        $appId = $request->get('appointmentId');
        $appointments ['p_status'] = 1;

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
            return redirect()->route('prescription.appointment');
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
