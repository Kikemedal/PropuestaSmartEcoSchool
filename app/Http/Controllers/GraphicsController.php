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
        
        $anoActual = 2023;
        $anoAnterior = 2022;

        //En las consultas se usan 1, 2, 12 para obtener las consultas segun el mes.
        //Si los datos fueran en base al mes actual, se usaria la funcion MONTH(NOW()) para obtener el mes actual.
        //Asi restandole uno podriamos obtener el mes anterior.
        //Si da 0 pues aplicariamos logica con php para que sea 12, fuera de la consulta.

        // Consultas para el sensor de electricidad (id 1)
        $queryEneroElectricidad = "(SELECT m.consumo
                    FROM measurements m
                    WHERE MONTH(m.fecha) = 1 AND YEAR(m.fecha) = $anoActual AND m.id_sensor = 1
                    ORDER BY m.fecha DESC
                    LIMIT 1)";

        $queryFebreroElectricidad = "(SELECT m.consumo
                    FROM measurements m
                    WHERE MONTH(m.fecha) = 2 AND YEAR(m.fecha) = $anoActual AND m.id_sensor = 1
                    ORDER BY m.fecha DESC
                    LIMIT 1)";

        $queryDiciembreElectricidad = "(SELECT m.consumo
                    FROM measurements m
                    WHERE MONTH(m.fecha) = 12 AND YEAR(m.fecha) = $anoAnterior AND m.id_sensor = 1
                    ORDER BY m.fecha DESC
                    LIMIT 1)";

        // Consultas para el sensor de agua (id 2)
        $queryEneroAgua = "(SELECT m.consumo
                    FROM measurements m
                    WHERE MONTH(m.fecha) = 1 AND YEAR(m.fecha) = $anoActual AND m.id_sensor = 2
                    ORDER BY m.fecha DESC
                    LIMIT 1)";

        $queryFebreroAgua = "(SELECT m.consumo
                    FROM measurements m
                    WHERE MONTH(m.fecha) = 2 AND YEAR(m.fecha) = $anoActual AND m.id_sensor = 2
                    ORDER BY m.fecha DESC
                    LIMIT 1)";

        $queryDiciembreAgua = "(SELECT m.consumo
                    FROM measurements m
                    WHERE MONTH(m.fecha) = 12 AND YEAR(m.fecha) = $anoAnterior AND m.id_sensor = 2
                    ORDER BY m.fecha DESC
                    LIMIT 1)";

        // Obtener los consumos
        $consumoEneroElectricidad = DB::select($queryEneroElectricidad)[0]->consumo;
        $consumoFebreroElectricidad = DB::select($queryFebreroElectricidad)[0]->consumo;
        $consumoDiciembreElectricidad = DB::select($queryDiciembreElectricidad)[0]->consumo;

        $consumoEneroAgua = DB::select($queryEneroAgua)[0]->consumo;
        $consumoFebreroAgua = DB::select($queryFebreroAgua)[0]->consumo;
        $consumoDiciembreAgua = DB::select($queryDiciembreAgua)[0]->consumo;

        // Calcular los consumos totales
        $consumoTotalEneroElectricidad = $consumoEneroElectricidad - $consumoDiciembreElectricidad;
        $consumoTotalFebreroElectricidad = $consumoFebreroElectricidad - $consumoEneroElectricidad;

        $consumoTotalEneroAgua = $consumoEneroAgua - $consumoDiciembreAgua;
        $consumoTotalFebreroAgua = $consumoFebreroAgua - $consumoEneroAgua;

        $resultados = [
            "consumoTotalEneroElectricidad" => $consumoTotalEneroElectricidad,
            "consumoTotalFebreroElectricidad" => $consumoTotalFebreroElectricidad,
            "consumoTotalEneroAgua" => $consumoTotalEneroAgua,
            "consumoTotalFebreroAgua" => $consumoTotalFebreroAgua
        ];

        return view('graficas.month') -> with('resultados', $resultados);

    }


    public function compararSemana(){

        return view('graficas.week');

    
    }

    public function compararDia(){

        return view('graficas.day');

    }

}
