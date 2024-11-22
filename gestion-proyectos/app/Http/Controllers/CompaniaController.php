<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompaniaRequest;
use App\Http\Requests\UpdateCompaniaRequest;
use App\Models\Compania;
use Illuminate\Http\Request;

class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companias = Compania::paginate();
        return response()->json($companias);
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
    public function store(StoreCompaniaRequest $request)
    {
        $datos = $request->validated();
        $compania = Compania::create($datos);
        return response()->json($compania);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compania $compania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compania $compania)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaniaRequest $request, Compania $compania)
    {
        $compania->updateOrFail($request->all());
        return response()->json($compania, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compania $compania)
    {
        $compania->deleteOrFail();
        return response()->json(['message' => 'Compania borrada','compania' => $compania], 200);
    }
}
