<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface
{


	/**
     * get all the tasks
     *
     * @return Response
     */
    public function getAllTasks();

    /**
     * get task based on id
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getTask($id);

    /**
     * Create or Update the task
     *
     * @param  Array $request
     * @param  int   $id
     *
     * @return Response
     */
    public function createOrUpdateTask($task, $id);

    /**
     * Destroy the task
     *
     * @param  int $id
     *
     * @return Response
     */
    public function deleteTask($id);
	
}