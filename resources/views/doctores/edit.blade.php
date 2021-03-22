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

<form action="{{ route('doctores.update', $paciente->identificacion)}}" method="POST">
@method('PATCH')
@csrf
<div style="margin:20px;">
<div class="form-group">
    <label for="nombre">Identificacion</label>
    <input type="text" class="form-control"  value="{{$paciente->identificacion}}" readonly="readonly">
    
  </div>

  <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" name="name" value="{{$paciente->name}}" placeholder="Nombres">
    
  </div>
  <div class="form-group">
    <label for="nombre">Apellidos</label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" value="{{$paciente->apellidos}}">
    
  </div>
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" name="email" value="{{$paciente->email}}" placeholder="Email">
    
  </div>
  <div class="form-group">
    <label for="nombre">Ocupacion</label>
    <input type="text" class="form-control" name="ocupacion" placeholder="Ocupacion" value="{{$paciente->ocupacion}}">
    
  </div>
  <div class="form-group">
    <label for="genero">Genero </label>
    <select name="genero" class="form-control" id="genero">
  
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
    <option value="Otro">Otro</option>
    
    </select>
    
  </div>
  
  
  
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection