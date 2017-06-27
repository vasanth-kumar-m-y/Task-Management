@extends('layout.template')
@section('content')

    <h1>Update Task</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($task,['method' => 'PATCH','route'=>['tasks.update',$task->id]]) !!}
    <div class="form-group">
        {!! Form::label('Name', 'Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <div class="col-sm-2">
           {!! Form::submit('Update', ['class' => 'btn btn-success form-control']) !!}
        </div>
        <div class="col-sm-2">
            <a href="{{ url('tasks')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
    {!! Form::close() !!}
@stop