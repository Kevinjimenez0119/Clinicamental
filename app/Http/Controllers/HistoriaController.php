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
use App\Http\Requests\HistoriaFormRequest;

class HistoriaController extends Controller
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
         return view('historias.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistoriaFormRequest $request)
    {
        $hc =new Historiaclinica();

        $hc->medicamentos = request('medicamentos');
        $hc->notas = request('notas');
        $hc->id_paciente = request('id_paciente');
        $hc->id_tratamiento = request('tratamiento');
        
        $hc->save();

        $vital =new Vital();
        $vital->altura = request('altura');
        $vital->peso = request('peso');
        $vital->rh = request('rh');
        $vital->edad = request('edad');
        $vital->id_hc = $hc->id;
        

        $vital->save();

        $sintoma =new Sintoma();
        $sintoma->sintomas = request('sintoma');
        $sintoma->descripcion = request('descripcion');
        $sintoma->id_hc = $hc->id;

        $sintoma->save();

        $problema =new Problema();
        $problema->enfermedad = request('problema');
        $problema->descripcion = request('descripcion2');
        $problema->id_hc = $hc->id;

        $problema->save();

       
        

        $id=auth()->user()->id;
        $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
        return view('doctores.index', ['pacientes' => $pacientes]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia = DB::table('historiaclinicas')->where('id_paciente', $id)->value('id_paciente');
        if($historia == $id)
        {
            echo '<script language="javascript">alert("El paciente ya cuenta con historia clinica");</script>';
            $id=auth()->user()->id;
        $pacientes = DB::table('pacientes')->where('id_doctor', $id)->get();
        return view('doctores.index', ['pacientes' => $pacientes]);
            

        }else{
            $tratamientos = Tratamiento::all();
        return view('historias.create',['paciente' => Paciente::findOrFail($id)], ['tratamientos' => $tratamientos]);

        }
        
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
        //
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

   
}
