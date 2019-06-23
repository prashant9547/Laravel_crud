@extends('layouts.default')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                {{-- <div class="card-header"> Dashboard </div> --}}
                
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-3">
                                 <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-success pull-right">Monthly</span>
                                        <h5> Total Orders </h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins">10</h1>
                                        {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                        {{-- <small>Total income</small> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                 <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-success pull-right">Monthly</span>
                                        <h5> Pending Orders </h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins">15</h1>
                                        {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                        {{-- <small>Total income</small> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                 <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-success pull-right">Monthly</span>
                                        <h5> Total Users </h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins">100</h1>
                                        {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                        {{-- <small>Total income</small> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                 <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-success pull-right">Monthly</span>
                                        <h5> Visits </h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins">1000</h1>
                                        {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                        {{-- <small>Total income</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- You are logged in! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push("scripts") 
    @if(Session::has('admin_login'))
        <script>
            toastrDisplay("success","{{ Session::get('admin_login') }}");
        </script>
    @endif
    @if(Session::has('reset_password'))
        <script>
            toastrDisplay("success","{{ Session::get('reset_password') }}");
        </script>
    @endif
@endpush
@endsection