@extends('layouts.app')

@section('title', 'Editar Compañia')

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

                    Editar Compañia "{{$compañia->nombre}}"                    
                </div>
                <div class="card-body">
                    <form action="{{url('/compañia/'.$compañia->id)}}" method="post" enctype="multipart/form-data">
                           <div class="form-group">

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="nombre">Nombre de la compañia</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de la compañia" value="{{ $compañia->nombre }}">
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email de la compañia</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el correo electronico de la compañia" value="{{ $compañia->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="website">Sitio Web de la compañia</label>
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Ingrese el Sitio Web de la compañia" value="{{ $compañia->website }}">
                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" id="logo" src="LogoCompañia" alt="LogoCompañia" class="form-control" accept=".jpg,.png,.jpeg,.ico,.jpe" >
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                           </div>
                           
                           <div class="containerUpdate">
                                    <img src="{{asset('storage').'/'.$compañia->logo}}" alt="Logo" class="LogoCompañiaUpdate">
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
