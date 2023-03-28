<?php 

namespace Model;

class Hora extends ActiveRecord{
    protected static $tabla = 'horas';
    protected static $columnasDB = ['id', 'hora', 'disponible'];

    public $id;
    public $hora;
    public $disponible;

}