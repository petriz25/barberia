<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicioEmpleado;
use Model\Servicio;

class APIController{
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar(){
        //Almacena la cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id=$resultado['id'];
        $idEmpleado=$cita->empleadoId;

        $idServicios = explode(',', $_POST['servicios']);


        // //Almacena servicios con el id de la cita
        foreach($idServicios as $idServicio){
            $args = [
                'citaId'=> $id,
                'servicioId' => $idServicio,
                'empleadoId' => $idEmpleado
            ];
            $citaServicio = new CitaServicioEmpleado($args);
            $citaServicio->guardar();
        }

        // //Retornamos una respuesta
        echo json_encode(['resultado' => $resultado]);
    }
}