<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoctorSpecialist;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patientId = DB::table('patients')->select('id')->latest('id')->first();
        $doctorSpecialists = DoctorSpecialist::where('specialist_id',0)->get();
        return view('admin.patient.create', compact(['doctorSpecialists','patientId']));
    }

    public function subCat(Request $request)
    {
        $p_id = $request->cat_id;
        $subcategories = DoctorSpecialist::where('specialist_id',$p_id)->get();
        $subCat = '';
        foreach($subcategories as $sub){
            $subCat .= '<option value="'.$sub->id.'">'.$sub->specialist.'</option>';
        }
        return json_encode(['subcategories' => $subcategories,'subCat'=>$subCat]);
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
            'name' => 'required',
            'age' => 'required|numeric',
            'email' => 'email|unique:patients,email',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $patient = [
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'add_by' => $request->input('add_by'),
            'mdical_history' => $request->input('mdical_history'),
        ];

        // $patientId = DB::table('patients')->select('id')->latest('id')->first();


        $patientId = $request->get('pid');
        if($patientId==''){
            $patientId += 1;
        }else{
            $patientId = $request->get('pid')+1;
        }


        $appointments = [
            'patient_id' => $patientId,
            'doctor_id' => $request->input('doctor_name'),
            'date' => Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d'),
            'time' => $request->input('time'),
        ];


        try {
            Patient::create($patient);
            Appointment::create($appointments);
            return redirect()->route('appointment.show');
            Alert::success('Success Title', 'Success Message');
        } catch(\Exception $ex) {
            return redirect()->back();
            Alert::error('Error Title', 'Error Message');
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
}
