@extends('layouts.app')

@section('content')
<div style="max-width:600px;margin:0 auto; " class="mt-5 mb-5 card">

<form action="{{ route('traslados.update', $paciente->identificacion)}}" method="POST">
@method('PATCH')
@csrf
<div style="margin:20px;">
<div class="form-group">
    <label for="nombre">Identificacion paciente</label>
    <input type="text" class="form-control"  name="id_paciente" value="{{$paciente->identificacion}}" readonly="readonly">
    
  </div>

  <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" name="name" value="{{$paciente->name}}" readonly="readonly">
    
  </div>
  <div class="form-group">
    <label for="nombre">Identificacion doctor ant</label>
    <input type="text" class="form-control" name="id_doctor_ant"  value="{{auth()->user()->id}}" readonly="readonly">
    
  </div>
  <div class="form-group">
    <label for="nombre">Nombre doctor ant </label>
    <input type="text" class="form-control" name="name_doc" value="{{auth()->user()->name}}" readonly="readonly">
    
    </div>
    <div class="form-group">
    <label for="email">Identificacion doctor actual</label>
    <select name="id_doctor_act" class="form-control" id="rol">
    @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->id}}, {{$user->name}} {{$user->apellidos}}</option>
    @endforeach
    </select>
    
  </div>
  
  
  
  
  <button type="submit" class="btn btn-primary">Trasladar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection