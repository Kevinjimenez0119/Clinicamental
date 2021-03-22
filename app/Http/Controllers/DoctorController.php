<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Contacto;
use App\Models\Historiaclinica;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Requests\DoctorFormRequest;
use App\Http\Requests\EditDoctorRequest;

class DoctorController extends Controller
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

    public function index()
    {
        
        $id=auth()->user()->id;
        $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
        //$pacientes = Paciente::where("id_doctor","=",1);
        return view('doctores.index', ['pacientes' => $pacientes]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorFormRequest $request)
    {

        $ver = DB::table('pacientes')->where('identificacion', request('id'))->value('identificacion');
        if($ver == request('id'))
        {
            echo '<script language="javascript">alert("El paciente ya esta registrado");</script>';
            $id=auth()->user()->id;
            $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
            return view('doctores.index', ['pacientes' => $pacientes]);



        }else{
            $paciente =new Paciente();

        $paciente->name = request('name');
        $paciente->identificacion = request('id');
        $paciente->email = request('email');
        $paciente->identificacion = request('id');
        $paciente->password = Hash::make(request('password'));
        $paciente->apellidos = request('apellido');
        $paciente->genero = request('genero');
        $paciente->ocupacion = request('ocupacion');
        $paciente->id_doctor = request('id_doctor');
     

       

        $paciente->save();

        $contacto =new Contacto();
        $contacto->telefono = request('telefono');
        $contacto->direccion = request('dir');
        $contacto->ciudad = request('ciudad');
        $contacto->recidencia = request('recid');
        $contacto->id_paciente = request('id');

        $contacto->save();

       
        echo '<script language="javascript">alert("El paciente ha sido registrado exitosamente");</script>';

        $id=auth()->user()->id;
        $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
        return view('doctores.index', ['pacientes' => $pacientes]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
        $historiaclinicas = DB::table('historiaclinicas')->where('id_paciente', $id)->get();
        return view('doctores.show', ['historiaclinicas' => $historiaclinicas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('doctores.edit', ['paciente' => Paciente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDoctorRequest $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
       
        $paciente->name = $request->get('name');
        $paciente->email = $request->get('email');
        $paciente->apellidos = request('apellido');
        $paciente->genero = request('genero');
        $paciente->ocupacion = request('ocupacion');
        

        $paciente->update();

        echo '<script language="javascript">alert("El paciente ha sido actualizado exitosamente");</script>';

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
        
    }

    public function newhc()
    {


    }
}
