@extends('layouts.app')

@section('content')


<div >
            <h5 ><strong>TABLA DE pacientes</strong> </h5>
            <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-primary float-left" >ATRAS</button></a>
            <table class="table table-striped text-center">
            <a href="{{ route('pdf.index')}}"><button type="button" class="btn btn-primary float-right" >Generar reporte en PDF</button></a>
                <thead>
                    <tr>
                    <th >ID</th>
                    <th >NOMBRE</th>
                    <th >APELLIDOS</th>
                    <th >EMAIL</th>
                    <th >GENERO</th>
                    <th >OCUPACION</th>
                    </tr>
                </thead>
               <tbody>
               @foreach($pacientes as $paciente)
               <tr>
              
                 <th >{{$paciente->identificacion}}</th>
                 <td>{{$paciente->name}}</td>
                 <td>{{$paciente->apellidos}}</td>
                 <td>{{$paciente->email}}</td>
                 <td>{{$paciente->genero}}</td>
                 <td>{{$paciente->ocupacion}}</td>
                 
                 
               
                
                
                
               
               </tr>
        @endforeach
                </tbody>
            </table>
        </div>

@endsection