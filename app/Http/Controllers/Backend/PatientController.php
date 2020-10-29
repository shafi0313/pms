<?php

namespace App\Http\Controllers\Backend;

use App\User;

use App\Models\Patient;
use App\Models\DoctorTime;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DoctorSpecialist;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SpecialistCat;
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
        $patients = Patient::orderBy('id','DESC')->get();
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $doctorSpecialists = SpecialistCat::all();
        return view('admin.patient.create', compact(['doctorSpecialists']));
    }

    public function subCat(Request $request)
    {
        $p_id = $request->cat_id;
        $subcategories = User::where('doctor_specialist',$p_id)->get();
        $subCat = '';
        $subCat .= '<option value="0">Select</option>';
        foreach($subcategories as $sub){
            $subCat .= '<option value="'.$sub->id.'">'.$sub->name.'</option>';
        }

        return json_encode(['subcategories' => $subcategories,'subCat'=>$subCat]);
    }

    public function doctorTime(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $doctorTimes = DoctorTime::where('doctor_id',$doctor_id)->get();
        $doctorTime = '';
        $doctorTime .= '<option value="0">Select</option>';
        foreach($doctorTimes as $sub){
            $doctorTime .= '<option value="'.$sub->time.'">'.$sub->time.'</option>';
        }

        return json_encode(['doctorTimes' => $doctorTimes,'doctorTime'=>$doctorTime]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ifapnmt = $request->get('ifapnmt');
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|numeric',
            // 'email' => 'email|unique:patients,email',
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

        if($ifapnmt==1)
        {
            $this->validate($request, [
                'doctor_name' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);
            $appointments = [
                'doctor_id' => $request->input('doctor_name'),
                'date' => Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d'),
                'time' => $request->input('time'),
            ];
        }

        try {
            $patient =  Patient::create($patient);
            if($ifapnmt==1)
            {
                $appointments['patient_id'] = $patient->id;
                Appointment::create($appointments);
            }
            Alert::success('Patient Inserted', 'Patient Successfully Inserted');
            return redirect()->route('patients.index');
        } catch(\Exception $ex) {
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
        Patient::find($id)->delete();
        return redirect()->back();
    }
}
