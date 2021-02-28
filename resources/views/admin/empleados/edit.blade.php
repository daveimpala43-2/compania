@extends('layouts.app')

@section('title', 'Editar Empleados')

@section('content')
    
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@if ($errors->any())
    <script>
       $(function(){
         toastr["error"](`
         <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         `)
       })
    </script>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                
                <a href="{{route('empleado.index')}}" class="btn btn-warning AgregarEmpleadoBoton"> <i class="fa fa-arrow-left"></i> Regresar  </a>

                    Registrar Empleado                  
                </div>
                <div class="card-body">
                    <form action="{{url('/empleado/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
                           <div class="form-group">

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="primer_nombre">Nombre del empleado</label>
                                    <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" placeholder="Ingrese el nombre del empleado" value="{{ $empleado->primer_nombre }}">
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Apellidos</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ingrese los apellidos del empleado" value="{{ $empleado->last_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="compañia_id">Compañia</label>
                                    <select name="compañia_id" id="compañia_od" class="custom-select">
                                        <option value="">Selecione la compañia</option>
                                        @foreach($compañias as $compañia)
                                            @if($compañia->id == $empleado->compañia_id)
                                                <option value="{{$compañia->id}}" selected>{{ $compañia->nombre }}</option>
                                            else
                                                <option value="{{$compañia->id}}" selected>{{ $compañia->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="emai" name="email" id="email" class="form-control" value="{{ $empleado->email }}" placeholder="Ingresa el correo electronico del empleado">
                                </div>

                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $empleado->telefono }}" placeholder="Ingresal el telefono del empleado"  >
                                </div>

                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <select name="genero" id="genero" class="custom-select">
                                        <option value="">Seleccione el genero</option>
                                        @if($empleado->genero == 1)
                                            <option value="1" selected>Femenino</option>
                                            <option value="0">Masculino</option>
                                        @else
                                            <option value="1">Femenino</option>
                                            <option value="0" selected >Masculino</option>
                                        @endif
                                    </select>
                                </div>
                           </div>

                            <button type="submit" class="btn btn-success AgregarEmpleadoBoton"> <i class="fa fa-save"></i> Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      @if(session('success'))
      $(function(){
        toastr["success"]("{{session('success')}}")
      })
      @endif
      @if(session('error'))
      $(function(){
        toastr["error"]("{{session('error')}}")
      })
      @endif
</script>


@endsection
