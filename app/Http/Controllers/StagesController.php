<?php

namespace App\Http\Controllers;

use App\Models\StagesModel;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index()
    {
        $stages = StagesModel::all();
        return response()->json($stages);
    }

    public function show($id)
    {
        $stage = StagesModel::find($id);
        if (!$stage) {
            return response()->json(['message' => 'Stage not found'], 404);
        }
        return response()->json($stage);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'stage_name' => 'required|max:255',
            'status' => 'required|boolean'
        ]);

        $stage = StagesModel::create($validatedData);
        return response()->json(['message' => 'Stage created successfully', 'stage' => $stage]);
    }

    public function update(Request $request, $id)
    {
        $stage = StagesModel::find($id);
        if (!$stage) {
            return response()->json(['message' => 'Stage not found'], 404);
        }

        $validatedData = $request->validate([
            'stage_name' => 'required|max:255',
            'status' => 'required|boolean'
        ]);

        $stage->update($validatedData);
        return response()->json(['message' => 'Stage updated successfully', 'stage' => $stage]);
    }

    public function destroy($id)
    {
        $stage = StagesModel::find($id);
        if (!$stage) {
            return response()->json(['message' => 'Stage not found'], 404);
        }

        $stage->status = 0;
        $stage->save();
        return response()->json(['message' => 'Stage deleted successfully']);
    }
}
