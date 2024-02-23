@extends('plantillas.graphTemplate')


@section('title', 'Graficas de consumo anual')
@section('subtitle', 'Grafica de consumo diario')

@section('graficaAgua')
<div id = 'grafica' style="width: 600px;height:400px;">
    <script type="text/javascript">

var myChart = echarts.init(document.getElementById('grafica'));
      option = {
  xAxis: {
    type: 'category',
    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: [120, 200, 150, 80, 70, 110, 130],
      type: 'bar'
    }
  ]
};

myChart.setOption(option);
    </script>
<div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
