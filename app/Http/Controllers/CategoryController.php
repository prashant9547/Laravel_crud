<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
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
            'catName' => 'required|max:200',
            'catImg' => 'required'
        ]);

        $fileNameToStore = $filenameWithExt = $filename = $extension = '';
        if($request->file('catImg')){
            //get filename with extension
            $filenameWithExt = $request->file('catImg')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('catImg')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('catImg')->StoreAs('/public/Categories',$filenameWithExt);
        }
       
        $Categories = new Category();
        $Categories->catName = $request->input('catName');
        $Categories->catImg = $filenameWithExt;
        //Log::info($Categories);
        //dd($Categories);
        //exit();
        $Categories->save();
		Session::flash('categories_create', 'Category Create Successfully');
		return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Categories = Category::find($id);
        return response()->json($Categories, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($categories);
         //exit;
         $accountDetail = Category::find($id);
         //dd($accountDetail->id);
         //exit();
         return view('categories.edit', compact('accountDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'catName' => 'required|max:200|unique:categories,catName, ' .$id,
            'catImg' =>   'required',
        ]);

        $accountDetail = Category::find($id);

        $fileNameToStore = $filenameWithExt = $filename = $extension = '';
        if($request->file('catImg')){
            //get filename with extension
            $filenameWithExt = $request->file('catImg')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('catImg')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('catImg')->StoreAs('/public/Categories',$filenameWithExt);
        }
        

    //     $this->validate($request, [
    //     'catName' => 'required',
    //     'catImg' => 'required'
    // ]);

        
    

$accountDetail->catName = $request->input('catName');
$accountDetail->catImg = $filenameWithExt;
$accountDetail->save();

        //dd($accountDetail);
        //exit;

        //$input->catImg = $fileNameToStore;
		//$accountDetail->fill($input)->save();
       
		Session::flash('categories_update', 'Category Update Successfully');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // exit;
        $Categories = Category::find($id);
        $Categories->delete($id);
        
        //Log::info($Categories->id);
        
		if($Categories)
			return response()->json(["message"=>"Category Delete Successfully"],200);
		else
			return response()->json(["message"=>"Something went wrong"],400);

    }
    public function catList(Request $request)
    {
        $catList = Category::with('pcategory')->get();
        // dd($catList);
        // exit;
        // $catList = Category::all();
      //Log::info($request);
        return Datatables::of($catList)
                ->make(true);
	}

}
