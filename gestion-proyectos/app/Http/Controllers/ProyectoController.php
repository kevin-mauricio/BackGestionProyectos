<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyectoRequest;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiaUser = Auth::user()->compania_id;
        $proyectos = Proyecto::with('compania')->where('compania_id',$companiaUser)->get();
        return response()->json($proyectos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProyectoRequest $request)
    {
        $data = $request->validated();

        $companiaUser = Auth::user()->compania_id;
        $data['compania_id'] = $companiaUser;;

        $proyecto = Proyecto::create($data);

        return response()->json($proyecto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        /* $proyecto->load('compania') */;
        $companiaUser = Auth::user()->compania_id;
        $proyecto = Proyecto::with('compania')->where('compania_id',$companiaUser)->findOrFail($proyecto->id);
        return response()->json($proyecto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProyectoRequest $request, Proyecto $proyecto)
    {
        $companiaUser = Auth::user()->compania_id;

        if ($proyecto->compania_id !== $companiaUser) {
            return response()->json(['error' => 'No tienes permisos para editar este proyecto.'], 403);
        }

        $validatedData = $request->validated();
        $proyecto->update($validatedData);

        return response()->json($proyecto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $companiaUser = Auth::user()->compania_id;
        if ($proyecto->compania_id !== $companiaUser) {
            return response()->json(['error' => 'No tienes permisos para eliminar este proyecto.'], 403);
        }
        $proyecto->delete();
        return response()->json(['message' => 'Proyecto eliminado con éxito.'], 200);
    }
}
