@extends('layout/template')

@section('content')
 <h1>Tasks</h1>
 <a href="{{url('/tasks/create')}}" class="btn btn-success">Create Task</a>
 <a href="{{ url('/')}}" class="btn btn-primary">Back</a>

 @if(!$tasks->isEmpty())
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>Name</th>
         <th>Description</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($tasks as $task)
         <tr>
             <td>{{ $task->id }}</td>
             <td>{{ $task->name }}</td>
             <td>{{ $task->description }}</td>
             <td><a href="{{url('tasks',$task->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('tasks.edit',$task->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['tasks.destroy', $task->id], 'id' => 'deleteForm']) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger deleteTask', 'id' => 'deleteTask']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach
     </tbody>
 </table>
@else
<h3>There are no tasks. Please Create Task.</h3>
@endif
  <!-- Modal -->
  <div id="confirm" class="modal fade">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body">
            Are you sure ?
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
          </div>
      </div>
      
    </div>
  </div>


<script>

$(document).ready(function(){

  $('.deleteTask').click(function(e){

    e.preventDefault();

    $('#confirm').modal('show').one('click', '#delete', function (e) {
        $('#deleteForm').submit();
    });

  }); 

});

</script>

@endsection

