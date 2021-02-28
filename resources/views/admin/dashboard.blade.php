@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                <canvas id="bar-chart-grouped" width="800" height="450"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function(){

  let compañias=[], noEmpleados =[];
  $.ajax({
    type: 'GET',
    url: '/dashboard/data',
    success: function (respuesta) {
      console.log(respuesta)
      respuesta.forEach(element => {
        compañias.push(element.label)
        noEmpleados.push(element.empleado_cout)
      });
      new Chart(document.getElementById("bar-chart-grouped"), {
        type: 'bar',
        data: {
          labels: compañias,
          datasets: [
            {
              label: "Empleados",
              backgroundColor: "#1e212d",
              maxBarThickness: 25,
              data: noEmpleados
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Numero de empleados por compañia'
          },
          scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true,
            }]
        }
        }
      }); 
    },
    error: function (jqXHR, textStatus, errorThrown) {
       console.log( jqXHR.responseText )
    }
});

});
</script>

@endsection