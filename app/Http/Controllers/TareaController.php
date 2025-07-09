<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Services\TareaService;

class TareaController extends Controller
{

    protected TareaService $tareaService;

    public function __construct(TareaService $tareaService)
    {
        $this->tareaService = $tareaService;
    }

    public function index()
    {
        $tareas = Tarea::all();
        return response()->json($tareas);
    }
    public function store(StoreTareaRequest $request)
    {

        //$tarea = Tarea::create($request->validated());
        $tarea = $this->tareaService->store($request->validated());
        return response()->json($tarea, 201);
    }
    public function update(UpdateTareaRequest $request, $id)
    {
        $tarea = $this->tareaService->update($id, $request->validated());

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }
        return response()->json($tarea);
    }
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return response()->json(null, 204);
    }
}
