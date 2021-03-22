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

<form action="{{ route('vps.update', $historiaclinica->id)}}" method="POST">
@method('PATCH')
@csrf
<div style="margin:20px;">
<div class="form-group">
    <label for="email">Paciente </label>
    <input type="text" class="form-control" value="{{$historiaclinica->id}}" readonly="readonly", name="id_paciente">
    
  </div>
<div class="form-group">
    <label for="nombre">medicamentos</label>
    <input type="text" class="form-control" name="medicamentos" placeholder="medicamentos" value="{{$historiaclinica->medicamentos}}">
    
  </div>
  <div class="form-group">
    <label for="nombre">notas</label>
    <input type="text" class="form-control" name="notas" placeholder="Notas" value="{{$historiaclinica->notas}}">
    
  </div>
  <div class="form-group">
    <label for="email">Paciente </label>
    <input type="text" class="form-control" value="{{$historiaclinica->id_paciente}}" readonly="readonly", name="id_paciente">
    
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

  
  
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection