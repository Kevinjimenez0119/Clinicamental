@extends('layouts.app3')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  @foreach($tratamientos as $tratamiento)
  <p class="lead">Id: {{$tratamiento->id}}</p>
  <p class="lead">Tratamiento: {{$tratamiento->tipo_tratamiento}}</p>
  <p class="lead">Diagnostico: {{$tratamiento->diagnostico}}</p>
  <p class="lead">Guia: {{$tratamiento->guia}}</p>
  <p class="lead">Medicamentos: {{$tratamiento->medicamentos}}</p>
  
  @endforeach
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Atras</button></a>
  </div>
</div>

@endsection