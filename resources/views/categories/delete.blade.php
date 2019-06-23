@extends('layouts.default')
@section('title', 'Delete')
@section('content')
{{-- <div class="row">
    <div class="col-md-6">
        <a href="{{ route('categories.index') }}" class="btn btn-info">Back to all tasks</a>
        <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-primary">Edit Task</a>
    </div> --}}
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['categories.destroy', $categories->id]
        ]) !!}
            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop