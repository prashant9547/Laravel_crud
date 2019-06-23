@extends('layouts.default') 
@section('title', 'Delete ParentCategory | Shopping Elite') 
@section('content')
<div class="col-md-6 text-right">
    {!! Form::open([ 'method' => 'DELETE', 'route' => ['parent_category.destroy', $Parentcategory->id] ]) !!} {!! Form::submit('Delete
    this task?', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!}
</div>
</div>


@stop