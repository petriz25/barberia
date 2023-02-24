<?php 

namespace Model;

class Empleado extends ActiveRecord{
    protected static $tabla = 'empleados';
    protected static $columnasBD=['id', 'nombre', 'apellido'];

    public $id='';
    public $nombre='';
    public $apellido='';

    public function __construct($args = []){
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
    }
}