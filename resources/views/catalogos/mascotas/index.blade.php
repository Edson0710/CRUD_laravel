@extends('adminlte::page')
@section('title', 'Panel Admin')

@section('content_header')
<h1 class="ml-2">Mascotas</h1>
@stop

@section('content')

<div class="col-12" id="contenedor">
    <a class="btn btn-primary" href="{{route('mascotas.create')}}">Crear</a>
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Especie</th>
                <th scope="col">Edad</th>
                <th scope="col">Raza</th>
                <th scope="col">Sexo</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($mascotas as $mascota)
              <tr>
                <td>{{$mascota->nombre}}</td>
                <td>{{$mascota->especie}}</td>
                <td>{{$mascota->edad}}</td>
                <td>{{$mascota->raza}}</td>
                <td>{{$mascota->sexo}}</td>
                <td><a href="{{route('mascotas.edit', $mascota)}}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{route('mascotas.destroy', $mascota->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
    
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