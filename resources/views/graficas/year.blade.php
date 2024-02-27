@extends('plantillas.yearAndMonthTemplate')


@section('title', 'Graficas de consumo anual')
@section('subtitle', 'Grafica de consumo anual')

@section('graficaAgua')
<h3>Consumo anual del 2022 de agua 💧</h3>

<div id="graficaAgua" style="width:800x;height:400px;">
    <script type="text/javascript">
        var myChart1 = echarts.init(document.getElementById('graficaAgua'));
        let option1 = {
            xAxis: {
                type: 'category',
                data: ["{{ $ArrayResultados['consumoRealAgua'][0]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][1]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][2]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][3]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][4]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][5]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][6]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][7]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][8]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua'][9]['fecha'] }}", "{{$ArrayResultados['consumoRealAgua'][10]['fecha'] }}", "{{$ArrayResultados['consumoRealAgua'][11]['fecha'] }}"],
            },
            yAxis: {
                type: 'value',
                name: 'Consumo (m3)'
            },
            series: [
                {
                    data: [{{ $ArrayResultados['consumoRealAgua'][0]['consumo_real']}}, {{ $ArrayResultados['consumoRealAgua'][1]['consumo_real'] }}, {{ $ArrayResultados['consumoRealAgua'][2]['consumo_real']}}, {{ $ArrayResultados['consumoRealAgua'][3]['consumo_real'] }}, {{ $ArrayResultados['consumoRealAgua'][4]['consumo_real'] }}, {{ $ArrayResultados['consumoRealAgua'][5]['consumo_real']}}, {{$ArrayResultados['consumoRealAgua'][6]['consumo_real']}}, {{ $ArrayResultados['consumoRealAgua'][7]['consumo_real']}}, {{$ArrayResultados['consumoRealAgua'][8]['consumo_real']}}, {{ $ArrayResultados['consumoRealAgua'][9]['consumo_real'] }}, {{$ArrayResultados['consumoRealAgua'][10]['consumo_real'] }}, {{ $ArrayResultados['consumoRealAgua'][11]['consumo_real'] }}], 
                    type: 'bar' 
                }              
            ]           
        };           
    myChart1.setOption(option1);       
    </script>  
</div>


@endsection


@section('graficaElectricidad')
<h3> Consumo anual del 2022 de electricidad ⚡️ </h3>
<div id='graficaElectricidad' style="width:800px;height:400px;">
    <script type="text/javascript">
        var myChart2 = echarts.init(document.getElementById('graficaElectricidad'));
        let option2 = {
            xAxis: {
                type: 'category',
                data: ["{{  $ArrayResultados['consumoRealElectricidad'][0]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][1]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][2]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][3]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][4]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][5]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][6]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][7]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][8]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad'][9]['fecha'] }}", "{{$ArrayResultados['consumoRealElectricidad'][10]['fecha'] }}", "{{$ArrayResultados['consumoRealElectricidad'][11]['fecha'] }}"],
            },
            yAxis: {
                type: 'value',
                name: 'Consumo (kWh)'
            },
            series: [
                {
                    data: [{{ $ArrayResultados['consumoRealElectricidad'][0]['consumo_real']}}, {{ $ArrayResultados['consumoRealElectricidad'][1]['consumo_real'] }}, {{ $ArrayResultados['consumoRealElectricidad'][2]['consumo_real']}}, {{ $ArrayResultados['consumoRealElectricidad'][3]['consumo_real'] }}, {{ $ArrayResultados['consumoRealElectricidad'][4]['consumo_real'] }}, {{ $ArrayResultados['consumoRealElectricidad'][5]['consumo_real']}}, {{$ArrayResultados['consumoRealElectricidad'][6]['consumo_real']}}, {{ $ArrayResultados['consumoRealElectricidad'][7]['consumo_real']}}, {{$ArrayResultados['consumoRealElectricidad'][8]['consumo_real']}}, {{ $ArrayResultados['consumoRealElectricidad'][9]['consumo_real'] }}, {{$ArrayResultados['consumoRealElectricidad'][10]['consumo_real'] }}, {{ $ArrayResultados['consumoRealElectricidad'][11]['consumo_real'] }}],
                    type: 'bar'
                }
            ]
        };
        myChart2.setOption(option2);
    </script>
@endsection

@section('graficaAgua2')
<h3>Consumo anual del 2023 de agua 💧</h3>
<div id="graficaAgua2" style="width:800x;height:400px;">
    <script type="text/javascript">
        var myChart4 = echarts.init(document.getElementById('graficaAgua2'));
        let option4 = {
            xAxis: {
                type: 'category',
                data: ["{{ $ArrayResultados['consumoRealAgua2'][0]['fecha'] }}", "{{ $ArrayResultados['consumoRealAgua2'][1]['fecha'] }}"],
            },
            yAxis: {
                type: 'value',
                name: 'Consumo (m3)'
            },
            series: [
                {
                    data: [{{ $ArrayResultados['consumoRealAgua2'][0]['consumo_real']}}, {{ $ArrayResultados['consumoRealAgua2'][1]['consumo_real'] }}],
                    type: 'bar' 
                }              
            ]           
        };           
    myChart4.setOption(option4);       
    </script>  
</div>

@endsection


@section('graficaElectricidad2')
<h3> Consumo anual del 2023 de electricidad ⚡️ </h3>
<div id='graficaElectricidad2' style="width:800px;height:400px;">
    <script type="text/javascript">
        var myChart3 = echarts.init(document.getElementById('graficaElectricidad2'));
        let option3 = {
            xAxis: {
                type: 'category',
                data: ["{{  $ArrayResultados['consumoRealElectricidad2'][0]['fecha'] }}", "{{ $ArrayResultados['consumoRealElectricidad2'][1]['fecha'] }}"], 
            },
            yAxis: {
                type: 'value',
                name: 'Consumo (kWh)'
            },
            series: [
                {
                    data: [{{ $ArrayResultados['consumoRealElectricidad2'][0]['consumo_real']}}, {{ $ArrayResultados['consumoRealElectricidad2'][1]['consumo_real'] }}],
                    type: 'bar'
                }
            ]
        };
        myChart3.setOption(option3);
    </script>

@endsection

@section('comentarios')
<marquee behavior="scroll" direction="left" scrollamount="5">
    Ahorra energía y agua. ¡Cuida el planeta! 🌍 · Apaga las luces no necesarias · Cierra los grifos correctamente · Aprovecha la luz natural · No malgastes papel
</marquee>
@endsection

<script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
