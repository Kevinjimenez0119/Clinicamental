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
use PDF;
use DB;

class PdfController extends Controller
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
        $pacientes = Paciente::all();
        $pdf = PDF::loadView('reportes.index', compact('pacientes'));
        return $pdf->download('pacientes.pdf');
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
        //
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
        //
    }
}
