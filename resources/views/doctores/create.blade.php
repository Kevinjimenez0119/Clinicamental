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
<form action="{{ route('doctores.store')}}" method="POST">
@csrf
  <div style="margin:20px;">
  <div class="form-group">
    <label for="nombre">identificacion</label>
    <input type="text" class="form-control" name="id" placeholder="identificacion">
    
  </div>
  <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" name="name" placeholder="Nombres">
    
  </div>
  <div class="form-group">
    <label for="nombre">Apellidos</label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellidos">
    
  </div>
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" name="email" placeholder="Email">
    
  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">
  </div>

  <div class="form-group">
    <label for="nombre">Ocupacion</label>
    <input type="text" class="form-control" name="ocupacion" placeholder="Ocupacion">
    
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
    <label for="password">doctor</label>
    <input type="text" class="form-control" name="id_doctor" value="{{auth()->user()->id}}" readonly="readonly">
  </div>

  <h2>Contacto</h2>
  <div class="form-group">
    <label for="nombre">Telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="Telefono">
    
  </div>
  <div class="form-group">
    <label for="nombre">Direccion</label>
    <input type="text" class="form-control" name="dir" placeholder="Direccion">
    
  </div>
  <div class="form-group">
    <label for="nombre">Ciudad</label>
    <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
    
  </div>
  <div class="form-group">
    <label for="nombre">Recidencia</label>
    <input type="text" class="form-control" name="recid" placeholder="Recidencia">
    
  </div>
  </div>
  <div style="margin-left:35%; margin-bottom: 20px;">
  <button type="submit" class="btn btn-primary">Registrar</button>
  <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</div>
</form>
</div>

@endsection