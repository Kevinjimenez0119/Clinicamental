<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\EditUserRequest;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct()
 {
    
        $this->middleware('auth');

    
    
 }
    public function index(Request $request)
    {
        
        
        $id=auth()->user()->id;
        
        $ver = DB::table('role_user')->where('user_id', $id)->value('role_id');
        if($ver==2)
        {
            echo '<script language="javascript">alert("No eres administrador");</script>';
            
            $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
            return view('doctores.index', ['pacientes' => $pacientes]);
            
           
        

        }else{
            
            
            $query = trim($request->get('search'));
            if($request)
            {
                $users = User::where('name', 'LIKE', '%' . $query . '%')->get();
                return view('usuarios.index', ['users' => $users, 'search' => $query]);
    
            }

        }
        
    //$users = User::all();
        //return view('usuarios.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=auth()->user()->id;
        
        $ver = DB::table('role_user')->where('user_id', $id)->value('role_id');
        if($ver==2)
        {
            echo '<script language="javascript">alert("No eres administrador");</script>';
            
            $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
            return view('doctores.index', ['pacientes' => $pacientes]);
            
           
        

        }else{
        $roles = Role::all();
        return view('usuarios.create', ['roles' => $roles]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $usuario =new User();

        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->identificacion = request('id');
        $usuario->password = Hash::make(request('password'));
        $usuario->apellidos = request('apellido');
        $usuario->genero = request('genero');
        $usuario->telefono = request('telefono');
        $usuario->horario = request('horario');
     

       

        $usuario->save();

        $usuario->asignarrol($request->get('rol'));

        echo '<script language="javascript">alert("El doctor ha sido registrado exitosamente");</script>';
        

        $users = User::all();
        return view('usuarios.index', ['users' => $users]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=auth()->user()->id;
        
        $ver = DB::table('role_user')->where('user_id', $id)->value('role_id');
        if($ver==2)
        {
            echo '<script language="javascript">alert("No eres administrador");</script>';
            
            $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
            return view('doctores.index', ['pacientes' => $pacientes]);
            
           
        

        }else{
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=auth()->user()->id;
        
        $ver = DB::table('role_user')->where('user_id', $id)->value('role_id');
        if($ver==2)
        {
            echo '<script language="javascript">alert("No eres administrador");</script>';
            
            $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
            return view('doctores.index', ['pacientes' => $pacientes]);
            
           
        

        }else{
        return view('usuarios.edit', ['user' => User::findOrFail($id)]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->apellidos = request('apellido');
        $usuario->genero = request('genero');
        $usuario->telefono = request('telefono');
        $usuario->horario = request('horario');
        

        $usuario->update();
        echo '<script language="javascript">alert("El doctor ha sido actualizado correctamente");</script>';

        $users = User::all();
        return view('usuarios.index', ['users' => $users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ver = DB::table('pacientes')->where('id_doctor', $id)->value('id_doctor');
        if($ver==$id)
        {
            echo '<script language="javascript">alert("El doctor seleccionado tiene pacientes");</script>';
            
            $users = User::all();
        return view('usuarios.index', ['users' => $users]);
            
           
        

        }else{

        $usuario = User::findOrFail($id);
        $usuario->delete();
        $users = User::all();
        return view('usuarios.index', ['users' => $users]);}
    }
}
