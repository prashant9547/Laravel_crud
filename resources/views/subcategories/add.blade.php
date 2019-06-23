@extends('layouts.default')
@section('title', 'Add SubCategories')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2> Categories </h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('subcategories') }}">SubCategories</a>
            </li>
            <li class="active">
                Add SubCategories
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add SubCategories</h5>
                </div>
                <div class="ibox-content">
					<div class="row">
						<div class="col-md-6">
                {{ Form::open(['route' => 'subcategories.store','name'=>'addsubcategories' ,'id'=>'addsubcategories','method'=>'post','enctype'=>'multipart/form-data']) }}

                    @include('subcategories/_form')

                   <div class="form-group">

                                <button type="submit" id="sub_add" name="sub_add"  class="btn btn-primary">
                                    Save
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

@if(Session::has('addsubcategories'))
    <script> toastrDisplay("error","{{ Session::get('subcategories') }}"); </script>
@endif

{{-- <script type="text/javascript">
$(document).ready(function(){
            var sub_catname = $('#sub_catName');
            var btn_add = $('#add');    
            var regexp = /^[a-zA-Z]+$/;      

            cat_name.on('keyup', function () {
                var empty = false
                if(sub_catname.val()  != '' && sub_catname.val().match(regexp) ) {
                    btn_add.prop('disabled', false);
                }else {
                    btn_add.prop({disabled: true});
                }
            }); 
        });
</script> --}}
@endpush
