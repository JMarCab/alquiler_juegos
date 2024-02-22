<?php
require_once "Conexion.php";
require_once "../Model/Cliente.php";

class ClienteController
{
    public static function insert($o)
    {
        try {
            $conn = new Conexion();
            $stmt = $conn->prepare("INSERT INTO cliente VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$o->dni, $o->nombre, $o->apellidos, $o->direccion, $o->localidad, $o->clave, $o->tipo]);
            if ($stmt->rowCount() > 0) {
                $conn = null;

                return true;
            }
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
        return false;
    }

    public static function select($dni, $pass)
    {
        try {
            $conn = new Conexion();
            $stmt = $conn->prepare("SELECT * FROM cliente WHERE DNI = ?");
            if ($stmt->execute([$dni])) {
                if ($o = $stmt->fetch())
                    if (password_verify($pass, $o->Clave)) {
                        return new Cliente($o->DNI, $o->Nombre, $o->Apellidos, $o->Direccion, $o->Localidad, $o->Clave, $o->Tipo);
                    }
            }
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }

        return null;
    }

}