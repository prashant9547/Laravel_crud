<?php

namespace App\Http\Controllers;
use Datatables;
// use Yajra\Datatables\Facades\Datatables;
use Session;
use Storage;
use File;
use Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website_settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website_settings.add');
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
            'sitename_logo' => 'required|max:200',
            'facebook' => 'required|max:200',
            'linkedin' => 'required|max:200',
            'twitter' => 'required|max:200',
            'google_plus' => 'required'
        ]);
        $fileNameToStore = $filenameWithExt = $filename = $extension = '';
        
        if($request->file('sitelogo')){
            //get filename with extension
            $filenameWithExt = $request->file('sitelogo')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('sitelogo')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('sitelogo')->StoreAs('/public/Website',$filenameWithExt);
        }
       
        $Website = new Website();
        $Website->sitename_logo = $request->input('sitename_logo');
        $Website->siteName = $request->input('siteName');
        $Website->sitelogo = $filenameWithExt;
        $Website->facebook = $request->input('facebook');
        $Website->google_plus = $request->input('google_plus');
        $Website->twitter = $request->input('twitter');
        $Website->linkedin = $request->input('linkedin');
        // dd($Slider);
        // exit;
        //Log::info($Categories);
    //    dd($Website);
    //    exit;
        $Website->save();
		Session::flash('website_create', 'Settings Create Successfully');
		return redirect('website');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $websiteDetails = Website::find($id);
        return response()->json($websiteDetails, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $websiteDetails = Website::find($id);
        //dd($sliderDetail->id);
        //exit();
        return view('website_settings.edit', compact('websiteDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'sitename_logo' => 'required|max:200',
            'facebook' => 'required|max:200',
            'linkedin' => 'required|max:200',
            'twitter' => 'required|max:200',
            'google_plus' => 'required'
        ]);
        
        $websiteDetails = Website::find($id);

        $fileNameToStore = $filenameWithExt = $filename = $extension = '';

        if($request->file('sitelogo')){
            //get filename with extension
            $filenameWithExt = $request->file('sitelogo')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('sitelogo')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('sitelogo')->StoreAs('/public/Website',$filenameWithExt);
        }
        $websiteDetails->sitename_logo = $request->input('sitename_logo');
        $websiteDetails->siteName = $request->input('siteName');
        $websiteDetails->sitelogo = $filenameWithExt;
        $websiteDetails->facebook = $request->input('facebook');
        $websiteDetails->google_plus = $request->input('google_plus');
        $websiteDetails->twitter = $request->input('twitter');
        $websiteDetails->linkedin = $request->input('linkedin');
        $websiteDetails->save();
        Session::flash('website_update', 'Website Settings Update Successfully');
		return redirect('website');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Website = Website::find($id);
        $Website->delete($id);
        
        //Log::info($Slider->id);
        
		if($Website)
			return response()->json(["message"=>"Website Settings Delete Successfully"],200);
		else
			return response()->json(["message"=>"Somthing went wrong"],400);
    }
    public function websiteList(){
        $websiteList = Website::all();
        // dd($websiteList);
        // exit;
        return Datatables::of($websiteList)
             ->make(true);
    }
}
