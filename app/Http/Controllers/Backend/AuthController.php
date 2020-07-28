<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.user_management.index', compact('admins'));
    }

    public function registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|max:15|confirmed',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'age' => $request->input('age'),
            'address' => $request->input('address'),
            'role' => $request->input('role'),
            'doctor_specialist' => $request->input('doctor_specialist'),
            'password' => bcrypt($request->input('password')),
        ];

        // dd($data);

        try {
            Admin::create($data);
            toast('Success Toast','success');
        } catch(\Exception $e) {
            toast('Error Toast','error');
        }

    }

    public function loginShow()
    {
        return view('admin.auth.login');
    }
    public function loginProcess(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email','password']);
        // dd($credentials);
        if (Auth::attempt($credentials)) {

            return redirect()->route('admin.dashboard');
        }

        session()->flash('message','User Name or Password Invield');
        session()->flash('type','danger');


        // if(auth()->attempt($credentials))
        // {
        //     return redirect()->route('admin.dashboard');
        // }
        return redirect()->back();
    }
}
