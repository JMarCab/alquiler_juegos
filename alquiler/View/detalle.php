<?php
require_once '../Controller/JuegoController.php';
require_once '../Controller/AlguiladoController.php';
require_once '../Controller/ClienteController.php';

echo date("Y-m-d");

session_start();

if (isset($_GET)) {
    $o = JuegoController::select_codigo($_GET["juego"]);

    echo $o->codigo;
    echo "<br>";
    echo $o->nombre_juego;
    echo "<br>";
    echo $o->nombre_consola;
    echo "<br>";
    echo $o->anno;
    echo "<br>";
    echo $o->precio;
    echo "<br>";
    echo $o->alguilado;
    echo "<br>";
    echo $o->imagen;
    echo "<br>";
    echo $o->descripcion;
    echo "<br>";
    echo "<img src='$o->imagen' width=200 height=200><br>";
    // echo "<a href='index.php'>Volver a inicio</a>";
}
?>

<form action="" method="POST">
    <?php if (isset($_SESSION["cliente"])) { ?>
        <input type="submit" name="alquilar" value="Alquilar" <?php if ($o->alguilado == "SI")
            echo "disabled"; ?>>
    <?php } ?>
    <input type="submit" name="volver" value="Volver">
</form>

<?php
if (isset($_POST["volver"]))
    header("location: index.php");
if (isset($_POST["alquilar"])) {
    $fecha = date("Y-m-d");
    $alguilado = JuegoController::update_alguilado($o);
    $a = new Alguilado("", $o->codigo, $_SESSION["cliente"]->dni, $fecha, null);
    $insertado = AlguiladoController::insert($a);
    echo $insertado;
    if ($alguilado && $insertado) {
        echo "<font color=green>Juego alquilado correctamente.";
    } else
        echo "<font color=red>Error al alquilar el juego";
}
?>