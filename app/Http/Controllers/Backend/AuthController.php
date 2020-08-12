<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/dashboard';


    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
     return Auth::guard('admin');
    }

    public function loginShow()
    {
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

    // public function loginProcess(Request $request)
    // {
    //     // return $request;
    //     // $this->validate($request, [
    //     //     'email' => 'required|email',
    //     //     'password' => 'required'
    //     // ]);

    //     $credentials = $request->only(['name','role']);
    //     // dd($credentials);
    //     if (Auth::attempt($credentials)) {

    //         return redirect()->route('admin.dashboard');
    //     }else{
    //         session()->flash('message', 'User Name or Password Invield');
    //         session()->flash('type', 'danger');
    //     // if(auth()->attempt($credentials))
    //     // {
    //     //     return redirect()->route('admin.dashboard');
    //     // }
    //     return redirect()->back();
    //     }
    // }
    public function index()
    {
        $admins = Admin::where('role','=','1')->orWhere('role','=','2')->get();
        return view('admin.user_management.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:1|max:15|confirmed',
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
            return redirect()->back();
            toast('Success Toast','success');
        } catch(\Exception $e) {
            return redirect()->back();
            toast('Error Toast','error');
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
