<?php
require_once "../Controller/ClienteController.php";
require_once "../Controller/JuegoController.php";
require_once "../Controller/AlguiladoController.php";

session_start();

if (isset($_SESSION["cliente"])) {
    if (isset($_POST["devolver"])) {
        //$result1 = JuegoController::update_alguilado_no($_POST["codigo"]);
        // $result2 = AlguiladoController::update_devol(date("Y-m-d"), $_POST["id"]);

        //if ($result1 && $result2) {
        echo "BUERNARDO";
        // Convertir las cadenas a objetos DateTime
        $fecha2 = strtotime(date("Y-m-d"));
        $fecha1 = strtotime($_POST["fecha"]);

        // Calcular la diferencia en segundos
        $diferenciaEnSegundos = $fecha2 - $fecha1;

        // Calcular la diferencia en días
        $diferenciaEnDias = $diferenciaEnSegundos / (60 * 60 * 24);

        echo "Diferencia en días: $diferenciaEnDias días";

    }
    echo "Hola " . $_SESSION["cliente"]->nombre . "<br>";
    $os = AlguiladoController::select_tabla($_SESSION["cliente"]->dni);
    ?>
    <table border=1>
        <thead>
            <th>Caratula</th>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Año</th>
            <th>Fecha Alquiler</th>
            <th>Fecha Devolucion Estimada</th>
            <th>Fecha Devolucion</th>
        </thead>
        <tbody>
            <?php

            foreach ($os as $o) {
                $nuevaFecha = date("Y-m-d", strtotime($o["fecha_alquiler"] . " +7 days"));
                echo "<tr>";
                echo "<td><img src=$o[imagen] width=50 height=50></td>";
                echo "<td>$o[nombre_juego]</td>";
                echo "<td>$o[nombre_consola]</td>";
                echo "<td>$o[anno]</td>";
                echo "<td>$o[fecha_alquiler]</td>";
                echo "<td>$nuevaFecha</td>";
                if ($o["fecha_devol"] == null)
                    echo "<td><form action='' method='POST'><input type=hidden name=id value=$o[id]><input type=hidden name=codigo value=$o[cod]><input type=hidden name=fecha value=$nuevaFecha><input type='submit' name='devolver' value='Devolver'></form></td>";
                else
                    echo "<td>$o[fecha_devol]</td>";
                echo "</tr>";

            }
            ?>
        </tbody>
    </table>
    <?php
}
?>

<form action="index.php" method="POST">
    <input type="submit" name="volver" value="Volver">
</form>