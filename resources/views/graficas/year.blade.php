@extends('plantillas.graphTemplate')


@section('title', 'Graficas de consumo anual')
@section('subtitle', 'Grafica de consumo anual')

@section('graficaAgua')
<h3>Consumo anual de agua 💧</h3>

@endsection


@section('graficaElectricidad')
<h3> Consumo anual de electricidad ⚡️ </h3>

@endsection

<script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
