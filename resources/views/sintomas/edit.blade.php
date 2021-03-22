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
<div style="margin:20px;">
<form action="{{ route('sintomas.update', $sintoma->id)}}" method="POST">
@method('PATCH')
@csrf
<h2>Sintomas</h2>
<div class="form-group">
    <label for="nombre">Id</label>
    <input type="text" class="form-control" name="id"  value="{{$sintoma->id}}"  readonly="readonly">
    
    

  <div class="form-group">
    <label for="nombre">Sintoma</label>
    <input type="text" class="form-control" name="sintoma" placeholder="sintoma" value="{{$sintoma->sintomas}}">
    
  </div>
  <div class="form-group">
    <label for="nombre">descripcion</label>
    <input type="text" class="form-control" name="descripcion" placeholder="descripcion" value="{{$sintoma->descripcion}}">
    
  </div>



  <div class="form-group">
    <label for="nombre">id hitoria clinica</label>
    <input type="text" class="form-control" name="id_hc"  value="{{$sintoma->id_hc}}" readonly="readonly">
    
  </div>

  
  
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
</div>
</div>

@endsection