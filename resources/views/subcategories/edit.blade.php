@extends('layouts.default')
@section('title', 'Main page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Categories</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('subcategories') }}">Categories</a>
            </li>
            <li class="active">
                Edit Sub Categories
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Sub Categories</h5>
                </div>
                <div class="ibox-content">
						<div class="row">
								<div class="col-md-6">
                {{  Form::model( $accountDetail, ['method' => 'PUT', 'enctype' => 'multipart/form-data', 'route' => ['subcategories.update', $accountDetail->id],"name"=>"editsubcategories"]) }}

                    @include('subcategories/_form')

                   <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ url('subcategories') }}" class="btn btn-danger">
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
 $("form[name='editsubcategories']").validate({
             rules: {
               sub_catName :"required",
               sub_catImg:"required",
                 
             },
              messages:{
                sub_catName: {required:"Sub Categories Name is required"},
                sub_catImg: {required:"Sub Categories Image is required"},
             }
});
</script>
@endpush
