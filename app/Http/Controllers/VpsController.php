<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Contacto;
use App\Models\Historiaclinica;
use App\Models\Tratamiento;
use App\Models\Vital;
use App\Models\Sintoma;
use App\Models\Problema;
use DB;
use App\Http\Requests\EditHistoriaRequest;

class VpsController extends Controller
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
        //
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
        $vitals = DB::table('vitals')->where('id_hc', $id)->get();
        $sintomas = DB::table('sintomas')->where('id_hc', $id)->get();
        $problemas = DB::table('problemas')->where('id_hc', $id)->get();
        
        return view('vps.show', ['vitals' => $vitals], ['problemas' => $problemas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamientos = Tratamiento::all();
        return view('vps.edit', ['historiaclinica' => Historiaclinica::findOrFail($id)], ['tratamientos' => $tratamientos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditHistoriaRequest $request, $id)
    {
        $historiaclinica = Historiaclinica::findOrFail($id);
       
        $historiaclinica->medicamentos = $request->get('medicamentos');
        $historiaclinica->notas = $request->get('notas');
        

        $historiaclinica->update();

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
