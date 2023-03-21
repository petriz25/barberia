<?php 

namespace Model;

class HorarioEmpleado extends ActiveRecord{
    protected static $tabla = 'horarioempleado';
    protected static $columnasDB=['id', 'empleadoId', 'horarioId'];

    public $id;
    public $empleadoId;
    public $horarioId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->empleadoId = $args['empleadoId'] ?? '';
        $this->horarioId = $args['horarioId'] ?? '';
    }
}