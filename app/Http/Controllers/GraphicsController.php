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

        //Obtener media del mes anterior al que estamos .
        //Obtener media del mes actual en el que estamos.

        //¿Como sabemos en el mes en el que estamos?
        //Necesito el mes actual en numero y luego segun el numero mostrarlo en pantalla como nombre

        $mes_actual = date("n");
        
        
        $query = "SELECT m.id_sensor, m.consumo, CONCAT(YEAR(m.fecha), '-', LPAD(MONTH(m.fecha), 2, '0')) AS fecha
        FROM measurements m
        INNER JOIN (
            SELECT MAX(fecha) AS ultima_fecha
            FROM measurements
            WHERE id_sensor = 1
            GROUP BY YEAR(fecha), MONTH(fecha)
        ) AS ultimas_fechas ON m.fecha = ultimas_fechas.ultima_fecha
         WHERE (m.id_sensor = 1) AND (fecha LIKE '2022-%%') 
        ORDER BY m.fecha DESC;";

        $resultados = DB::select($query);
        dd($resultados);
        

        return view('graficas.month') -> with('resultados', $resultados);

    }


    public function compararSemana(){

        return view('graficas.week');

    
    }

    public function compararDia(){

        return view('graficas.day');

    }

}
