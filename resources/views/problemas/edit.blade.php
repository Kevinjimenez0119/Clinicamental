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

<form action="{{ route('problemas.update', $problema->id)}}" method="POST">
@method('PATCH')
@csrf
<h2>Problemas</h2>
<div style="margin:20px;">
<div class="form-group">
    <label for="nombre">Id</label>
    <input type="text" class="form-control" name="id"  value="{{$problema->id}}"  readonly="readonly">
    
    

<div class="form-group">
  <label for="nombre">Problema</label>
  <input type="text" class="form-control" name="problema" placeholder="problema" value="{{$problema->enfermedad}}">
  
</div>
<div class="form-group">
  <label for="nombre">descripcion</label>
  <input type="text" class="form-control" name="descripcion" placeholder="descripcion" value="{{$problema->descripcion}}">
  
</div>

  <div class="form-group">
    <label for="nombre">id hitoria clinica</label>
    <input type="text" class="form-control" name="id_hc"  value="{{$problema->id_hc}}" readonly="readonly">
    
  </div>

  
  
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection