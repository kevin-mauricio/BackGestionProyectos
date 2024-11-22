<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoriaRequest;
use App\Models\HistoriaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HistoriaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiaUser = Auth::user()->compania_id;

        $historias = HistoriaUsuario::whereHas('proyecto', function ($query) use ($companiaUser) {
            $query->where('compania_id', $companiaUser);
        })->with('proyecto')->get();

        return response()->json($historias);
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
    public function store(HistoriaRequest $request)
    {
        $data = $request->validated();

        $historiaUsuario = HistoriaUsuario::create($data);

        return response()->json($historiaUsuario, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoriaUsuario $historia)
    {
        $companiaUser = Auth::user()->compania_id;

        $historia = HistoriaUsuario::where('id', $historia->id)
        ->whereHas('proyecto', function ($query) use ($companiaUser) {
            $query->where('compania_id', $companiaUser);
        })
        ->with('proyecto')
        ->firstOrFail();

        return response()->json($historia);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoriaUsuario $historiaUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HistoriaRequest $request, HistoriaUsuario $historia)
    {
        $data = $request->validated();
        $historia->update($data);
        return response()->json($historia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoriaUsuario $historia)
    {
        $historia->deleteOrFail();
        return response()->json($historia);
    }
}
