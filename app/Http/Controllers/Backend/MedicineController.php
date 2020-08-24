<?php

namespace App\Http\Controllers\Backend;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.medicine.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicine.create');
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
            'price' => 'numeric',
        ]);

        $data = [
            'name' => $request->input('name'),
            'medicine_group' => $request->input('medicine_group'),
            'company' => $request->input('company'),
            'price' => $request->input('price'),
        ];


        try {
            Medicine::create($data);
            Alert::success('Medicine Inserted', 'Medicin Successfully Inserted');
            return redirect()->route('medicine.index');
        } catch(\Exception $ex){
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
        $medicine = Medicine::find($id);
        return view('admin.medicine.edit', compact('medicine'));
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
            'medicine_group' => $request->input('medicine_group'),
            'company' => $request->input('company'),
            'price' => $request->input('price'),
        ];

        try {
            Medicine::find($id)->update($data);
            Alert::success('Medicin Updated', 'Medicin Successfully Updated');
            return redirect()->route('medicine.index');
        } catch (\Exception $ex) {
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
        Medicine::find($id)->delete();
        return redirect()->back();
    }
}
