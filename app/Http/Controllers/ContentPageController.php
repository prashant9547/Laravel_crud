<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\ContentPage;
use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contentpage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contentpage.add');
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
            'content_title' => 'required|max:200',
            'summernote' => 'required'
        ]);

       
        $content_pages = new ContentPage();
        $content_pages->content_title = $request->input('content_title');
        $content_pages->content_des = $request->input('summernote');
        //Log::info($Categories);
        // dd($content_pages);
        // exit();
        $content_pages->save();
		Session::flash('contentpage_create', 'Content Page Create Successfully');
		return redirect('contentpage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentPage  $contentPage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catentpage = ContentPage::find($id);
        return response()->json($catentpage, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentPage  $contentPage
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentPage $contentPage)
    {
        $contentpageDetail = ContentPage::find($id);
         //dd($accountDetail->id);
         //exit();
         return view('contentpage.edit', compact('contentpageDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContentPage  $contentPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content_title' => 'required|max:200',
            'summernote' => 'required'
        ]);

        $contentpageDetail = ContentPage::find($id);
        

    //     $this->validate($request, [
    //     'catName' => 'required',
    //     'catImg' => 'required'
    // ]);

        
    

$contentpageDetail->content_title = $request->input('catName');
$contentpageDetail->content_des = $request->input('summernote');
$contentpageDetail->save();

        //dd($accountDetail);
        //exit;

        //$input->catImg = $fileNameToStore;
		//$accountDetail->fill($input)->save();
       
		Session::flash('contentpage_update', 'Content Page Update Successfully');
        return redirect('contentpage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentPage  $contentPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contentpage = ContentPage::find($id);
        $contentpage->delete($id);
        
        //Log::info($Categories->id);
        
		if($contentpage)
			return response()->json(["message"=>"Content Page Delete Successfully"],200);
		else
			return response()->json(["message"=>"Something went wrong"],400);
    }
    public function cpageList(){
        $cpageList = ContentPage::all();
        // dd($cpageList);
        // exit;
          return Datatables::of($cpageList)
                  ->make(true);
    }
}
