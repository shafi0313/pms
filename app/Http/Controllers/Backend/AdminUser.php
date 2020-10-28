<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',1)->orWhere('role',2)->get();
        return view('admin.user_management.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_management.create');
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
            'is_' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:1|max:15|confirmed',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'age' => $request->input('age'),
            'address' => $request->input('address'),
            'role' => 1,
            'is_' => $request->input('is_'),
            'gender' => $request->input('gender'),
            'password' => bcrypt($request->input('password')),
        ];



        // dd($data);

        // $role = Role::findById($request->input('is_'));
        // $permission = Permission::findById($request->input('is_'));
        // $role->givePermissionTo($permission);



        try {
            $user = User::create($data);
            $user_id = $user->id;
            $permission = [
                'role_id' => $request->input('is_'),
                'model_type' => "App\User",
                'model_id' =>  $user_id,
            ];
            DB::table('model_has_roles')->insert($permission);
            Alert::success('User Inserted', 'User Successfully Inserted');
            return redirect()->route('users.index');
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
        User::find($id)->delete();
        return Redirect()->back();
    }
}
