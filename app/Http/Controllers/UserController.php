<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $usuarios=User::all();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
     }

    public function store(Request $request)
    {
        $usuario=new User();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request['password']);
        $usuario->estado='1';
        $usuario->fecha_ingreso=date($format='Y-m-d');
        $usuario->save();
    
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Se registro de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario=User::findOrFail($id);
        //return response()->json($miembro);
        return view('usuarios.show',['usuario'=>$usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('usuarios.edit',['usuario'=>$usuario]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    
    {
        //22.50
        $usuario=User::findOrFail($id);
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request['password']);
        //$usuario->estado='1';
        $usuario->fecha_ingreso=date($format='Y-m-d');
        $usuario->save();
    
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Se actualizo de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //$usuario=User::find($id);
        
        User::destroy($id);
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Se elimino de manera correcta')
        ->with('icono', 'success');
    }
}
