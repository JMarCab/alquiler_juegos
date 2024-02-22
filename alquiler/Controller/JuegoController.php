<?php
require_once "Conexion.php";
require_once "../Model/Juego.php";

class JuegoController
{
    public static function insert(Juego $o)
    {
        try {
            $conn = new Conexion();
            $result = $conn->exec("INSERT INTO juegos VALUES ('$o->codigo', '$o->nombre_juego', '$o->nombre_consola', '$o->anno', $o->precio, '$o->alguilado', '$o->imagen', '$o->descripcion' )");
            $conn = null;
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        return 0;
    }

    public static function update(Juego $o, $codigo)
    {
        try {
            $conn = new Conexion();
            $result = $conn->exec("UPDATE juegos SET Codigo = '$o->codigo', Nombre_juego = '$o->nombre_juego', Nombre_consola = '$o->nombre_consola', Anno = '$o->anno', Precio = $o->precio, Alguilado = '$o->alguilado', descripcion = '$o->descripcion' WHERE Codigo = '$codigo'");
            $conn = null;
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        return 0;
    }

    public static function delete($codigo)
    {
        try {
            $conn = new Conexion();
            $conn->exec("DELETE FROM juegos WHERE Codigo = '$codigo'");
            $conn = null;
            return true;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        $conn = null;
        return false;
    }

    public static function update_alguilado(Juego $o)
    {
        try {
            $conn = new Conexion();
            $conn->exec("UPDATE juegos SET Alguilado = 'SI' WHERE Codigo = '$o->codigo'");
            $conn = null;
            return true;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        $conn = null;
        return false;
    }

    public static function update_alguilado_no($codigo)
    {
        try {
            $conn = new Conexion();
            $conn->exec("UPDATE juegos SET Alguilado = 'NO' WHERE Codigo = '$codigo'");
            $conn = null;
            return true;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        $conn = null;
        return false;
    }

    public static function select_codigo($codigo)
    {
        $conn = new Conexion();
        $result = $conn->query("SELECT * FROM juegos WHERE Codigo = '$codigo'");
        $o = null;
        if ($o = $result->fetch()) {
            return new Juego($o->Codigo, $o->Nombre_juego, $o->Nombre_consola, $o->Anno,
                $o->Precio, $o->Alguilado, $o->Imagen, $o->descripcion);
        }
        return $o;
    }

    public static function select_alquilados()
    {
        $conn = new Conexion();
        $result = $conn->query("SELECT * FROM juegos WHERE Alguilado = 'SI'");
        $os = null;
        while ($o = $result->fetch()) {
            $os[] = new Juego($o->Codigo, $o->Nombre_juego, $o->Nombre_consola, $o->Anno,
                $o->Precio, $o->Alguilado, $o->Imagen, $o->descripcion);
        }
        return $os;
    }

    public static function select_no_alquilados()
    {
        $conn = new Conexion();
        $result = $conn->query("SELECT * FROM juegos WHERE Alguilado = 'NO'");
        $os = null;
        while ($o = $result->fetch()) {
            $os[] = new Juego($o->Codigo, $o->Nombre_juego, $o->Nombre_consola, $o->Anno,
                $o->Precio, $o->Alguilado, $o->Imagen, $o->descripcion);
        }
        return $os;
    }

    public static function select_all()
    {
        $conn = new Conexion();
        $result = $conn->query("SELECT * FROM juegos");
        $os = null;
        while ($o = $result->fetch()) {
            $os[] = new Juego($o->Codigo, $o->Nombre_juego, $o->Nombre_consola, $o->Anno,
                $o->Precio, $o->Alguilado, $o->Imagen, $o->descripcion);
        }
        return $os;
    }
}