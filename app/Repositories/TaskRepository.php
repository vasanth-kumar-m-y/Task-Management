<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TaskRepository implements TaskRepositoryInterface{

	public function getAllTasks()
	{
		return Task::all();
	}

	public function getTask($id)
	{
		return Task::find($id);
	}

	public function validateTask($task)
	{

      	return $validator = Validator::make($task, [
					            'name'        => 'required|max:100',
					            'description' => 'required|max:200'
					        ]);
	}

	public function createOrUpdateTask($task, $id)
	{
	 	if(is_null($id)) {
	 	    return Task::create($task);
	 	}else{
	 	    $taskUpdate = Task::find($id);
            return $taskUpdate->update($task);
	 	}
	}

	public function deleteTask($id)
	{
		return Task::find($id)->delete();
	}

}
