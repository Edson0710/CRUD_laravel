@extends('adminlte::page')
@section('title', 'Panel Admin')

@section('content_header')
<h1 class="ml-2">Editar Mascota</h1>
@stop

@section('content')

<div class="col-12 mb-5" id="contenedor">
    <form method="POST" action="{{route('mascotas.update', $mascota)}}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$mascota->nombre}}">
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <input type="text" class="form-control" id="especie" name="especie" value="{{$mascota->especie}}">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" value="{{$mascota->edad}}">
        </div>
        <div class="form-group ">
            <label for="raza">Raza</label>
            <input type="text" class="form-control" id="raza" name="raza" value="{{$mascota->raza}}">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M" @if($mascota->sexo=='M') checked @endif>
                <label class="form-check-label" for="sexo">Macho</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="H" @if($mascota->sexo=='H') checked @endif>
                <label class="form-check-label" for="sexo">Hembra</label>
        </div>
        <br><br>
        <div class="text-right">
            <a class="btn btn-primary" href="{{route('mascotas.index')}}">Volver al listado</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        
        
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('js/datatable.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
@stack('scripts')
@stop