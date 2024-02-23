<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\SensorType;

use Illuminate\Http\Request;

class GraphicsController extends Controller
{
    //Este controlador controlará las 4 vistas en 4 distintos metodos. 



    /*
    * Esta funcion tiene como objetivo devolver los datos de agua máximos de agua y electricidad de cada mes de 2022 y de 2023 y pasarselos a la vista.
    */ 

    public function compararAño(){
        //Consumo de cada mes de
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

        return view('graficas.year');

    }


    public function compararMes(){

    }


    public function compararSemana(){

    
    }

    public function compararDia(){

    }

}
