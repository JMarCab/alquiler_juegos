<html>
<?php
require_once("../Controller/ClienteController.php");

if (isset($_POST["volver"]))
    header("location: index.php");

if (isset($_POST["entrar"])) {
    $o = ClienteController::select($_POST["dni"], $_POST["pass"]);

    if ($o != null) {
        session_start();
        $_SESSION["cliente"] = $o;
        header("location: index.php");
    } else {
        $error = true;
    }
}
?>
<form action="" method="POST">
    DNI: <input type="text" name="dni">
    <br>
    Clave: <input type="text" name="pass">
    <br><br>
    <input type="submit" name="entrar" value="Entrar">
    <input type="submit" name="volver" value="Volver">
    <?php if (isset($error) && $error == true)
        echo "<br><br><font color=red>Usuario o contraseña incorrecta.</font>"; ?>
</form>

</html>