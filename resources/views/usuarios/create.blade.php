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
<div style="max-width:600px;margin:0 auto; " class="mt-5 card">
  <form action="{{ route('usuarios.store')}}" method="POST">
@csrf
  <div style="margin:20px;" >
  <div style=""class="form-group">
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
    <label for="email">Rol </label>
    <select name="rol" class="form-control" id="rol">
    @foreach($roles as $role)
    <option value="{{$role->id}}">{{$role->rol}}</option>
    @endforeach
    </select>
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">
  </div>
  <div class="form-group">
    <label for="nombre">Telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="Telefono">
    
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
  <button type="submit" class="btn btn-primary">Registrar</button>
  <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
  
</form>

</div>


@endsection