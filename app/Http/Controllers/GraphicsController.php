<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\SensorType;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GraphicsController extends Controller
{
    //Este controlador controlará las 4 vistas en 4 distintos metodos. 



    /*
    * Esta funcion tiene como objetivo devolver los datos de agua máximos de agua y electricidad de cada mes de 2022 y de 2023 y pasarselos a la vista.
    */ 

    public function compararAño(){
        //Consumo de cada mes de electricidad.
        /*
        $query = "SELECT CONCAT(YEAR(m.fecha), '-', LPAD(MONTH(m.fecha), 2, '0')) AS fecha,
        MAX(m.consumo) AS consumo_total_mes
        FROM measurements m
        WHERE m.id_sensor = 1
        AND YEAR(m.fecha) = 2022 -- Reemplaza con el año deseado
        GROUP BY YEAR(m.fecha), MONTH(m.fecha)
        ORDER BY fecha;";

        $resultados = DB::select($query);
        */

        //Consumo de cada mes de agua.
        /*
        $query = "SELECT CONCAT(YEAR(m.fecha), '-', LPAD(MONTH(m.fecha), 2, '0')) AS fecha,
        MAX(m.consumo) AS consumo_total_mes
        FROM measurements m
        WHERE m.id_sensor = 2
        AND YEAR(m.fecha) = 2022 -- Reemplaza con el año deseado
        GROUP BY YEAR(m.fecha), MONTH(m.fecha)
        ORDER BY fecha;";

        $resultados = DB::select($query);
        */

        return view('graficas.year');

    }


    public function compararMes(){

        //Para saber el consumo del mes actual necesito saber el consumo acumulado del mes actual y restarselo al cunsumo acumulado
        //del mes anterior. Y para saber el consumo del mes anterior, necesito hacer lo mismo con el mes que le corresponde.
        

        //Obtencion del consumo de ENERO de 2023.
        
        $mesActual = 1; // Enero
        $anoActual = 2023;
        $mesAnterior = 12; // Diciembre
        $anoAnterior = 2022;
        
        $queryMesActual = "SELECT m.consumo
                           FROM measurements m
                           WHERE MONTH(m.fecha) = $mesActual AND YEAR(m.fecha) = $anoActual AND m.id_sensor = 1
                           ORDER BY m.fecha DESC
                           LIMIT 1";
        
        $queryMesAnterior = "SELECT m.consumo
                             FROM measurements m 
                             WHERE MONTH(m.fecha) = $mesAnterior AND YEAR(m.fecha) = $anoAnterior AND m.id_sensor = 1
                             ORDER BY m.fecha DESC
                             LIMIT 1";
        
        $consumoMesActual = DB::select($queryMesActual);
        $consumoMesAnterior = DB::select($queryMesAnterior);
        
        $consumoMesActual = $consumoMesActual[0]->consumo;
        $consumoMesAnterior = $consumoMesAnterior[0]->consumo;
        
        $consumoEnero1 = $consumoMesActual - $consumoMesAnterior;


        //Obtencion del consumo de FEBRERO de 2023.

        $mesFebrero = 2; // Febrero
        $anoFebrero = 2023;
        $mesEnero = 1; // Enero
        $anoEnero = 2023;

        $queryFebrero = "SELECT m.consumo
                 FROM measurements m
                 WHERE MONTH(m.fecha) = $mesFebrero AND YEAR(m.fecha) = $anoFebrero AND m.id_sensor = 1
                 ORDER BY m.fecha DESC
                 LIMIT 1";

        $queryEnero = "SELECT m.consumo
               FROM measurements m 
               WHERE MONTH(m.fecha) = $mesEnero AND YEAR(m.fecha) = $anoEnero AND m.id_sensor = 1
               ORDER BY m.fecha DESC
               LIMIT 1";

        $consumoFebrero = DB::select($queryFebrero);
        $consumoEnero2 = DB::select($queryEnero);

        $consumoFebrero = $consumoFebrero[0]->consumo;
        $consumoEnero2 = $consumoEnero2[0]->consumo;

        $consumoTotalFebrero = $consumoFebrero - $consumoEnero2;

        
        
        dd($consumoTotalFebrero);
        

        return view('graficas.month') -> with('resultados', $consumoTotalFebrero);

    }


    public function compararSemana(){

        return view('graficas.week');

    
    }

    public function compararDia(){

        return view('graficas.day');

    }

}
