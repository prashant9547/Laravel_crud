<?php

namespace App\Http\Controllers;
use Datatables;
use Session;
use Storage;
use File;
use Log;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newsletter.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // exit;
        $newsletter = Newsletter::find($id);
        $newsletter->delete($id);
        
        //Log::info($Slider->id);
        
		if($newsletter)
			return response()->json(["message"=>"Subscriber Delete Successfully"],200);
		else
			return response()->json(["message"=>"Subscriber went wrong"],400);
    }

    /**
     * get all data form database for this function
     */
    public function newsletterList(){
        
        //  dd($newsletterList);
        //  exit;
        
        $newsletterList = Newsletter::all();
            //to get all data from database using this method

        return Datatables::of($newsletterList)->make(true);
            //to return all data to datatables in cloumn

    }
}
