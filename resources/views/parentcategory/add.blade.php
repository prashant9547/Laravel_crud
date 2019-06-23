@extends('layouts.default') 
@section('title', 'Create ParentCategory') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Parent Category </h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('parent_category') }}">Parent Category</a>
            </li>
            <li class="active">
                Add Parent Category
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Parent Category</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::open(['route' => 'parent_category.store','name'=>'createPcate' ,'id'=>'createPcate','method'=>'post','enctype'=>'multipart/form-data'])
                            }}
    @include('parentcategory/_form')
                            <div class="form-group">
                                <button type="submit" id="add" name="add" class="btn btn-primary">
                                    Save
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
    
<script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>
<script>
    $("#status").on("change" , function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                $(this).val(0);
                // console.log(0);
                // alert("Checkbox is checked.");
            }
            else if($(this).is(":not(:checked)")){
                $(this).val(1);
                // console.log(1);
                // alert("Checkbox is unchecked.");
            }
        });
});
//    $(document).ready(function(){

//         $("#status").on("change" , function(){
//             if($(this).is(":checked")){
//                 $(this).val(0);
//                 $("#status").val(0);
//                 alert($("#status").val());
//                 console.log(0);
//             }
//             else if($(this).is(":not(:checked)")){
//                 $(this).val(1);
//                 alert($(this).val());
//                 console.log(1);
//             }
//         });
//     });
$("form[name='createPcate']").validate({
    rules: {
        PcategoryName:{
            required:true,
            maxlength:100
        }
    },
    messages:{
        PcategoryName: {
        required:"Parent category cann't be blank.",
        }
    }
});

$("#PcategoryName").css("text-transform","capitalize");
    </script>

@endsection

            
        