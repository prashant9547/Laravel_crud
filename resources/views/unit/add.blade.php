@extends('layouts.default') 
@section('title', 'Create Unit') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2> Unit </h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('unit') }}">Unit</a>
            </li>
            <li class="active">
                Add Unit
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Unit</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::open(['route' => 'unit.store','name'=>'creatUnit' ,'id'=>'creatUnit','method'=>'post','enctype'=>'multipart/form-data'])
                            }}
    @include('unit/_form')
                            <div class="form-group">
                                <button type="submit" id="add" name="add" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="{{ url('unit') }}" class="btn btn-danger">
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
    
<script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>
<script>
        $("form[name='creatUnit']").validate({
             rules: {
                 unitName:{
                required:true,
                maxlength:50
        }
             },
              messages:{
                unitName: {
            required:"Unit isn't blank",
         }
             }
    });
    </script>

@endsection

            
        