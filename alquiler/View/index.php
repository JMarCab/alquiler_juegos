<?php
require_once '../Controller/JuegoController.php';
require_once "../Model/Cliente.php";
session_start();
?>

<html>
<style>
    .links {
        float: right;
    }

    .div {
        border: 1px solid black;
        width: 400px;
        display: inline-block;
        margin-right: 10px;
    }
</style>

<nav>
    <?php
    if (isset($_SESSION["cliente"])) {
        echo "Hola " . $_SESSION["cliente"]->nombre;
    }
    ?>

    <div class="links">
        <?php
        if (isset($_SESSION["cliente"])) {
            echo "<a href=cerrar.php>Cerrar sesión</a>";
        } else {
            echo "<a href=login.php>Login</a> ";
            echo " <a href=register.php>Register</a>";
        }
        ?>
    </div>
</nav>
<br>
<?php
if (isset($_SESSION["cliente"])) {
    ?>
    <!-- <form action="" method="POST">
        <fieldset>
            <legend>Selecciona algo brother:</legend>
            <div>
                <input type="radio" id="todos" name="juegos" value="todos" checked>
                <label for="todos">Todos</label><br>
                <input type="radio" id="alquilados" name="juegos" value="alquilados">
                <label for="alquilados">Alquilados</label><br>
                <input type="radio" id="noalquilados" name="juegos" value="noalquilados">
                <label for="noalquilados">No Alquildos</label>
            </div>
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form> -->
    <form action="" method="POST">
        <input type="submit" name="todos" value="Todos">
        <input type="submit" name="alquilados" value="Alquilados">
        <input type="submit" name="noalquilados" value="No Alquilados">
        <input type="submit" name="misjuegos" value="Mis juegos alquilados">
        <input type="submit" name="nuevojuego" value="Nuevo juego">
    </form>
    <br>
    <?php
    if (isset($_POST["todos"])) {
        $os = JuegoController::select_all();
        echo "<nav>";
        if ($os != null) {
            foreach ($os as $o) {
                echo "<div class=div>";
                echo ($o->nombre_juego);
                echo "<br>";
                echo "<a href='detalle.php?juego=$o->codigo'><img src=$o->imagen width=50 height=50></a>";
                echo "<br>";
                if ($_SESSION["cliente"]->tipo == "admin")
                    echo "<form action='modificar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Modificar'></form><form action='borrar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Borrar'></form>";
                echo "</div>";
            }
        }
        echo "</nav>";
    } else if (isset($_POST["alquilados"])) {
        $os = JuegoController::select_alquilados();
        echo "<nav>";
        if ($os != null) {
            foreach ($os as $o) {
                echo "<div class=div>";
                echo ($o->nombre_juego);
                echo "<br>";
                echo "<a href='detalle.php?juego=$o->codigo'><img src=$o->imagen width=50 height=50></a>";
                echo "<br>";
                if ($_SESSION["cliente"]->tipo == "admin")
                    echo "<form action='modificar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Modificar'></form><form action='borrar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Borrar'></form>";
                echo "</div>";
            }
        }
        echo "</nav>";
    } else if (isset($_POST["noalquilados"])) {
        $os = JuegoController::select_no_alquilados();
        echo "<nav>";
        if ($os != null) {
            foreach ($os as $o) {
                echo "<div class=div>";
                echo ($o->nombre_juego);
                echo "<br>";
                echo "<a href='detalle.php?juego=$o->codigo'><img src=$o->imagen width=50 height=50></a>";
                echo "<br>";
                if ($_SESSION["cliente"]->tipo == "admin")
                    echo "<form action='modificar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Modificar'></form><form action='borrar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Borrar'></form>";
                echo "</div>";
            }
        }
        echo "</nav>";
    } else if (isset($_POST["misjuegos"])) {
        header("location: misjuegos.php");

    } else if (isset($_POST["nuevojuego"])) {
        header("location: nuevojuego.php");

    } else {
        $os = JuegoController::select_all();
        echo "<nav>";
        if ($os != null) {
            foreach ($os as $o) {
                echo "<div class=div>";
                echo ($o->nombre_juego);
                echo "<br>";
                echo "<a href='detalle.php?juego=$o->codigo'><img src=$o->imagen width=50 height=50></a>";
                echo "<br>";
                if ($_SESSION["cliente"]->tipo == "admin")
                    echo "<form action='modificar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Modificar'></form><form action='borrar.php' method='POST'><input type='hidden' name='juego' value='$o->codigo'><input type='submit' value='Borrar'></form>";
                echo "<br>";
                echo "</div>";
            }
        }
        echo "</nav>";

    }
} else {
    $os = JuegoController::select_all();
    echo "<nav>";
    if ($os != null) {
        foreach ($os as $o) {
            echo "<div class=div>";
            echo ($o->nombre_juego);
            echo "<br>";
            echo "<a href='detalle.php?juego=$o->codigo'>$o->imagen</a>";
            echo "<br>";
            echo "</div>";
        }
    }
    echo "</nav>";
}

?>

</html>