<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use Illuminate\Http\Request;
use stdClass;

class TasksController extends Controller
{
    // listar tareas
    public function index()
    {
        $tasks = TasksModel ::all();
        echo json_encode($tasks);
    }

    public function create(Request $request)
    {
        $task = new TasksModel();
        $task->task_name = $request->input('task_name');
        $task->task_description = $request->input('task_description');
        $task->id_stage = $request->input('id_stage');
        $task->status = $request->input('status');
        $task->created_at = $request->input('created_at');
        $task->updated_at = $request->input('updated_at');
        $task->save();
        echo json_encode($task);
    }

    public function update(Request $request)
    {
        $task = TasksModel::find($request->id_task);
        $task->task_name = $request->input('task_name');
        $task->task_description = $request->input('task_description');
        $task->id_stage = $request->input('id_stage');
        $task->status = $request->input('status');
        $task->created_at = $request->input('created_at');
        $task->updated_at = $request->input('updated_at');
        $task->save();
        echo json_encode($task);
    }
}
