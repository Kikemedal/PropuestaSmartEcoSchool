@extends('plantillas.dayAndWeekTemplate')


@section('title', 'Grafica de consumo diario')
@section('subtitle', 'Grafica de consumo diario')

@section('graficaAgua')
<div id="graficaAgua"  style="width: 600px;height:400px;">
<script type="text/javascript">
    var myChart1 = echarts.init(document.getElementById('graficaAgua'));

    var option1 = {
    tooltip: {
        formatter: function(params) {
            var value = params.value ? params.value : 0;
            return params.seriesName + '<br/>' + params.name + ' : ' + value + ' m3';
        }
    },
    series: [
        {
            name: 'Consumo de agua',
            type: 'gauge',
            min: 0,
            max: {{ $resultados['consumoRealAgua'][1] }},
            progress: {
                show: true,
                itemStyle: {
                    color: {{ $resultados['consumoRealAgua'][0] }} > {{ $resultados['consumoRealAgua'][1] }} ? '#3F51B5': '#F44336'
                }
            },
            detail: {
                valueAnimation: true,
                formatter: function(params) {
                    return  {{ $resultados['consumoRealAgua'][0] }} + '\nm3';
                },
                offsetCenter: [0, '60%']  
            },
            data: [
                {
                    value: {{ $resultados['consumoRealAgua'][0] }},
                    name: 'Consumo de agua'
                }
            ]
        }
    ]
};

myChart1.setOption(option1);

</script>

</div>
@endsection


@section('graficaElectricidad')

<div id="graficaElectricidad"  style="width: 600px;height:400px;">
<script type="text/javascript">
    var myChart2 = echarts.init(document.getElementById('graficaElectricidad'));

    var option2 = {
    tooltip: {
        formatter: function(params) {
            var value = params.value ? params.value : 0;
            return params.seriesName + '<br/>' + params.name + ' : ' + value + ' kWh';
        }
    },
    series: [
        {
            name: 'Consumo de agua',
            type: 'gauge',
            min: 0,
            max: {{ $resultados['consumoRealElectricidad'][1] }},
            progress: {
                show: true,
                itemStyle: {
                    color: {{ $resultados['consumoRealElectricidad'][0] }} > {{ $resultados['consumoRealElectricidad'][1] }} ? '#F44336' : '#FFFF00'
                }
            },
            detail: {
                valueAnimation: true,
                formatter: function(params) {
                    return  {{ $resultados['consumoRealElectricidad'][0] }} + '\nkWh';
                },
                offsetCenter: [0, '60%']  
            },
            data: [
                {
                    value: {{ $resultados['consumoRealElectricidad'][0] }},
                    name: 'Consumo de electricidad'
                }
            ]
        }
    ]
};


myChart2.setOption(option2);

</script>
</div>
@endsection


@section('comentarios')
<marquee behavior="scroll" direction="left" scrollamount="5">
    Ahorra energía y agua. ¡Cuida el planeta! 🌍 · Apaga las luces no necesarias · Cierra los grifos correctamente · Aprovecha la luz natural · No malgastes papel
</marquee>
@endsection


<script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
