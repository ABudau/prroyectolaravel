@extends('adminlte::page')

@section('title', 'THE READING ROOM')

@section('content_header')
    <h1>THE READING ROOM</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body" id="myChart">

                       
                        {!! $chart->renderHtml() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        setInterval(function() {
            $.get('/chart-data', function(data) {
                // Actualiza el gráfico con los nuevos datos
                window.myChart.update(data);
            });
        }, 3000); // Actualiza el gráfico cada 3 segundos
    </script>

@stop