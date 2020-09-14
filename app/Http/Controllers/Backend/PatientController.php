<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\DoctorSpecialist;
use Illuminate\Http\Request;
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
       $doctorSpecialists = DoctorSpecialist::where('specialist_id',0)->get();
        return view('admin.patient.create', compact(['doctorSpecialists']));
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
        $ifapnmt = $request->get('ifapnmt');
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
