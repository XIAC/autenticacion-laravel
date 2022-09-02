<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
class CategoriaController extends Controller
{
    //
    public function getCategorias(){
        return response()->json(categoria::all(), 200);
    }
    
}
