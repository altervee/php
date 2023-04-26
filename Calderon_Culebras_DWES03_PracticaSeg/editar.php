<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
        $titulo = $_POST["titulo"];
        $conexion = mysqli_connect("localhost", "sa", "sa", "decine");
        if(mysqli_connect_errno()) {
            echo "La conexión con la base de datos ha fallado";
            exit;
        }
        $consultaInformacion = mysqli_query($conexion, "select * from film where title='".$titulo."'");
        $datoPelicula = mysqli_fetch_row($consultaInformacion);
    ?>
    <body>
        <form action="actualizar.php" method="post">
            <table border>
                <tr>
                    <th>TÍTULO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>AÑO</th>
                    <th>DURACIÓN</th>
                    <th>COSTE DE ALQUILER</th>
                    <th>COSTE DE SUSTITUCIÓN</th>
                </tr>
                <tr>
                  
                    
                </tr>
                <tr>
                    <input type="hidden" name="actualizar0" value="<?php echo $datoPelicula[0] ?>"><!--Recopilamos codigo de la pelicula-->
                    <td><input value="<?php echo $datoPelicula[1]?>" name="actualizar1" required></td><!--Titulo-->
                    <td><input value="<?php echo $datoPelicula[2]?>" name="actualizar2" required></td><!--descripcion-->
                    <td><input value="<?php echo $datoPelicula[3]?>" name="actualizar3" required></td><!--duracion-->
                    <td><input value="<?php echo $datoPelicula[8]?>" name="actualizar8" required></td>
                    <td><input value="<?php echo $datoPelicula[7]?>" name="actualizar7" required></td>
                    <td><input value="<?php echo $datoPelicula[9]?>" name="actualizar9" required></td>
             
                </tr>
            </table>
            <input type="submit" name="actualizar" value="actualizar">
            <input type="submit" name="cancelar" value="cancelar">
            <h1>Codigo pelicula <?php echo $datoPelicula[0] ?></h1>
        </form>
    </body>
</html>
