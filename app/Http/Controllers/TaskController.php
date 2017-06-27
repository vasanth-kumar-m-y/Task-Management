<?php 

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class TaskController extends Controller {

   public function __construct(TaskRepositoryInterface $taskRepoInterface)
   {
      $this->taskRepoInterface = $taskRepoInterface;
   }

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
      try{

        $tasks = $this->taskRepoInterface->getAllTasks();
        
        return view('tasks.index',compact('tasks'));

      }catch(Exception $e){

          $errorMessage = [
            'status'  => false,
            'message' => $e
          ];

        return $this->setStatusCode(500)->respondWithError($errorMessage);
      }
   }

   /**
    * Show the resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
      try{

        $task = $this->taskRepoInterface->getTask($id);

        return view('tasks.show',compact('task'));

      }catch(Exception $e){

        $errorMessage = [
          'status'  => false,
          'message' => $e
        ];

        return $this->setStatusCode(500)->respondWithError($errorMessage);
      }
   }

   /**
    * Create the resource.
    *
    * @return Response
    */
   public function create()
   {
     return view('tasks.create');
   }

  /**
   * Store a newly created resource in storage.
   *
   * @param  Array $request
   * @return Response
   */
  public function store(Request $request)
  {
    try{

      $task = $request->all();

      $validator = $this->taskRepoInterface->validateTask($task);

      if ($validator->fails()) {
            return redirect('tasks/create')
                        ->withErrors($validator)
                        ->withInput();
      }

      $this->taskRepoInterface->createOrUpdateTask($task, null);

      return redirect('tasks');

    }catch(Exception $e){

      $errorMessage = [
          'status'  => false,
          'message' => $e
      ];

      return $this->setStatusCode(500)->respondWithError($errorMessage);
    }
  }

  /**
    * Edit the resource.
    *
    * @param  int  $id
    * @return Response
    */
  public function edit($id)
  { 
    try{

      $task = $this->taskRepoInterface->getTask($id);

      return view('tasks.edit',compact('task'));

    }catch(Exception $e){

      $errorMessage = [
          'status'  => false,
          'message' => $e
      ];

      return $this->setStatusCode(500)->respondWithError($errorMessage);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  Array $request
   * @param  int   $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    try{

      $task = $request->all();

      $validator = $this->taskRepoInterface->validateTask($task);

      if ($validator->fails()) {
            return redirect('tasks/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
      }

      $this->taskRepoInterface->createOrUpdateTask($task, $id);

      return redirect('tasks');

    }catch(Exception $e){

      $errorMessage = [
          'status'  => false,
          'message' => $e
      ];

      return $this->setStatusCode(500)->respondWithError($errorMessage);
    }
  }

  /**
    * Destroy the resource.
    *
    * @param  int  $id
    * @return Response
  */
  public function destroy($id)
  {
    try{

      $this->taskRepoInterface->deleteTask($id);

      return redirect('tasks');

    }catch(Exception $e){

      $errorMessage = [
            'status'  => false,
            'message' => $e
        ];

      return $this->setStatusCode(500)->respondWithError($errorMessage);
    }
  }

}



?>