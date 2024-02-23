<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

  <!-- Incluimos un fichero CSS personalizado creado por nosotros -->
  <!-- Usamos para ello el helper "asset", que genera la URL completa que apunta al fichero pasado por parámetro -->
  <!-- Usamos las llaves dobles para invocal un helper -->
  <!--  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" /> -->

  <!-- Marcador donde incluiremos el título de la página. El primer parámetro (title) contiene el identificador y el segundo (Tienda online) contiene el valor por defecto que se usará en caso de que no se le asigne ningún valor al marcador-->
  <title>@yield('title', 'Plantilla de graficas')</title>   

</head>

<body>
  <!-- header -->

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Esto sera modificado por cada grafica')</h2>
    </div>
  </header>
  <!-- header -->
  
  <!-- Cuerpo que será sustituido en las vistas hijas donde se añadiran las graficas visuales -->
  <div class="container my-4">
    <div class="row">
      <div class= "col"> 
        @yield('graficaAgua')
        </div>
      </div>
      <div class= "col">
        @yield('graficaElectricidad')
      </div>
    </div>
  </div>


  <!--Consejos acerca del ahorro de energía y agua -->
  <div class="container my-4">
    <div class="text-center">
      @yield('comentarios')
    </div>
  </div>


  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- echarts -->

</body>

</html>