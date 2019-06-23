@extends('layouts.default') 
@section('title', 'Update ParentCategory | Shopping-Elite') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Parent Category</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('parent_category') }}">Parent Categories</a>
            </li>
            <li class="active">
                Edit Parent Category
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Parent Category</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::model( $accountDetail, ['method' => 'PUT', 'enctype' => 'multipart/form-data', 'route' => ['parent_category.update',
                            $accountDetail->id],"name"=>"editPcate","id"=>"editPcate"]) }}

                                @include('parentcategory/_form')

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ url('parent_category') }}" class="btn btn-danger">
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
 @push("scripts") @if(Session::has('addadminerr'))
<script>
    toastrDisplay("error","{{ Session::get('addadminerr') }}");
</script>
@endif 
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>
<script>
        $("form[name='editPcate']").validate({
             rules: {
                 PcategoryName:{
                    required:true,
                    maxlength:100
        }
             },
              messages:{
                 PcategoryName: {
                    required:"Parent category isn't blank",
         }
             }
    });
    </script>
@endpush