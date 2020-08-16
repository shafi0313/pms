<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\DoctorSpecialist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('role','=', '3')->get();
        return view('admin.doctor.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctorSpecialists = DoctorSpecialist::where('specialist_id','=','0')->get();
        return view('admin.doctor.create', compact('doctorSpecialists'));
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
            'doctor_specialist' => 'required',
            'fees' => 'required|numeric',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|max:15|confirmed',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'fees' => $request->input('fees'),
            'gender' => $request->input('gender'),
            'role' => '3',
            'doctor_specialist' => $request->input('doctor_specialist'),
            'password' => bcrypt($request->input('password')),
        ];

        $doctorSpecialists = [
            'specialist' => $request->input('name'),
            'specialist_id' => $request->input('doctor_specialist'),
        ];

        // dd($se);

        try {
            Admin::create($data);
            DoctorSpecialist::create($doctorSpecialists);
            return redirect()->route('doctor.index');
            Alert::success('Success Title', 'Success Message');
        } catch(\Exception $e) {
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
        $admins = Admin::find($id);
        $doctorSpecialists = DoctorSpecialist::all();
        return view('admin.doctor.edit', compact('admins', 'doctorSpecialists'));
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
        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'fees' => $request->input('fees'),
            'gender' => $request->input('gender'),
            'role' => '3',
            'doctor_specialist' => $request->input('doctor_specialist'),
            'password' => bcrypt($request->input('password')),
        ];

        // dd($data);

        try {
            $update  = Admin::find($id);
            $update->update($data);
            return redirect()->route('doctor.index');
            Alert::success('Success Title', 'Success Message');
        } catch(\Exception $e) {
            return redirect()->back();
            Alert::error('Error Title', 'Error Message');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return Redirect()->back();
    }
}
