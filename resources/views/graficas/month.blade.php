@extends('plantillas.graphTemplate')


@section('title', 'Graficas de consumo anual')
@section('subtitle', 'Grafica de consumo mensual')

@section('graficaAgua')
<h3> Consumo mensual de agua 💧</h3>
<div id = 'grafica' style="width: 600px;height:400px;">
    <script type="text/javascript">

var myChart = echarts.init(document.getElementById('grafica'));
      option = {
  xAxis: {
    type: 'category',
    data: ['Feberero', 'Enero'],
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: [120, 200],
      type: 'bar'
    }
  ]
};

myChart.setOption(option);

const nombre = <?php echo json_encode($resultados['mediaMesActual'])?>;
    </script>
<div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
