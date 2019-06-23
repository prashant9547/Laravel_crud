@extends('layouts.default')
@section('title', 'Edit Content Page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Content Page</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('contenetpage') }}">Content Page</a>
            </li>
            <li class="active">
                Edit Content Page
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Content Page</h5>
                </div>
                <div class="ibox-content">
						<div class="row">
								<div class="col-md-6">
                {{  Form::model( $contentpageDetail, ['method' => 'PUT','name'=>'add_contentpage' ,'id'=>'add_contentpage', 'enctype' => 'multipart/form-data', 'route' => ['contentpage.update', $contentpageDetail->id],"name"=>"editcontentpage"]) }}

                    @include('contentpage/_form')

                   <div class="form-group">

                                <button type="submit" id='submit_contentpageDetail' name="submit_contentpageDetail" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ url('contentpage') }}" class="btn btn-danger">
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

{{-- <script>
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
   </script> --}}
{{-- <script type="text/javascript">
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
</script> --}}
@endpush
