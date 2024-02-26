@extends('plantillas.graphTemplate')


@section('title', 'Graficas de consumo anual')
@section('subtitle', 'Grafica de consumo mensual')
<?php setlocale(LC_TIME, 'es_ES.UTF-8'); ?>
@section('graficaAgua')
  <!-- En la grafica se obtiene el mes actual y el anterior de manera logica
      Por lo que si cambiamos de mes, el codigo se adapta. Habría que hacer el mismo cambio en las consultas. -->
  <h3> Consumo mensual de agua 💧</h3>
  <div id = 'grafica' style="width: 600px;height:400px;">
    <script type="text/javascript">
      var myChart1 = echarts.init(document.getElementById('grafica'));
        option1 = {
          xAxis: {
            type: 'category',
            data: ["{{ strftime('%B', strtotime('-1 month')) }}", "{{ strftime('%B') }}"],
          },
          yAxis: {
            type: 'value',
            name: 'Consumo (m3)'
          },
          series: [
            {
              data: [{{$resultados['consumoTotalEneroAgua']}}, {{$resultados['consumoTotalFebreroAgua']}}],
              type: 'bar'
            }
          ]
        };
      myChart1.setOption(option1);

    </script>
  </div>
@endsection


@section('graficaElectricidad')
        <h3> Consumo mensual de electricidad  ⚡</h3>
        <div id = 'grafica2' style="width: 600px;height:400px;">
          <script type="text/javascript">
            var myChart2 = echarts.init(document.getElementById('grafica2'));
              option2 = {
                xAxis: {
                  type: 'category',
                  data: ["{{ strftime('%B', strtotime('-1 month')) }}", "{{ strftime('%B') }}"],
                },
                yAxis: {
                  type: 'value',
                  name: 'Consumo (kWh)'
                },
                series: [
                  {
                    data: [{{$resultados['consumoTotalEneroElectricidad']}}, {{$resultados['consumoTotalFebreroElectricidad']}}],
                    type: 'bar'
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
