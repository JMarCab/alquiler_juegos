<?php
require_once '../Controller/JuegoController.php';

if (isset($_POST["juego"])) {
    $o = JuegoController::select_codigo($_POST["juego"]);

    echo $o->imagen;
    echo "<br><br>";
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

    ?>

    <form action="" method="POST">
        <input type="hidden" name="codigo" value="<?php if (isset($o))
            echo $o->codigo; ?>">
        <input type="submit" name="borrar" value="Borrar">
        <input type="submit" name="cancelar" value="Cancelar">
    </form>

    <?php
}
if (isset($_POST["cancelar"]))
    header("location: index.php");
if (isset($_POST["borrar"])) {
    $borrado = JuegoController::delete($_POST["codigo"]);
    if ($borrado) {
        echo "<font color=green>Juego eliminado correctamente.";
        echo "<br><a href=index.php><button>Volver a inicio</button></a>";
    } else {
        echo "<font color=red>Error al eliminar el juego";
        echo "<br><a href=index.php><button>Volver a inicio</button></a>";
    }
}
?>