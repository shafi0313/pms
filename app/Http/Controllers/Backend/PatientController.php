<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\DoctorSpecialist;
use Illuminate\Http\Request;
use App\Models\Patient;
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
        $doctorSpecialists = DoctorSpecialist::where('specialist_id',0)->get();

        $parent_id = $request->cat_id;

        $subcategories = DoctorSpecialist::where('id',$parent_id)
                            ->with('subcategories')
                            ->get();

        return response()->json([
            'subcategories' => $subcategories
        ]);

        // $ds = DoctorSpecialist::with('doctor')->get();
        // foreach($ds as $sp){
        //     echo $sp->id,'<br/>';
        //     foreach($sp->doctor as $dr){
        //         echo $dr->id.'<br/>';
        //     }
        // }
        return view('admin.patient.create',compact('doctorSpecialists'));
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

        try {
            Patient::create($patient);
            return redirect()->route('patients.index');
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
