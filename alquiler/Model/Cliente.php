<?php
class Cliente
{
    private $dni;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;

    public function __construct($dni = '', $nombre = '', $apellidos = '', $direccion = '', $localidad = '', $clave = '', $tipo = '')
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->clave = $clave;
        $this->tipo = $tipo;
    }

    public function modify($dni, $nombre, $apellidos, $direccion, $localidad, $clave, $tipo)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->clave = $clave;
        $this->tipo = $tipo;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "dni: {$this->dni}, Nombre Juego: {$this->nombre}, Nombre Consola: {$this->apellidos}<br>";
    }


}

?>