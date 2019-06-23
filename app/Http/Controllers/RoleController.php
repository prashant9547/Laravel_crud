<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // exit;
        $this->validate($request, [
            'roleName' => 'required|unique:roles|string|max:50'
        ]);
       
        $roles = new Role();
        $roles->roleName = $request->input('roleName');
        // $Units->status = $request->input('status');
        //Log::info($Units);
        // dd($roles);
        // exit();
        $roles->save();
		Session::flash('role_create', 'Role Create Successfully');
		return redirect('role');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::find($id);
        return response()->json($roles, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accountDetail = Role::find($id);
        //dd($accountDetail->id);
        //exit();
         return view('role.edit', compact('accountDetail'));
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
        // dd($id);
        // exit;
        $this->validate($request, [
            'roleName' => 'required|unique:roles|string|max:50'
        ]);

        $accountDetail = Role::find($id);
        $accountDetail->roleName = $request->input('roleName');
        $accountDetail->save();

		Session::flash('role_update', 'Role Update Successfully');
        return redirect('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->delete($id);
        
        //Log::info($Categories->id);
        
		if($roles)
			return response()->json(["message"=>"Role Delete Successfully"],200);
		else
			return response()->json(["message"=>"Something went wrong"],400);
    }
    public function roleList(Request $request)
    {
        $roleList = Role::all();
        //Log::info($request);
        // dd($unitList);
        // exit;
        return Datatables::of($roleList)
                ->make(true);
	}
}
