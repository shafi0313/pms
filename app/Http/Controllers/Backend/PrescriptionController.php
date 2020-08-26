<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Medicine;
use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function appointmentShow()
    {
        $appointments = Appointment::all();
        return view('admin.Prescription.appointments', compact('appointments'));
    }
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.Prescription.index');
    }

    public function prescriptionCreate($id)
    {
        $appointments = Appointment::find($id);
        return view('admin.Prescription.create', compact('appointments'));
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
        foreach($request->medicine_id as $key => $v){
            $data=[
                'doctor_id'=>$request->doctor_id[$key],
                'patient_id'=>$request->patient_id[$key],
                'medicine_id'=>$request->medicine_id[$key],
                'eating_time'=>$request->eating_time[$key],
                'days'=>$request->days[$key],
            ];
            $prescription = Prescription::create($data);
        }
        try {
            $prescription;
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

    public function autocomplete(Request $request)
    {
          $search = $request->get('term');

          $result = Medicine::where('name', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }
}