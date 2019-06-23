@extends('layouts.default')
@section('title', 'Add Categories')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2> Categories </h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('categories') }}">Categories</a>
            </li>
            <li class="active">
                Add Categories
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Categories</h5>
                </div>
                <div class="ibox-content">
					<div class="row">
						<div class="col-md-6">
                {{ Form::open(['route' => 'categories.store','name'=>'addcategories' ,'id'=>'addcategories','method'=>'post','enctype'=>'multipart/form-data']) }}

                    @include('categories/_form')

                   <div class="form-group">

                                <button type="submit" id="add" name="add" class="btn btn-primary" disabled>
                                    Save
                                </button>
                                <a href="{{ url('categories') }}" class="btn btn-danger">
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

@if(Session::has('addcategories'))
    <script> toastrDisplay("error","{{ Session::get('categories') }}"); </script>
@endif

<script type="text/javascript">
 $(document).ready(function(){
            var cat_name = $('#catName');
            var btn_add = $('#add');    
            var regexp = /^[a-zA-Z]+$/;      

            cat_name.on('keyup', function () {
                var empty = false
                if(cat_name.val()  != '' && cat_name.val().match(regexp) ) {
                    btn_add.prop('disabled', false);
                }else {
                    btn_add.prop({disabled: true});
                }
            }); 
        });
</script>

@endpush
