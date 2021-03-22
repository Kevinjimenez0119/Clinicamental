@extends('layouts.app2')

@section('content')

<table class="table">
<h2>Lista de traslados </h2>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Id paciente</th>
      <th scope="col">Nombre paciente</th>
      <th scope="col">Id doctor anterior</th>
      <th scope="col">Nombre doctor ant</th>
      <th scope="col">Id doctor actual</th>
      <th scope="col">Fecha</th>
      
      
    </tr>
  </thead>
        <tbody>
        @foreach($traslados as $traslado)
      
             <tr>
                 <th scope="row">{{$traslado->id}}</th>
                 <td>{{$traslado->id_paciente}}</td>
                 <td>{{$traslado->nombre_paciente}}</td>
                 <td>{{$traslado->id_doctor_ant}}</td>
                 <td>{{$traslado->nombre_doctor_ant}}</td>
                 <td>{{$traslado->id_doctor_act}}</td>
                 <td>{{$traslado->created_at}}</td>
                 
               </tr>
        @endforeach
  
       </tbody>
</table>

@endsection