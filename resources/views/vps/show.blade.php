@extends('layouts.app3')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  @foreach($vitals as $vital)
  <p class="lead">Id: {{$vital->id}}</p>
  <p class="lead">Altura: {{$vital->altura}}</p>
  <p class="lead">Peso: {{$vital->peso}}</p>
  <p class="lead">Rh: {{$vital->rh}}</p>
  <p class="lead">Edad: {{$vital->edad}}</p>
  <p class="lead">Fecha de creación:{{$vital->created_at}}</p>
  <p class="lead">Ultima actualización:{{$vital->updated_at}}</p>


  <a href="{{ route('vitals.edit', $vital->id)}}"><button type="button" class="btn btn-warning">Editar Vital</button></a>
  @endforeach
  <table class="table">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ENFERMEDAD</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">CREACIÓN</th>
      <th scope="col">ACTUALIZACION</th>
      
      
    </tr>
  </thead>
        <tbody>
        @foreach($problemas as $problema)
      
             <tr>
                 <th scope="row">{{$problema->id}}</th>
                 <td>{{$problema->enfermedad}}</td>
                 <td>{{$problema->descripcion}}</td>
                 <td>{{$problema->created_at}}</td>
                 <td>{{$problema->updated_at}}</td>
                 
                 <td>
                 
               
                 <a href="{{ route('problemas.edit', $problema->id)}}"><button type="button" class="btn btn-warning">Editar Problema</button></a>
                 
               </td>
               </tr>
        @endforeach
  
       </tbody>
</table>
 	<a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Atras</button></a>
  </div>
</div>

@endsection