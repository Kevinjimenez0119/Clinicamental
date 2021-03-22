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
use App\Http\Requests\EditViltalRequest;
use DB;

class VitalsController extends Controller
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
        $tratamientos = DB::table('tratamientos')->where('id', $id)->get();
        
        
        return view('vitals.show', ['tratamientos' => $tratamientos]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('vitals.edit', ['vital' => Vital::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditVitalRequest $request, $id)
    {
        $vital = Vital::findOrFail($id);
       
        $vital->altura = $request->get('altura');
        $vital->peso = $request->get('peso');
        $vital->rh = $request->get('rh');
        $vital->edad = $request->get('edad');
        

        $vital->update();

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
