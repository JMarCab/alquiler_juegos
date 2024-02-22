<?php
require_once "../Controller/JuegoController.php";

if (isset($_POST["anadir"])) {
    // var_dump($_POST);
    $primeraLetraMayuscula = strtoupper(substr($_POST["nombre"], 0, 1));
    $resultado = $primeraLetraMayuscula . "-" . $_POST["consola"];
    $ruta = "../fotos/" . $_FILES["imagen"]["name"];
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);



    $o = new Juego($resultado, $_POST["nombre"], $_POST["consola"], $_POST["anno"], $_POST["precio"], "NO", $ruta, $_POST["descripcion"]);
    $result = JuegoController::insert($o);
}
if (isset($_POST["volver"]))
    header("location: index.php");
?>
<form action="" method="POST" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre"><br>
    Consola: <select name="consola">
        <option value="PS4">Play Station 4</option>
        <option value="Nintendo">Nintendo</option>
        <option value="XBox">Xbox One</option>
    </select><br>
    Año: <input type="date" name="anno"><br>
    Precio: <input type="number" name="precio"><br>
    Imagen: <input type="file" name="imagen"><br>
    Descripcion: <textarea name="descripcion"></textarea><br>
    <input type="submit" name="volver" value="Volver">
    <input type="submit" name="anadir" value="Añadir">
    <br>
    <?php
    if (isset($result))
        if ($result)
            echo "<font color=green>Juego insertado correctamente.</font>";
        else
            echo "<font color=red>Error al insertar el juego</font>";
    ?>
</form>