<?php
class Alguilado
{
    private $id;
    private $cod_juego;
    private $dni_cliente;
    private $fecha_alquiler;
    private $fecha_devol;

    public function __construct($id = '', $cod_juego = '', $dni_cliente = '', $fecha_alquiler = '', $fecha_devol = '')
    {
        $this->codigo = $id;
        $this->cod_juego = $cod_juego;
        $this->dni_cliente = $dni_cliente;
        $this->fecha_alquiler = $fecha_alquiler;
        $this->fecha_devol = $fecha_devol;
    }

    public function modify($id, $cod_juego, $dni_cliente, $fecha_alquiler, $fecha_devol)
    {
        $this->codigo = $id;
        $this->cod_juego = $cod_juego;
        $this->dni_cliente = $dni_cliente;
        $this->anno = $fecha_alquiler;
        $this->precio = $fecha_devol;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }


}

?>