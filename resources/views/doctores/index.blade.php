@extends('layouts.app3')

@section('content')

<table class="table">
<h2>Lista de pacientes <a href="{{ route('doctores.create')}}"><button type="button" class="btn btn-primary float-right" >Agregar nuevo paciente</button></a></h2>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDOS</th>
      <th scope="col">EMAIL</th>
      <th scope="col">GENERO</th>
      <th scope="col">OCUPACION</th>
      
    </tr>
  </thead>
        <tbody>
        @foreach($pacientes as $paciente)
      
             <tr>
                 <th scope="row">{{$paciente->identificacion}}</th>
                 <td>{{$paciente->name}}</td>
                 <td>{{$paciente->apellidos}}</td>
                 <td>{{$paciente->email}}</td>
                 <td>{{$paciente->genero}}</td>
                 <td>{{$paciente->ocupacion}}</td>
                 <td>
                 
               
                <a href="{{ route('doctores.show', $paciente->identificacion)}}"><button type="button" class="btn btn-secondary">Ver HC</button></a>
                 <a href="{{ route('doctores.edit', $paciente->identificacion)}}"><button type="button" class="btn btn-warning">Editar</button></a>
                 <a href="{{ route('historias.edit', $paciente->identificacion)}}"><button type="button" class="btn btn-warning">Iniciar HC</button></a>
                 <a href="{{ route('traslados.edit', $paciente->identificacion)}}"><button type="button" class="btn btn-warning">Trasladar paciente</button></a>
                
               </td>
               </tr>
        @endforeach
  
       </tbody>
</table>

@endsection