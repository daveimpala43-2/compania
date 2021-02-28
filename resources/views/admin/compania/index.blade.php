@extends('layouts.app')

@section('title', 'Compañias')

@section('content')
    
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Compañia
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
                    <a class="btn btn-success AgregarEmpleadoBoton" href="{{route('compañia.create')}}" > Agregar  <i class="fa fa-plus"></i> </a>
                </div>
                <div class="card-body">
                <table id="compañia" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Logo</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th> Editar </th>
                            <th> Eliminar </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($compañiaData as $compañia)
                        <tr>
                            <td>{{$compañia->id}}</td>
                            <td><img src="{{asset('storage').'/'.$compañia->logo}}" alt="Logo" class="LogoCompañia"></td>
                            <td>{{$compañia->nombre}}</td>
                            <td>{{$compañia->email}}</td>
                            <td>{{$compañia->website}}</td>
                            <td> <a href="{{route('compañia.edits', $compañia->id)}}" class="btn btn-outline-warning"> <i class="fa fa-edit"></i> </a> </td>
                            <td> <a class="btn btn-outline-danger" onclick="EliminarCompañia('{{$compañia->nombre}}','{{$compañia->id}}')"> <i class="fa fa-trash"></i> </a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id de la Compañia</th>
                            <th>Logo</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Website</th>
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
<div class="modal fade" id="EliminarCompañia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      function EliminarCompañia(nombreCompañia,idCompañia){
          $("#EliminarCompañia").modal('show');
          $Nombrecompañia = document.getElementById('ContenidoModal');
          $Nombrecompañia.innerHTML=  `
          <form action="compañia/${idCompañia}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                      @csrf
                      @method('DELETE')
                      <h5>Seguro que deseas eliminar la compañia <strong> ${nombreCompañia} </strong> </h5> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Eliminar Compañia</button>
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
