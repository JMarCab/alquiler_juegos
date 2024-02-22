<?php
require_once "../Controller/ClienteController.php";

if (isset($_POST["register"])) {
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $o = new Cliente($_POST["dni"], $_POST["name"], $_POST["surn"], $_POST["dir"], $_POST["loc"], $pass, "cliente");
    if (ClienteController::insert($o)) {
        session_start();
        $_SESSION["cliente"] = $o;
    } else {
        $error = true;
    }
}
?>
<form action="" method="POST">
    DNI: <input type="text" name="dni"><br>
    Nombre: <input type="text" name="name" value="Adrián"><br>
    Apellidos: <input type="text" name="surn" value="Pino"><br>
    Direccion: <input type="text" name="dir" value="Melancolia, 17"><br>
    Localidad: <input type="text" name="loc" value="Montilla"><br>
    Clave: <input type="text" name="pass"><br>
    <input type="submit" name="register" value="Registrarse">
    <?php if (isset($error) && $error == true)
        echo "<br><br><font color=red>Usuario o contraseña incorrecta.</font>"; ?>
</form>