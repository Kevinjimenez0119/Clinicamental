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

<form action="{{ route('vitals.update', $vital->id)}}" method="POST">
@method('PATCH')
@csrf
<h2>Vital</h2>
<div style="margin:20px;">
<div class="form-group">
    <label for="nombre">Id</label>
    <input type="text" class="form-control" name="id"  value="{{$vital->id}}"  readonly="readonly">
    
  </div>
  <div class="form-group">
    <label for="nombre">altura</label>
    <input type="text" class="form-control" name="altura" placeholder="Altura" value="{{$vital->altura}}">
    
  </div>
  <div class="form-group">
    <label for="nombre">peso</label>
    <input type="text" class="form-control" name="peso" placeholder="Peso" value="{{$vital->peso}}">
    
  </div>
  <div class="form-group">
    <label for="nombre">RH</label>
    <input type="text" class="form-control" name="rh" placeholder="RH" value="{{$vital->rh}}">
    
  </div>
  <div class="form-group">
    <label for="nombre">edad</label>
    <input type="text" class="form-control" name="edad" placeholder="edad" value="{{$vital->edad}}">
    
  </div>

  <div class="form-group">
    <label for="nombre">id hitoria clinica</label>
    <input type="text" class="form-control" name="id_hc"  value="{{$vital->id_hc}}" readonly="readonly">
    
  </div>

  
  
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection