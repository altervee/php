<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 3</title>
    </head>
    <?php
        $conexion = mysqli_connect("localhost", "sa", "sa", "decine");
        if(mysqli_connect_errno()) {
            echo "La conexión con la base de datos ha fallado";
            exit;
        }
        $consultaCategorias = mysqli_query($conexion, "select name from category");
        $numCategorias = mysqli_num_rows($consultaCategorias);
    ?>
    <body>
        <form action="listado.php" method="post">
            <select id="elegirGenero" name="elegirGenero">
                <?php
                    for ($i = 0; $i < $numCategorias; $i++) {
                        $categoria = mysqli_fetch_row($consultaCategorias);
                        echo "<option value='".($i+1)."'>".$categoria[0]."</option>";
                    }
                ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar">
        </form>
    <?php
        if(isset($_POST["mostrar"])) {
            $consultaPeliculasPorGenero = mysqli_query($conexion, "SELECT title, release_year FROM film, category, film_category WHERE "
                    . "film_category.category_id=category.category_id AND film.film_id=film_category.film_id and category.category_id=".$_POST["elegirGenero"]);
            $numPeliculasPorGenero = mysqli_num_rows($consultaPeliculasPorGenero);

            echo "<table border>";
                echo "<tr>";
                    echo "<th>TÍTULO</th>";
                    echo "<th>AÑO</th>";
                echo "</tr>";
                for($i = 0; $i < $numPeliculasPorGenero; $i++) {
                    $peliculaPorGenero = mysqli_fetch_row($consultaPeliculasPorGenero);
                    echo "<tr>";
                    ?>
                        <form action="editar.php" method="post">
                            <td><?php echo $peliculaPorGenero[0] ?></td>
                            <input type="hidden" name="titulo" value="<?php echo $peliculaPorGenero[0] ?>">
                            <td><?php echo $peliculaPorGenero[1] ?></td>
                            <td><input type="submit" name="enviar" value="Enviar"></td>
                        </form>
                            <?php
                        }
                    echo "</tr>";
                }
            echo "</table>";
    ?>
    </body>
</html>
