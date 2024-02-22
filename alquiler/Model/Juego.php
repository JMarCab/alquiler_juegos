<?php
class Juego
{
    private $codigo;
    private $nombre_juego;
    private $nombre_consola;
    private $anno;
    private $precio;
    private $alguilado;
    private $imagen;
    private $descripcion;

    public function __construct($codigo = '', $nombre_juego = '', $nombre_consola = '', $anno = '', $precio = 0, $alguilado = '', $imagen = '', $descripcion = '')
    {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alguilado = $alguilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    public function modify($codigo, $nombre_juego, $nombre_consola, $anno, $precio, $alguilado, $imagen, $descripcion)
    {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alguilado = $alguilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
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
        return "Codigo: {$this->codigo}, Nombre Juego: {$this->nombre_juego}, Nombre Consola: {$this->nombre_consola}<br>";
    }


}

?>