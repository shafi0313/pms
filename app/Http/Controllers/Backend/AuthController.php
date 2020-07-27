<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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

        session()->flash('message','Invield');
        session()->flash('type','danger');


        // if(auth()->attempt($credentials))
        // {
        //     return redirect()->route('admin.dashboard');
        // }
        return redirect()->back();
    }
}
