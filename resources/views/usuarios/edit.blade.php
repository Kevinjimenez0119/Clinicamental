@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div style="max-width:600px;margin:0 auto; " class="mt-5 mb-5 card">
<form action="{{ route('usuarios.update', $user->id)}}" method="POST">
@method('PATCH')
@csrf
  <div style="margin:20px;">
  <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Nombres">
    
  </div>
  <div class="form-group">
    <label for="nombre">Apellidos</label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" value="{{$user->apellidos}}">
    
  </div>
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email">
    
  </div>
  <div class="form-group">
    <label for="nombre">Telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="{{$user->telefono}}" >
    
  </div>
  <div class="form-group">
    <label for="genero">Genero </label>
    <select name="genero" class="form-control" id="genero">
  
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
    <option value="Otro">Otro</option>
    
    </select>
    
  </div>
  <div class="form-group">
    <label for="genero">Horario </label>
    <select name="horario" class="form-control" id="horario">
  
    <option value="6-12">6-12</option>
    <option value="2-8">2-8</option>
    
    
    </select>
    
  </div>
  </div>
  <div style="margin-left:35%; margin-bottom: 20px;">
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</div>
  
 
</form>
</div>

@endsection