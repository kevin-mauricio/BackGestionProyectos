<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compania;

class CompaniaController extends Controller
{
    public function index()
    {
        $companias = Compania::all();
        return response()->json($companias);
    }
}
