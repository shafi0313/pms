<?php

namespace App\Http\Controllers\Backend;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Admin;
use App\Models\DoctorSpecialist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $doctors = Admin::where('role',3)->count();
        $patients = Patient::count();
        $appointments = Appointment::count();
        return view('admin.dashboard',compact(['patients','doctors','appointments']));
    }
}
