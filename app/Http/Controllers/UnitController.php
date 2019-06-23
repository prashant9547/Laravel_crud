<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.add');
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
            'unitName' => 'required|unique:units|string|max:50'
        ]);
       
        $Units = new Unit();
        $Units->unitName = $request->input('unitName');
        // $Units->status = $request->input('status');
        //Log::info($Units);
        // dd($Units);
        // exit();
        $Units->save();
		Session::flash('unit_create', 'Unit Create Successfully');
		return redirect('unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Units = unit::find($id);
        return response()->json($Units, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accountDetail = Unit::find($id);
        //dd($accountDetail->id);
        //exit();
         return view('unit.edit', compact('accountDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // exit;
        $this->validate($request, [
            'unitName' => 'required|unique:units|string|max:50'
        ]);

        $accountDetail = Unit::find($id);
        $accountDetail->unitName = $request->input('unitName');
        $accountDetail->save();

		Session::flash('unit_update', 'Unit Update Successfully');
        return redirect('unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Units = Unit::find($id);
        $Units->delete($id);
        
        //Log::info($Categories->id);
        
		if($Units)
			return response()->json(["message"=>"Unit Delete Successfully"],200);
		else
			return response()->json(["message"=>"Something went wrong"],400);
    }
    public function unitList(Request $request)
    {
        $unitList = Unit::all();
      //Log::info($request);
        // dd($unitList);
        // exit;
        return Datatables::of($unitList)
                ->make(true);
	}
}
