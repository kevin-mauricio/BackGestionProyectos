<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiaUser = Auth::user()->compania_id;

        $tickets = Ticket::whereHas('historiaUsuario.proyecto', function ($query) use ($companiaUser) {
            $query->where('compania_id', $companiaUser);
        })->with(['historiaUsuario.proyecto'])->get();

        return response()->json($tickets);
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
    public function store(StoreTicketRequest $request)
    {
        /* $companiaUser = Auth::user()->compania_id;
        $historiaUsuario = HistoriaUsuario::where('id', $request->historia_usuario_id)
            ->whereHas('proyecto', function ($query) use ($companiaUser) {
                $query->where('compania_id', $companiaUser);
            })
            ->first();

        if (!$historiaUsuario) {
            return response()->json(['error' => 'La historia de usuario no pertenece a tu compañía.'], 403);
        } */

        $ticket = Ticket::create($request->validated());
        return response()->json($ticket, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        /* $companiaUser = Auth::user()->compania_id;

        if ($ticket->historiaUsuario->proyecto->compania_id !== $companiaUser) {
            return response()->json(['error' => 'No tienes permisos para ver este ticket.'], 403);
        } */

        $ticket->load('historiaUsuario.proyecto');

        return response()->json($ticket, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        /* $companiaUser = Auth::user()->compania_id;

        if (!$ticket->historiaUsuario->proyecto->compania_id === $companiaUser) {
            return response()->json(['error' => 'No tienes permisos para actualizar este ticket.'], 403);
        } */

        $ticket->update($request->validated());
        return response()->json($ticket, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        /* $companiaUser = Auth::user()->compania_id;

        if ($ticket->historiaUsuario->proyecto->compania_id !== $companiaUser) {
            return response()->json(['error' => 'No tienes permisos para eliminar este ticket.'], 403);
        } */

        $ticket->delete();
        return response()->json(['message' => 'Ticket eliminado con éxito.'], 200);
    }
}
