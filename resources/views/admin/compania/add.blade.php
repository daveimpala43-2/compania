@extends('layouts.app')

@section('title', 'Añadir Compañia')

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
                
                <a href="{{route('compañia.index')}}" class="btn btn-warning AgregarEmpleadoBoton"> <i class="fa fa-arrow-left"></i> Regresar  </a>

                    Registrar Compañia                   
                </div>
                <div class="card-body">
                    <form action="{{url('/compañia')}}" method="post" enctype="multipart/form-data">
                           <div class="form-group">

                                @csrf

                                <div class="form-group">
                                <label for="nombre">Nombre de la compañia</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de la compañia" value="{{ old('nombre') }}">
                                </div>

                                <div class="form-group">
                                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el correo electronico de la compañia" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                <label for="website">Sitio Web</label>
                <input type="text" name="website" id="website" class="form-control" placeholder="Ingrese el Sitio Web de la compañia" value="{{ old('website') }}">
                                </div>

                                <div class="form-group">
                                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" src="LogoCompañia" alt="LogoCompañia" class="form-control" accept=".jpg,.png,.jpeg,.ico,.jpe">
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
