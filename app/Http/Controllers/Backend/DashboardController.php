<?php

namespace App\Http\Controllers\Backend;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        // return $userId = $request->get('userId');
        // Role::create(['name'=>'doctor']);
        // permission::create(['name'=>'show']);

        // $role = Role::findById(3);
        // $permission = Permission::findById(3);
        // $role->givePermissionTo($permission);

        // $role = Role::create(['name' => 'counter']);
        // $permission = Permission::create(['name' => 'counteradd']);
        // auth()->user()->givePermissionTo('admin');
        // auth()->user()->assignRole('admin');

        // return User::role('doctor')->get();

        $doctors = User::where('is_',3)->count();
        $patients = Patient::count();
        $appointments = Appointment::count();
        $doctorAppnmt = Appointment::where('doctor_id',$userId)->count();
        return view('admin.dashboard',compact(['patients','doctors','appointments','doctorAppnmt']));
    }
}
