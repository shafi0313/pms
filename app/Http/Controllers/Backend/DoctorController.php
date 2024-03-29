<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Carbon\Carbon;
use App\Models\DoctorTime;
use Illuminate\Http\Request;
use App\Models\SpecialistCat;
use App\Models\DoctorSpecialist;
use App\Models\SpecialistSubCat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $users = User::where('is_',3)->get();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialistCat = SpecialistCat::all();
        return view('admin.doctor.create', compact(['specialistCat']));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:15|confirmed',
        ]);
        $specialist_id = $request->input('doctor_specialist');
        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'fees' => $request->input('fees'),
            'gender' => $request->input('gender'),
            'role' => '1',
            'is_' => '3',
            'doctor_specialist' => $specialist_id,
            'password' => bcrypt($request->input('password')),
        ];

        // $doctorSpecialists = [
        //     'specialist' => $request->input('name'),
        //     'specialist_id' => $request->input('doctor_specialist'),
        // ];



        // if($user!='')
        // {
        //     Alert::success('Data Inserted', 'Data Successfully Inserted');
        //     return redirect()->route('doctor.index');
        // }else{
        //     Alert::error('DataInsert', 'Data Successfully Inserted');
        //     return redirect()->back();
        // }
        try {
            $user = User::create($data);
            $doctor_id = $user->id;
            $permission = [
                'role_id' => 3,
                'model_type' => "App\User",
                'model_id' =>  $doctor_id,
            ];
            DB::table('model_has_roles')->insert($permission);

            foreach($request->degree as $key => $v){
                $s=[
                    'degree' => $request->degree[$key],
                    'doctor_id' => $doctor_id,
                    'specialist_cat_id' => $specialist_id,
                ];
                SpecialistSubCat::create($s);
            }

            foreach($request->time as $key => $v){
                $doctorTime=[
                    'doctor_id' => $doctor_id,
                    'time' => $request->time[$key],
                ];
                // print_r($s);
                DoctorTime::create($doctorTime);
            }

            Alert::success('Data Inserted', 'Data Successfully Inserted');
            return redirect()->route('doctor.index');
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
        $admins = User::find($id);
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
            $update  = User::find($id);
            $update->update($data);
            Alert::success('Data Updeated', 'Data Successfully Updeated');
            return redirect()->route('doctor.index');
        } catch(\Exception $ex) {
            Alert::error('DataInsert', $ex->getMessage());
            return redirect()->back();
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
        User::find($id)->delete();
        return Redirect()->back();
    }
}
