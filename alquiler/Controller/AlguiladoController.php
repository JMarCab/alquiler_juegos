<?php
require_once "Conexion.php";
require_once "../Model/Alguilado.php";
require_once "../Model/Cliente.php";

class AlguiladoController
{
    public static function insert(Alguilado $o)
    {
        try {
            $conn = new Conexion();
            $result = $conn->exec("INSERT INTO alquiler VALUES (null, '$o->cod_juego', '$o->dni_cliente', '$o->fecha_alquiler', null)");
            $conn = null;
            return $result;
        } catch (PDOException $ex) {
            // echo $ex->getTraceAsString();
        }
        return 0;
    }

    public static function update(Alguilado $o, $id)
    {
        try {
            $conn = new Conexion();
            $result = $conn->exec("UPDATE alquiler SET Cod_Juego = '$o->cod_juego', DNI_cliente = '$o->dni_cliente', Fecha_alquiler = '$o->fecha_alquiler', Fecha_devol = '$o->fecha_devol' WHERE id = $id");
            $conn = null;
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        return 0;
    }

    public static function update_devol($fecha, $id)
    {
        try {
            $conn = new Conexion();
            $result = $conn->exec("UPDATE alquiler SET Fecha_devol = '$fecha' WHERE id = $id");
            $conn = null;
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        return 0;
    }

    public static function delete($id)
    {
        try {
            $conn = new Conexion();
            $conn->exec("DELETE FROM alquiler WHERE id = $id");
            $conn = null;
            return true;
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        $conn = null;
        return false;
    }

    public static function select_tabla($dni)
    {
        $conn = new Conexion();
        $result = $conn->query("SELECT juegos.*, alquiler.* FROM juegos JOIN alquiler ON juegos.Codigo = alquiler.Cod_juego WHERE alquiler.DNI_cliente = '$dni'");
        $os = null;
        while ($o = $result->fetch()) {
            $os[] = array("id" => $o->id, "cod" => $o->Cod_juego, "imagen" => $o->Imagen, "nombre_juego" => $o->Nombre_juego, "nombre_consola" => $o->Nombre_consola, "anno" => $o->Anno, "fecha_alquiler" => $o->Fecha_alquiler, "fecha_devol" => $o->Fecha_devol);
        }
        return $os;
    }
}