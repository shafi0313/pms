<?php

namespace App\Http\Controllers\Backend;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Medicine::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-link btn-primary btn-sm editBook"><i class="fa fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-link btn-danger deleteBook"><i class="fa fa-times"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.medicine.index');
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
        ]);
        Medicine::updateOrCreate(['id' => $request->id],
            [
                'name' => $request->input('name'),
                'mg' => $request->input('mg'),
                'type' => $request->input('type'),
                'medicine_group' => $request->input('medicine_group'),
                'company' => $request->input('company'),
                'price' => $request->input('price'),
                'info' => $request->input('info'),
            ]);
        return response()->json(['success'=>'Medicine saved successfully.']);
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
        $blogCategorys = Medicine::find($id);
        return response()->json($blogCategorys);
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
        Medicine::find($id)->delete();
        return response()->json(['success'=>'Category deleted successfully.']);
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $medicines = Medicine::all();
    //     return view('admin.medicine.index', compact('medicines'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('admin.medicine.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'price' => 'numeric',
    //     ]);

    //     $data = [
    //         'name' => $request->input('name'),
    //         'medicine_group' => $request->input('medicine_group'),
    //         'company' => $request->input('company'),
    //         'price' => $request->input('price'),
    //     ];


    //     try {
    //         Medicine::create($data);
    //         Alert::success('Medicine Inserted', 'Medicin Successfully Inserted');
    //         return redirect()->route('medicine.index');
    //     } catch(\Exception $ex){
    //         Alert::error('DataInsert', $ex->getMessage());
    //         return redirect()->back();
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $medicine = Medicine::find($id);
    //     return view('admin.medicine.edit', compact('medicine'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $data = [
    //         'name' => $request->input('name'),
    //         'medicine_group' => $request->input('medicine_group'),
    //         'company' => $request->input('company'),
    //         'price' => $request->input('price'),
    //     ];

    //     try {
    //         Medicine::find($id)->update($data);
    //         Alert::success('Medicin Updated', 'Medicin Successfully Updated');
    //         return redirect()->route('medicine.index');
    //     } catch (\Exception $ex) {
    //         Alert::error('DataInsert', $ex->getMessage());
    //         return redirect()->back();
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     Medicine::find($id)->delete();
    //     return redirect()->back();
    // }
}
