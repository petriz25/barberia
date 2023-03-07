<?php 

namespace Model;

class CitaServicioEmpleado extends ActiveRecord{
    protected static $tabla = 'citasservicios';
    protected static $columnasDB=['id', 'citaId', 'servicioId', 'empleadoId'];

    public $id;
    public $citaId;
    public $servicioId;
    public $empleadoId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->citaId = $args['citaId'] ?? '';
        $this->servicioId = $args['servicioId'] ?? '';
        $this->empleadoId = $args['empleadoId'] ?? '';
    }
}