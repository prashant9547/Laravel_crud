@extends('layouts.default') 
@section('title', 'Create Role') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2> Role </h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('role') }}">Role</a>
            </li>
            <li class="active">
                Add Role
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Role</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::open(['route' => 'role.store','name'=>'creatRole' ,'id'=>'creatRole','method'=>'post','enctype'=>'multipart/form-data'])
                            }}
    @include('role/_form')
                            <div class="form-group">
                                <button type="submit" id="add" name="add" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="{{ url('role') }}" class="btn btn-danger">
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
        $("form[name='creatRole']").validate({
             rules: {
                 roleName:{
                    required:true,
                    maxlength:50
        }
             },
              messages:{
                roleName: {
                equired:"Role isn't blank",
         }
             }
    });
    </script>

@endsection

            
        