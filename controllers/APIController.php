<?php

namespace Controllers;

use Model\Cita;
use Model\Servicio;
use Model\HorarioEmpleado;
use Model\CitaServicioEmpleado;

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
        $horario = $cita->horaId;

        $idServicios = explode(',', $_POST['servicios']);


        //Almacena servicios con el id de la cita
        foreach($idServicios as $idServicio){
            $args = [
                'citaId'=> $id,
                'servicioId' => $idServicio,
                'empleadoId' => $idEmpleado
            ];
            $citaServicio = new CitaServicioEmpleado($args);
            $citaServicio->guardar();
        }

        $args2 = [
                'citaId' => $id,
                'empleadoId' => $idEmpleado,
                'horarioId' => $horario
        ];
        $horarioEmpleado = new HorarioEmpleado($args2);
        $horarioEmpleado->guardar();

        //Retornamos una respuesta
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){
        $id = $_POST['id'];
        $cita= Cita::find($id);
        $cita->eliminar();
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}