@extends('layouts.default')
@section('title', 'Main page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Slider</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('slider') }}">Slider</a>
            </li>
            <li class="active">
                Edit Slider
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Slider</h5>
                </div>
                <div class="ibox-content">
						<div class="row">
								<div class="col-md-6">
                {{  Form::model( $sliderDetail, ['method' => 'PUT', 'enctype' => 'multipart/form-data', 'route' => ['slider.update', $sliderDetail->id],"name"=>"editSlider"]) }}

                    @include('slider/_form')

                   <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ url('slider') }}" class="btn btn-danger">
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

@if(Session::has('addadminerr'))
    <script> toastrDisplay("error","{{ Session::get('addadminerr') }}"); </script>
@endif

<script type="text/javascript">
 $("form[name='editSlider']").validate({
             rules: {
               catName :"required",
               catImg:"required",
                 
             },
              messages:{
                catName: {required:"Categories Name is required"},
                catImg: {required:"Categories Image is required"},
             }
});
</script>
@endpush
