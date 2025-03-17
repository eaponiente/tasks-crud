<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\CreateTasksAction;
use App\Actions\Tasks\DeleteTasksAction;
use App\Actions\Tasks\GetTasksAction;
use App\Actions\Tasks\UpdateTasksAction;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Http\Requests\Tasks\DeleteTaskRequest;
use App\Http\Requests\Tasks\GetTaskRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetTaskRequest $request, GetTasksAction $action)
    {
        return $action->execute($request->validated());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request, CreateTasksAction $action)
    {
        $task = $action->execute($request->validated());

        return response()->json([
            'id' => $task->id
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id, UpdateTasksAction $action)
    {
        $task = Task::find($id);

        $action->execute($task, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTaskRequest $request, string $id, DeleteTasksAction $action)
    {
        $task = Task::find($id);

        $action->execute($task);
    }
}
