<?php 

namespace Model;

class Cita extends ActiveRecord{
    protected static $tabla = 'citas';
    protected static $columnasDB=['id', 'fecha', 'horaId', 'usuariosId', 'empleadoId'];

    public $id;
    public $fecha;
    public $horaId;
    public $usuariosId;
    public $empleadoId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->horaId = $args['horaId'] ?? null;
        $this->usuariosId = $args['usuariosId'] ?? '';
        $this->empleadoId = $args['empleadoId'] ?? '';
    }
}