@extends('layouts.default') 
@section('title', 'Update Role | Shopping-Elite') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>ROle</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('role') }}">Role</a>
            </li>
            <li class="active">
                Edit Role
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Role</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::model( $accountDetail, ['method' => 'PUT', 'enctype' => 'multipart/form-data', 'route' => ['role.update',
                            $accountDetail->id],"name"=>"editrole","id"=>"editrole"]) }}

                                @include('role/_form')

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    Update
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
        $("form[name='editrole']").validate({
             rules: {
                 roleName:{
                    required:true,
                    maxlength:50
        }
             },
              messages:{
                 roleName: {
                    required:"Role isn't blank",
         }
             }
    });
    </script>
@endpush