<?php

namespace Model;

class Horarios extends ActiveRecord{
    protected static $tabla = 'citaservicios';
    protected static $columnasDB = ['id', 'horaId', 'citaId', 'empleadoId', 'empleado'];

    public $id;
    public $horaId;
    public $citaId;
    public $empleadoId;
    public $empleado;

    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->horaId = $args['hora'] ?? '';
        $this->citaId = $args['citaId'] ?? '';
        $this->empleadoId = $args['empleadoId'] ?? '';
        $this->empleado = $args['empleado'] ?? '';
        
    }
}