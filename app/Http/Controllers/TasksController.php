<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    // listar tareas
    public function index()
    {
        $tasks = TasksModel::all();
        echo json_encode($tasks);
    }

    public function show($id)
    {
        $task = TasksModel::find($id);
        if (!$task) {
            return response()->json(["message" => "Tarea no encontrada"], 404);
        }
        return response()->json([
            "message" => "Tarea encontrada",
            "task" => $task
        ], 200);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'task_name' => 'required|max:255',
            'task_description' => 'required',
        ]);

        // Asigna valores por defecto si 'id_stage' o 'status' no están presentes
        $id_stage = $request->get('id_stage', 0); // 0 si no se proporciona 'id_stage'
        $status = $request->get('status', 1); // 1 si no se proporciona 'status'

        // Agrega 'id_stage' y 'status' a los datos validados
        $validatedData['id_stage'] = $id_stage;
        $validatedData['status'] = $status;

        $task = TasksModel::create($validatedData);

        return response()->json([
            "message" => "Tarea creada con éxito",
            "task" => $task
        ], 200);
    }

    public function update(Request $request, $id)
    {
        // Encuentra la tarea usando el ID de la URL
        $task = TasksModel::find($id);
        if (!$task) {
            return response()->json(["message" => "Tarea no encontrada"], 404);
        }

        // Reglas de validación
        $rules = [
            'task_name' => 'required|max:255',
            'task_description' => 'required',
        ];

        // Validación manual
        $validator = Validator::make($request->all(), $rules);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return response()->json([
                "message" => $validator->errors()
            ], 422);
        }

        // Asigna valores por defecto si 'id_stage' o 'status' no están presentes
        $task->id_stage = $request->get('id_stage', $task->id_stage); // Valor actual si no se proporciona
        $task->status = $request->get('status', $task->status); // Valor actual si no se proporciona

        // Actualiza los otros campos
        $task->task_name = $request->input('task_name');
        $task->task_description = $request->input('task_description');

        // Laravel actualiza 'updated_at' automáticamente
        $task->save();

        return response()->json([
            "message" => "Tarea actualizada con éxito",
            "task" => $task
        ], 200);
    }

    public function destroy($id)
    {
        // Encuentra la tarea usando el ID de la URL
        $task = TasksModel::find($id);
        if (!$task) {
            return response()->json(["message" => "Tarea no encontrada"], 404);
        }

        $task->status = 0;
        $task->save();

        return response()->json([
            "message" => "Tarea eliminada con éxito"
        ], 200);
    }
}
