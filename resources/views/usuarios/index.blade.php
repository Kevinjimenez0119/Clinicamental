@extends('layouts.app2')

@section('content')

<table class="table">
<h2>Lista de doctores <a href="{{ route('usuarios.create')}}"><button type="button" class="btn btn-primary float-right" >Agregar nuevo doctor</button></a></h2>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDOS</th>
      <th scope="col">EMAIL</th>
      <th scope="col">GENERO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">HORARIO</th>
      
    </tr>
  </thead>
        <tbody>
        @foreach($users as $user)
      
             <tr>
                 <th scope="row">{{$user->id}}</th>
                 <td>{{$user->name}}</td>
                 <td>{{$user->apellidos}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->genero}}</td>
                 <td>{{$user->telefono}}</td>
                 <td>{{$user->horario}}</td>
                 <td>
                 
                <form action="{{ route('usuarios.destroy', $user->id)}}" method="POST">
                <a href="{{ route('usuarios.show', $user->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>
                 <a href="{{ route('usuarios.edit', $user->id)}}"><button type="button" class="btn btn-warning">Editar</button></a>
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </form></td>
               </tr>
        @endforeach
  
       </tbody>
</table>

@endsection
