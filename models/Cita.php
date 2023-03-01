<?php 

namespace Model;

class Cita extends ActiveRecord{
    protected static $tabla = 'citas';
    protected static $columnasDB=['id', 'fecha', 'hora', 'usuariosId', 'empleadoId'];

    public $id;
    public $fecha;
    public $hora;
    public $usuariosId;
    public $empleadoId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->usuariosId = $args['usuariosId'] ?? 1;
        $this->empleadoId = $args['empleadoId'] ?? 1;
    }
}