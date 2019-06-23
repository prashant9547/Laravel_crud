@extends('layouts.default')
@section('title', 'Add Website Settings')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2> Slider </h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('website') }}"> Website Settings </a>
            </li>
            <li class="active">
                Add Website Settings
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Website Settings</h5>
                </div>
                <div class="ibox-content">
					<div class="row">
						<div class="col-md-6">
                {{ Form::open(['route' => 'website.store','name'=>'add_website' ,'id'=>'add_website','method'=>'post','enctype'=>'multipart/form-data']) }}

                    @include('website_settings/_form')

                   <div class="form-group">

                                <button type="submit" id="submit_website" name="submit_website" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="{{ url('website') }}" class="btn btn-danger">
                                    Cancel
                                </a>
                         </div>
				{{ Form::close() }}
			</div>
		</div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push("scripts")

@if(Session::has('add_website'))
    <script> toastrDisplay("error","{{ Session::get('website') }}"); </script>
@endif
<script>
     $(document).ready(function(){
        $("#sitename_logo").change(function () {
             var selectedValue = $(this).val();
             console.log(selectedValue);
            var x = $("#sitename_logo option:selected").val();
            if(x == 'name'){
                $('#sname').show();
                $('#slogo').hide();
            }
            if(x == 'logo'){
                $('#sname').hide();
                $('#slogo').show();
            }
            if(x == 'name & logo'){
                $('#sname').show();
                $('#slogo').show();

            }
        });
     });
    </script>

{{-- <script type="text/javascript">
 $(document).ready(function(){
            var slider_Title = $('#slider_title');
            var slider_Caption = $('#slider_caption');
            var button_Text = $('#button_text');
            var button_Url = $('#button_url');    
            var slider_Img = $('#slider_img');   
            var btn_submit = $('#submit_website');
            var regexp = /^[a-zA-Z]+$/;  

            slider_Title.on('keyup',function(){
                console.log(slider_Title.val()); 
                var empty = false
            });
            slider_Caption.on('keyup',function(){
                console.log(slider_Caption.val());    
                var empty = false
            });
            button_Text.on('keyup',function(){
                console.log(button_Text.val());   
                var empty = false
            });
            button_Url.on('keyup',function(){
                console.log(button_Url.val());  
                var empty = false
            });
            slider_Img.on('keyup', function () {
                
                // var empty = false
                if(slider_Title.val() && 
                    slider_Caption.val() && 
                    button_Text.val() && 
                    button_Url.val() != '' ) {
                        btn_submit.prop('disabled', false);
                }else {
                    btn_submit.prop('disabled', true);
                }
            }); 
        });
</script> --}}

@endpush
