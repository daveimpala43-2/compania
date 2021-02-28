@extends('layouts.app')

@section('title', 'Empleados')

@section('content')
    
<script src="{{ asset('js/function.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Empleados
                    <a class="btn btn-success AgregarEmpleadoBoton"  href="{{route('empleado.create')}}"> Agregar <i class="fa fa-user-plus"></i> </a>
                </div>
                <div class="card-body">
                <table id="empleados" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Id de la Compañia</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Genero</th>
                            <th> Editar </th>
                            <th> Eliminar </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                            <tr>
                            <td>{{$empleado->id}}</td>
                            <td>{{$empleado->primer_nombre}}</td>
                            <td>{{$empleado->last_name}}</td>
                            <td>{{$empleado->compañia_id}}</td>
                            <td>{{$empleado->email}}</td>
                            <td>{{$empleado->telefono}}</td>
                            <td>
                                @if($empleado->genero == 1)
                                    <i class="fa fa-venus"></i>
                                @else
                                    <i class="fa fa-mars"></i>
                                @endif
                            </td>
                            <td> <a href="{{route('empleado.edit', $empleado->id)}}" class="btn btn-outline-warning"> <i class="fa fa-edit"></i> </a> </td>
                            <td> <a class="btn btn-outline-danger" onclick="EliminarEmpleado('{{$empleado->primer_nombre}}','{{$empleado->last_name}}','{{$empleado->id}}')"> <i class="fa fa-trash"></i> </a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Id de la Compañia</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Genero</th>
                            <th> Editar  </th>
                            <th> Eliminar </th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Compañia -->
<div class="modal fade" id="EliminarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EliminarCompañiaLabel">Eliminar Compañia</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="ContenidoModal">
      </div>
    </div>
  </div>
</div>


<script>
      function EliminarEmpleado(nombreEmpleado,apellidoEmpleado,idEmpleado){
          $("#EliminarEmpleado").modal('show');
          $NombreEmpleado = document.getElementById('ContenidoModal');
          $NombreEmpleado.innerHTML=  `
          <form action="empleado/${idEmpleado}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                      @csrf
                      @method('DELETE')
                      <h5>Seguro que deseas eliminar el empleado <strong> ${nombreEmpleado} ${apellidoEmpleado} </strong> </h5> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Eliminar Empleado</button>
            </div>      
            </form>
          `;
      }
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