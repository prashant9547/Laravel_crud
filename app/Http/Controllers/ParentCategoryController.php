<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parentcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parentcategory.add');
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
            'PcategoryName' => 'required|unique:parent_categories|string|max:50',
        ]);
    
        $parentCategory = new ParentCategory();
        $parentCategory->PcategoryName = $request->input('PcategoryName');
        if($request->get('status') == null){
            $status = 1;
        } else {
            $status = 0;
        }
        $parentCategory->status = $status;
        //Log::info($Categories);
        // dd($parentCategory);
        // exit();
        $parentCategory->save();
		Session::flash('parent_category_create', 'Parent Category Create Successfully');
		return redirect('parent_category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Parentcategory = ParentCategory::find($id);
        return response()->json($Parentcategory, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accountDetail = ParentCategory::find($id);
        //dd($accountDetail->id);
        //exit();
         return view('parentcategory.edit', compact('accountDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     // 'catName' => 'required|max:200|unique:categories,catName, ' .$id,
        //     // 'catImg' =>   'required',
        // ]);
        $this->validate($request, [
            'PcategoryName' => 'required|unique:parent_categories|string|max:100'
        ]);

        $accountDetail = ParentCategory::find($id);
        $accountDetail->PcategoryName = $request->input('PcategoryName');
        $accountDetail->save();

		Session::flash('pcategory_update', 'Parent Category Update Successfully');
        return redirect('parent_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Parentcategory = ParentCategory::find($id);
        $Parentcategory->delete($id);
        
        //Log::info($Categories->id);
        
		if($Parentcategory)
			return response()->json(["message"=>"Parent Categories Delete Successfully"],200);
		else
			return response()->json(["message"=>"Something went wrong"],400);

    }
    public function pcatList(Request $request)
    {
        $pcatList = ParentCategory::all();
      //Log::info($request);
    //   dd($pcatList);
    //   exit;
        return Datatables::of($pcatList)
                ->make(true);
	}
}
