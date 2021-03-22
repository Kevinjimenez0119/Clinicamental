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

<form action="{{ route('historias.store')}}" method="POST">
@csrf
<div style="margin:20px;">
<div class="form-group">
    <label for="nombre">medicamentos</label>
    <input type="text" class="form-control" name="medicamentos" placeholder="medicamentos">
    
  </div>
  <div class="form-group">
    <label for="nombre">notas</label>
    <input type="text" class="form-control" name="notas" placeholder="Notas" >
    
  </div>
  <div class="form-group">
    <label for="email">Paciente </label>
    <input type="text" class="form-control" value="{{$paciente->identificacion}}" readonly="readonly", name="id_paciente">
    
  </div>
  
  <div class="form-group">
    <label for="password">tratamientos</label>
    
  </div>
  <h2>Tratamiento</h2>
  <div class="form-group">
    <label for="email">Rol </label>
    <select name="tratamiento" class="form-control" id="rol">
    @foreach($tratamientos as $tratamiento)
    <option value="{{$tratamiento->id}}">{{$tratamiento->tipo_tratamiento}}</option>
    @endforeach
    </select>
    
  </div>

  <h2>Vital</h2>
  <div class="form-group">
    <label for="nombre">altura</label>
    <input type="text" class="form-control" name="altura" placeholder="Altura">
    
  </div>
  <div class="form-group">
    <label for="nombre">peso</label>
    <input type="text" class="form-control" name="peso" placeholder="Peso">
    
  </div>
  <div class="form-group">
    <label for="nombre">RH</label>
    <input type="text" class="form-control" name="rh" placeholder="RH">
    
  </div>
  <div class="form-group">
    <label for="nombre">edad</label>
    <input type="text" class="form-control" name="edad" placeholder="edad">
    
  </div>
  <h2>Sintomas</h2>

<div class="form-group">
  <label for="nombre">Sintoma</label>
  <input type="text" class="form-control" name="sintoma" placeholder="sintoma">
  
</div>
<div class="form-group">
  <label for="nombre">descripcion</label>
  <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
  
</div>

<h2>Problemas</h2>

<div class="form-group">
  <label for="nombre">Problemas</label>
  <input type="text" class="form-control" name="problema" placeholder="problema">
  
</div>
<div class="form-group">
  <label for="nombre">descripcion</label>
  <input type="text" class="form-control" name="descripcion2" placeholder="descripcion">
  
</div>
  
  
  <button type="submit" class="btn btn-primary">Registrar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection