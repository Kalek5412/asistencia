<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Miembro;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $departamentos=Departamento::all();
        $miembros=Miembro::all();
        $usuarios=User::all();
        return view('index',['departamentos'=>$departamentos,'miembros'=>$miembros,'usuarios'=>$usuarios]);
    }
}
