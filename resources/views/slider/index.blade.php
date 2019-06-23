@extends('layouts.default')
@section('title', 'Slider')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Slider </h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <a> Slider </a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5></h5>
                    <div class="ibox-tools">
                   
                        <a class="" href="{{url('slider/create')}}">
                                <i class="fa fa-plus"></i>
                            </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="slider_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Slider Title</th>
                                    <th>Slider Caption</th>
                                    <th>Slider Imgage</th>
                                    <th>Button Text</th>
                                    <th>Button Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Slider Title</th>
                                    <th>Slider Caption</th>
                                    <th>Slider Imgage</th>
                                    <th>Button Text</th>
                                    <th>Button Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mymodel" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <strong><h4 class="modal-title"> Show Slider </h4></strong>
            </div>
            <div class="modal-body">

                <table>
                    <tr>
                        <td>{{ Form::label('id', 'Id-: ', array('class' => 'col-md-5 control-label')) }}</td>
                        <td>{{ Form::label('id', 'Id ', array('class' => 'col-md-7','id'=> 'id')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('slider_title', ' SliderTitle-: ', array('class' => 'col-md-5 control-label')) }}</td>
                        <td>{{ Form::label('slider_title', ' SliderTitle ', array('class' => 'col-md-7','id'=> 'slider_title')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('slider_caption', ' SliderCaption-: ', array('class' => 'col-md-5 control-label')) }}</td>
                        <td>{{ Form::label('slider_caption', ' sliderCaption ', array('class' => 'col-md-7','id'=> 'slider_caption')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('button_text', ' ButtonText-: ', array('class' => 'col-md-5 control-label')) }}</td>
                        <td>{{ Form::label('button_text', ' ButtonText ', array('class' => 'col-md-7','id'=> 'button_text')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('button_url', ' ButtonUrl-: ', array('class' => 'col-md-5 control-label')) }}</td>
                        <td>{{ Form::label('button_url', ' ButtonUrl', array('class' => 'col-md-7','id'=> 'button_url')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('slider_img', ' SliderImg-: ', array('class' => 'col-md-5 control-label')) }}</td>
                        <td>{{ Form::label('$slide_img', ' SliderImg ', array('class' => 'col-md-7','id'=> 'slider_img')) }}</td>
                    </tr>

                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove '></span> Close
                        </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push("scripts")

 @if(Session::has('slider_update'))
	<script>
		toastrDisplay("success","{{ Session::get('slider_update') }}");
	</script>
 @endif

 @if(Session::has('slider_create'))
	<script>
		toastrDisplay("success","{{ Session::get('slider_create') }}");
	</script>
 @endif

<script>


	var oTable;
    $(document).ready(function(){
             oTable = $('#slider_table').dataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    responsive: true,
    stateSave: true,
    paginationType: "full_numbers",
    ajax: {
    url: "{{ url('slider/data') }}",
        data: function ( d ) {
          // var confVal = $('#confirmSel').val();
        //    console.log(confVal);
        //    d.myconfirmed = confVal;
        }
    },
    columns: [
        { data: 'id', name: 'id'},
        { data: 'slider_title', name: 'slider_title'},
        { data: 'slider_caption', name: 'slider_caption'},
        
        { data: 'slider_img', name: 'slider_img', render:function(o){
            //console.log(o);
            return '<img src="http://localhost/blog/public/storage/Slider/' + o + '" width="150px" height="150px" />';
        }},
        { data: 'button_text', name: 'button_text'},
        { data: 'button_url', name: 'button_url'},
        { data: null, orderable: false, searchable: false, render:function(o){
            $status = o.status;
        //    console.log(o.status + o.id);
           return $status == 0 ? '<div class="onoffswitch"><input type="checkbox" checked="" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>' : '<div class="onoffswitch"><input type="checkbox" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>';

            //return '<div class="onoffswitch"><input type="checkbox" checked="" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>';
            
        }},
        {data: null,  orderable: false, searchable: false,render:function(o){
        return '<a href="javascript:void(0);" data-toggle="modal" data-id="' + o.id + '" data-target="#mymodel" id="mymodel1"> <img src="{{ url("storage/images/view-icon.png")}}"> </a> <a href="slider/'+o.id+'/edit"> <img src="{{ url("storage/images/edit-icon.png")}}"> </a> <a href="javascript:void(0)" data-id="'+o.id+'" class="sliderDelete"> <img src="{{ url("storage/images/delete-icon.png")}}"> </i> </a>';
}}
    ]});
});

$(document).on('change','.example1',function(){
		var id=$(this).data("id");
        alert(id);
});

$(document).on('click','.sliderDelete',function(){
		var id=$(this).data("id");
		var delAdmin = confirm("Do you want to delete Slider ?");
            if (delAdmin == true) {
                $.ajax({
                    type: "DELETE",
                    url: "{{url('slider')}}/"+id,
                    headers: {
                        "X-CSRF-TOKEN":"{{ csrf_token() }}"
                    },
                    success: function (data) {

						toastrDisplay("success",data.message);
						oTable.fnDraw(false);
                    },
                    error: function (xhr, status, error) {
						toastrDisplay("error","Something went wrong");
                    }
                });
            }
});

$(document).on('click','#mymodel1', function() {
    var id = $(this).data("id");
        $.ajax({
            type: 'GET',
            url: "{!! url('slider') !!}/"+id,
            processData: false,
            cache: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#id').text(data.id);
                $('#slider_title').text(data.slider_title);
                $('#slider_caption').text(data.slider_caption);
                $('#button_text').text(data.button_text);
                $('#button_url').text(data.button_url);
                $('#slider_img').text(data.slider_img);

		    }
        });
    });
</script>
        

@endpush