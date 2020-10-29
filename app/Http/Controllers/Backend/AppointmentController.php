<?php

namespace App\Http\Controllers\Backend;

use App\User;
use DataTables;
use App\Models\Patient;
use App\Models\DoctorTime;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\SpecialistCat;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    public function patientList()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('admin.appointment.patients', compact('patients'));
    }

    public function appointment()
    {
        $appointments = Appointment::orderBy('id','DESC')->with(['doctor','patient'])->get();
        return view('admin.appointment.appointments', compact('appointments'));
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('doctor_id',auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $patient = Patient::findOrFail($id);
        $doctorSpecialists = SpecialistCat::all();
        return view('admin.appointment.create', compact(['patient','doctorSpecialists']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'doctor_name' => 'required',
        //     'date' => 'required',
        //     'time' => 'required'
        // ]);

        $data = [
            'patient_id' => $request->input('patientId'),
            'doctor_id' => $request->input('doctor_name'),
            'date' => Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d'),
            'time' => $request->input('time'),
        ];

        try {
            Appointment::create($data);
            Alert::success('Appointment Inserted', 'Appointment Successfully Inserted');
            return redirect()->back();
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
        Appointment::find($id)->delete();
        return Redirect()->back();
    }
}
