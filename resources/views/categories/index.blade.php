@extends('layouts.default') 
@section('title', 'Categories') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Categories</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <a>Categories</a>
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

                        <a class="" href="{{url('categories/create')}}">
                                <i class="fa fa-plus"></i>
                            </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="categoriesTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Parent Category</th>
                                    <th>Categories Name</th>
                                    <th>Categories Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Parent Category</th>
                                    <th>Categories Name</th>
                                    <th>Categories Image</th>
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
                <h4 class="modal-title">Show Categories</h4>
            </div>
            <div class="modal-body">

                <table>
                    <tr>
                        <td>{{ Form::label('id', 'Id:', array('class' => 'col-md-4 control-label')) }}</td>
                        <td>{{ Form::label('id', 'Id ', array('class' => 'col-md-8','id'=> 'id')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('catName', ' Cat_Name: ', array('class' => 'col-md-4 control-label')) }}</td>
                        <td>{{ Form::label('catName', ' Cat_Name ', array('class' => 'col-md-8','id'=> 'catName')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('catImg', ' Cat_Image: ', array('class' => 'col-md-4 control-label')) }}</td>
                        {{--
                        <td><img src="http://localhost/blog/public/storage/Categories/port1.jpg" width="50" height="50"></td>
                        --}}
                        <td>{{ Form::label('catImg', ' Cat_Image ', array('class' => 'col-md-8','id'=> 'catImg')) }}</td>
                    </tr>

                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
 @push("scripts") @if(Session::has('categories_update'))
<script>
    toastrDisplay("success","{{ Session::get('categories_update') }}");
</script>
@endif @if(Session::has('categories_create'))
<script>
    toastrDisplay("success","{{ Session::get('categories_create') }}");
</script>
@endif

<script>
    var oTable;
    $(document).ready(function(){
             oTable = $('#categoriesTable').dataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    responsive: true,
    stateSave: true,
    paginationType: "full_numbers",
    ajax: {
    url: "{{ url('categories/data') }}",
        data: function ( d ) {
          // var confVal = $('#confirmSel').val();
        //    console.log(confVal);
        //    d.myconfirmed = confVal;
        }
    },
    columns: [
        { data: 'id', name: 'id'},
        { data: 'pcategory.PcategoryName', name: 'pcategory.PcategoryName'},
        { data: 'catName', name: 'catName'},
        { data: 'catImg', name: 'catImg', render:function(o){
            //console.log(o);
            return '<img src="http://localhost/blog/public/storage/Categories/' + o + '" width="150px" height="150px" />';
        }},
        { data: null, orderable: false, searchable: false, render:function(o){
            $status = o.status;
        //    console.log(o.status + o.id);
           return $status == 0 ? '<div class="onoffswitch"><input type="checkbox" checked="" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>' : '<div class="onoffswitch"><input type="checkbox" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>';

            //return '<div class="onoffswitch"><input type="checkbox" checked="" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>';
            
        }},
        {data: null,  orderable: false, searchable: false,render:function(o){
        return '<a href="javascript:void(0);" data-toggle="modal" data-id="' + o.id + '" data-target="#mymodel" id="mymodel1"> <img src="{{ url("storage/images/view-icon.png")}}"> </a> <a href="categories/'+o.id+'/edit"> <img src="{{ url("storage/images/edit-icon.png")}}"> </a> <a href="javascript:void(0)" data-id="'+o.id+'" class="deleteadmin"> <img src="{{ url("storage/images/delete-icon.png")}}"> </i> </a>';
}}
    ]});
});

// $(document).on('change','.example1',function(){
// 		var id=$(this).data("id");
//         alert(id);
// });

$(document).on('click','.deleteadmin',function(){
		var id=$(this).data("id");
		var delAdmin = confirm("Do you want to delete Categories ?");
            if (delAdmin == true) {
                $.ajax({
                    type: "DELETE",
                    url: "{{url('categories')}}/"+id,
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
            url: "{!! url('categories') !!}/"+id,
            processData: false,
            cache: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#id').text(data.id);
                $('#catName').text(data.catName);
                $('#catImg').text(data.catImg);
		    }
        });
    });

</script>



@endpush