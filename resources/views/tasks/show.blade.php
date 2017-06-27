@extends('layout/template')
@section('content')
    <h1>Read Task</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$task->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder={{$task->description}} readonly>
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('tasks')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop