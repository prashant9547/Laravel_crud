<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subcategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategories.add',compact('categories'));
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
            'cat_id' => 'required',
            'sub_catName' => 'required',
            'sub_catImg' => 'required'
        ]);

        $fileNameToStore = $filenameWithExt = $filename = $extension = '';
        if($request->file('sub_catImg')){
            //get filename with extension
            $filenameWithExt = $request->file('sub_catImg')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('sub_catImg')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('sub_catImg')->StoreAs('/public/SubCategories',$filenameWithExt);
        }
       
        $SubCategories = new SubCategory();
        $SubCategories->cat_id = $request->input('cat_id');
        $SubCategories->sub_catName = $request->input('sub_catName');
        $SubCategories->sub_catImg = $filenameWithExt;
        
        $SubCategories->save();
		Session::flash('subcategories_create', 'Sub Categories Create Successfully');
		return redirect('subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SubCategories = SubCategory::find($id);
        return response()->json($SubCategories, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $accountDetail = SubCategory::find($id);
        return view('subcategories.edit',compact('accountDetail','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'cat_id' => 'required',
            'sub_catName' => 'required',
            'sub_catImg' => 'required'
    ]);

        $fileNameToStore = $filenameWithExt = $filename = $extension = '';
        if($request->file('sub_catImg')){
            //get filename with extension
            $filenameWithExt = $request->file('sub_catImg')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('sub_catImg')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('sub_catImg')->StoreAs('/public/SubCategories',$filenameWithExt);
        }
        $accountDetail = SubCategory::find($id);

        

        // $input = $request->all();
        // $input[] = $request->input('catName');
        //$input[] = $fileNameToStore;
        // dd($input);
        // exit();
        $accountDetail->cat_id = $request->input('cat_id');
        $accountDetail->sub_catName = $request->input('sub_catName');
        $accountDetail->sub_catImg = $filenameWithExt;
        $accountDetail->save();
		
		Session::flash('subcategories_update', 'SubCategory Update Successfully');
        return redirect('subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SubCategories = SubCategory::find($id);
        $SubCategories->delete($id);
        
		if($SubCategories)
			return response()->json(["message"=>"SubCategory Delete Successfully"],200);
		else
			return response()->json(["message"=>"Something went wrong"],400);
    }
    public function subcatList()
    {
        $accountDetails = SubCategory::with('category')->get();

        // dd($accountDetails);
        // exit;
        return Datatables::of($accountDetails)
                ->make(true);
	}
}
