@extends('layouts.app3')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  @foreach($historiaclinicas as $historiaclinica)
  <p class="lead">Id: {{$historiaclinica->id}}</p>
  <p class="lead">Medicamentos: {{$historiaclinica->medicamentos}}</p>
  <p class="lead">Notas: {{$historiaclinica->notas}}</p>
  <p class="lead">F-Creación: {{$historiaclinica->created_at}}</p>
  <p class="lead">F-Actualización: {{$historiaclinica->updated_at}}</p>
  <p class="lead">Id Doctor: {{auth()->user()->identificacion}}</p>
  <p class="lead">Nombre doctor: {{auth()->user()->name}}</p>
  <a href="{{ route('vps.show', $historiaclinica->id)}}"><button type="button" class="btn btn-secondary">Ver Vital, Problemas </button></a>
  <a href="{{ route('sintomas.show', $historiaclinica->id)}}"><button type="button" class="btn btn-secondary">Ver Sintomas </button></a>
  <a href="{{ route('vps.edit', $historiaclinica->id)}}"><button type="button" class="btn btn-warning">Editar HC</button></a>
  <a href="{{ route('vitals.show', $historiaclinica->id_tratamiento)}}"><button type="button" class="btn btn-success">Ver tratamiento y guia</button></a>
  

  @endforeach
  <a href="{{ route('doctores.index')}}"><button type="button" class="btn btn-danger">Atras</button></a>
  </div>
</div>

@endsection