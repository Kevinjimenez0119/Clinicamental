<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Contacto;
use App\Models\Historiaclinica;
use App\Models\Tratamiento;
use App\Models\Vital;
use App\Models\Sintoma;
use App\Models\Traslado;
use App\Models\User;
use DB;

class TrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        
        $ver = DB::table('role_user')->where('user_id', $id)->value('role_id');
        if($ver==2)
        {
            echo '<script language="javascript">alert("No eres administrador");</script>';
            
            $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
            return view('doctores.index', ['pacientes' => $pacientes]);
            
           
        

        }else{
        
        $traslados = Traslado::all();
        return view('traslados.index', ['traslados' => $traslados]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        return view('traslados.edit', ['paciente' => Paciente::findOrFail($id)], ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $paciente = Paciente::findOrFail($id);

        $paciente->id_doctor = $request->get('id_doctor_act'); 

        $paciente->update();

        $traslado =new Traslado();

        $traslado->id_paciente = request('id_paciente');
        $traslado->nombre_paciente = request('name');
        $traslado->id_doctor_ant = request('id_doctor_ant');
        $traslado->nombre_doctor_ant = request('name_doc');
        $traslado->id_doctor_act = request('id_doctor_act');

        $traslado->save();

        echo '<script language="javascript">alert("Traslado exitoso");</script>';

        $id=auth()->user()->id;
        $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
        return view('doctores.index', ['pacientes' => $pacientes]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
