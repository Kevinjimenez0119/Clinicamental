@extends('layouts.app')

@section('content')

<form action="{{ route('traslados.update', $paciente->identificacion)}}" method="POST">
@method('PATCH')
@csrf
<div class="form-group">
    <label for="nombre">Identificacion paciente</label>
    <input type="text" class="form-control"  value="{{$paciente->identificacion}}" readonly="readonly">
    
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
    <input type="text" class="form-control" name="email" value="{{auth()->user()->name}}" readonly="readonly">
    
  
    <div class="form-group">
    <label for="email">Identificacion doctor actual</label>
    <select name="id_doctor_act" class="form-control" id="rol">
    @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->id}}</option>
    @endforeach
    </select>
    
  </div>
  
  
  
  
  <button type="submit" class="btn btn-primary">Trasladar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
@endsection