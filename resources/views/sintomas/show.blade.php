@extends('layouts.app2')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">

  <table class="table">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SINTOMA</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">CREACIÓN</th>
      <th scope="col">ACTUALIZACION</th>
      
      
    </tr>
  </thead>
        <tbody>
        @foreach($sintomas as $sintoma)
      
             <tr>
                 <th scope="row">{{$sintoma->id}}</th>
                 <td>{{$sintoma->sintomas}}</td>
                 <td>{{$sintoma->descripcion}}</td>
                 <td>{{$sintoma->created_at}}</td>
                 <td>{{$sintoma->updated_at}}</td>
                 <td>
                 
               
                 <a href="{{ route('sintomas.edit', $sintoma->id)}}"><button type="button" class="btn btn-warning">Editar Sintoma</button></a>
                 
               </td>
               </tr>
        @endforeach
  
       </tbody>
</table>
  
<a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Atras</button></a>

  </div>
</div>

@endsection