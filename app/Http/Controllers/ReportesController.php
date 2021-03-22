<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\User;
use DB;

class ReportesController extends Controller
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
            $pacientes = Paciente::where('name', 'LIKE', '%' . $query . '%')->get();
            return view('reportes.index', ['pacientes' => $pacientes, 'search' => $query]);

        }}
        //$pacientes = Paciente::all();
        //return view('reportes.index', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        return view('reportes.pdf', ['pacientes' => $pacientes]);
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
