<?php
require_once "../Controller/JuegoController.php";

if (isset($_POST["juego"])) {
    $o = JuegoController::select_codigo($_POST["juego"]);
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="codigo" value="<?php echo $o->codigo ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $o->nombre_juego ?>"><br>
        Consola: <select name="consola">

            <option value="PS4" <?php if ($o->nombre_consola == "PS4")
                echo "selected" ?>>Play Station 4</option>
                <option value="Nintendo" <?php if ($o->nombre_consola == "Nintendo")
                echo "selected" ?>>Nintendo</option>
                <option value="XBox" <?php if ($o->nombre_consola == "XBox")
                echo "selected" ?>>Xbox One</option>
            </select><br>
            Año: <input type="text" name="anno" value="<?php echo $o->anno ?>"><br>
        Precio: <input type="number" name="precio" value="<?php echo $o->precio ?>"><br>
        Alguilado: <select name="alguilado">
            <option value="SI">SI</option>
            <option value="NO">NO</option>
        </select><br>
        <!-- Imagen: <input type="file" name="imagen" value="<?php echo $o->imagen ?>"><br>-->
        Descripcion: <textarea name="descripcion" placeholder="<?php echo $o->descripcion ?>"></textarea><br>
        <input type="submit" name="volver" value="Volver">
        <input type="submit" name="modificar" value="Modificar">
        <br>
        <?php
        if (isset($result))
            if ($result)
                echo "<font color=green>Juego insertado correctamente.</font>";
            else
                echo "<font color=red>Error al insertar el juego</font>";
        ?>
    </form>

    <?php
}
if (isset($_POST["volver"]))
    header("location: index.php");
if (isset($_POST["modificar"])) {
    // Obtener las iniciales de cada palabra en mayúsculas
    $palabras = explode(' ', $_POST["nombre"]);
    $iniciales = implode('', array_map(function ($word) {
        return substr($word, 0, 1);
    }, $palabras));

    $resultado = $iniciales . "-" . $_POST["consola"];
    $o = new Juego($resultado, $_POST["nombre"], $_POST["consola"], $_POST["anno"], $_POST["precio"], $_POST["alguilado"], "", $_POST["descripcion"]);
    $modificacion = JuegoController::update($o, $_POST["codigo"]);
    if ($modificacion) {
        echo "<font color=green>Juego modificado correctamente.";
        echo "<br><a href=index.php><button>Volver a inicio</button></a>";
    } else {
        echo "<font color=red>Error al modificar el juego";
        echo "<br><a href=index.php><button>Volver a inicio</button></a>";
    }
}
?>