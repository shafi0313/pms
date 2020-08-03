<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
     public function index(){
        //  return view('admin.user_management.index');
         $admins = Admin::where('role','=','1')->orWhere('role','=','2')->get();
        return view('admin.user_management.index', compact('admins'));
     }
    public function getUser()
    {
        // $admins = Admin::where('role','=','1')->orWhere('role','=','2')->get();
        // return view('admin.user_management.index', compact('admins'));

        $admins = Admin::where('role','=','1')->orWhere('role','=','2')->get();
        $html = '';
        $html .= '<table id="multi-filter-select" class="display table table-striped table-hover" >';
        $html .= '<thead>';
        $html .= '    <tr>';
        $html .= '        <th>Name</th>';
        $html .= '        <th>Email</th>';
        $html .= '        <th>role</th>';
        $html .= '        <th>Action</th>';
        $html .= '    </tr>';
        $html .= '</thead>';

        $html .= '<tfoot>';
        $html .= '    <tr>';
        $html .= '        <th>Name</th>';
        $html .= '        <th>Email</th>';
        $html .= '        <th>role</th>';
        $html .= '        <th>Action</th>';
        $html .= '    </tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        if ($admins->count() > 0) {
            foreach ($admins as $row) {

                $html .=    '<tr>';
                $html .=        '<td>' . $row->name . '</td>';
                $html .=        '<td>' . $row->email . '</td>';
                $html .=        '<td>' . $row->Role . '</td>';
                $html .=        '<td>';
                // $html .= '<a data-id="' . $row->id . '" class="btn btn-info" id="update" href="#" ><i class="fa fa-edit  "></i></a>';
                // $html .= '<a data-id="' . $row->id . '" class="btn btn-danger" id="delete" href="' . route('fuel.delete', $row->id) . '"><i class="fa fa-trash  "></i></a>';
                $html .=        '</td>';
                $html .=    '</tr>';

            }
            $html .= '</tbody>';
            $html .= '</table>';
            return json_encode(['status' => 'success', 'html' => $html]);
        } else {
            $html .= '<tr colspan="">';
            $html .= '<td>SORRY NO DATA FOUND!</td>';
            $html .= '<tr>';
            return json_encode(['status' => 'danger', 'html' => $html]);
        }
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
        return $request;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email','password']);
        // dd($credentials);
        if (Auth::attempt($credentials)) {

            return redirect()->route('admin.dashboard');
        }else{
            session()->flash('message', 'User Name or Password Invield');
            session()->flash('type', 'danger');


            // if(auth()->attempt($credentials))
        // {
        //     return redirect()->route('admin.dashboard');
        // }
        return redirect()->back();
        }
    }
}
