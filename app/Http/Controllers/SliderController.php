<?php

namespace App\Http\Controllers;
use Datatables;
// use Yajra\Datatables\Facades\Datatables;
use Session;
use Storage;
use File;
use Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.add');
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
            'slider_title' => 'required|max:200',
            'slider_caption' => 'required|max:200',
            'button_text' => 'required|max:200',
            'button_url' => 'required|max:200',
            'slider_img' => 'required'
        ]);
        
        if($request->file('slider_img')){
            //get filename with extension
            $filenameWithExt = $request->file('slider_img')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('slider_img')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('slider_img')->StoreAs('/public/Slider',$filenameWithExt);
        }
       
        $Slider = new Slider();
        $Slider->slider_title = $request->input('slider_title');
        $Slider->slider_caption = $request->input('slider_caption');
        $Slider->button_text = $request->input('button_text');
        $Slider->button_url = $request->input('button_url');
        $Slider->slider_img = $filenameWithExt;
        // dd($Slider);
        // exit;
        //Log::info($Categories);
       
        $Slider->save();
		Session::flash('slider_create', 'Slider Create Successfully');
		return redirect('slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // dd($request);
        // exit;
        $sliderDetail = Slider::find($id);
        return response()->json($sliderDetail, 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliderDetail = Slider::find($id);
        //dd($sliderDetail->id);
        //exit();
        return view('slider.edit', compact('sliderDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->input('slider_img'));
        // exit;
        
        $this->validate($request, [
            'slider_title' => 'required|max:200',
            'slider_caption' => 'required|max:200',
            'button_text' => 'required|max:200',
            'button_url' => 'required|max:200',
            'slider_img' => 'required'
        ]);

        $sliderDetail = Slider::find($id);
        // dd($sliderDetail);
        // exit;
        
        $fileNameToStore = $filenameWithExt = $filename = $extension = '';

        if($request->file('slider_img')){
            //get filename with extension
            $filenameWithExt = $request->file('slider_img')->getClientOriginalName();
            // dd($filenameWithExt);
            // exit;

            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('slider_img')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'-'.time().'.' . $extension;

            //upload cover_image
            $destinationPath = $request->file('slider_img')->StoreAs('/public/Slider',$filenameWithExt);
            // dd($destinationPath);
            // exit;
        }
       
        // $Slider = new Slider();
        $sliderDetail->slider_title = $request->input('slider_title');
        $sliderDetail->slider_caption = $request->input('slider_caption');
        $sliderDetail->slider_img = $filenameWithExt;
        $sliderDetail->button_text = $request->input('button_text');
        $sliderDetail->button_url = $request->input('button_url');
        $sliderDetail->save();
        
        //$input = $request->all();
        // dd($destinationPath);
        // exit;
        //Log::info($Categories);
        
        //$sliderDetail->fill($input)->save();
        // dd($input);
        // exit;
        // $Slider->save();
		Session::flash('slider_update', 'Slider Update Successfully');
		return redirect('slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slider = Slider::find($id);
        $Slider->delete($id);
        
        //Log::info($Slider->id);
        
		if($Slider)
			return response()->json(["message"=>"Slider Delete Successfully"],200);
		else
			return response()->json(["message"=>"Somthing went wrong"],400);
    }
    public function sliderList(){
        $sliderList = Slider::all();
        // dd($sliderList);
        // exit;
         return Datatables::of($sliderList)
             ->make(true);

    }
}
