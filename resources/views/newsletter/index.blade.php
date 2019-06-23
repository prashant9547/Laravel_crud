@extends('layouts.default')
@section('title', 'Newsletter')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Newsletter </h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <a> Newsletter </a>
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
                   
                        {{-- <a class="" href="{{url('slider/create')}}">
                                <i class="fa fa-plus"></i>
                            </a> --}}
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="newsletterTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
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
             oTable = $('#newsletterTable').dataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    responsive: true,
    stateSave: true,
    paginationType: "full_numbers",
    ajax: {
    url: "{{ url('newsletter/data') }}",
        data: function ( d ) {
          // var confVal = $('#confirmSel').val();
        //    console.log(confVal);
        //    d.myconfirmed = confVal;
        }
    },
    columns: [
        { data: 'id', name: 'id'},
        { data: 'email', name: 'email'},
        { data: null, orderable: false, searchable: false, render:function(o){
            $status = o.status;
        //    console.log(o.status + o.id);
           return $status == 0 ? '<div class="onoffswitch"><input type="checkbox" checked="" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>' : '<div class="onoffswitch"><input type="checkbox" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>';

            //return '<div class="onoffswitch"><input type="checkbox" checked="" class="onoffswitch-checkbox" id="'+o.id+'"><label class="onoffswitch-label" for="'+o.id+'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>';
            
        }},
        { data: 'created_at', name: 'created_at'},
        {data: null,  orderable: false, searchable: false,render:function(o){
        return '<a href="javascript:void(0)" data-id="'+o.id+'" class="newsletterDelete"> <img src="{{ url("storage/images/delete-icon.png")}}"> </i> </a>';
}}
    ]});
});


$(document).on('click','.newsletterDelete',function(){
		var id=$(this).data("id");
		var delAdmin = confirm("Do you want to delete Subcraber ?");
            if (delAdmin == true) {
                $.ajax({
                    type: "DELETE",
                    url: "{{url('newsletter')}}/"+id,
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


</script>
        

@endpush