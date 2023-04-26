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
                    
                 <?php
                 
                 
                        echo "<td>".$datoPelicula[1]."</td>";
                        echo "<td>".$datoPelicula[2]."</td>";
                        echo "<td>".$datoPelicula[3]."</td>";
                        echo "<td>".$datoPelicula[8]."'</td>";
                        echo "<td>".$datoPelicula[7]."€</td>";
                        echo "<td>".$datoPelicula[9]."€</td>";
                        
                    ?>
                    
                </tr>
                <tr>
                    <input type="hidden" name="act0" value="<?php echo $datoPelicula[0] ?>">
                    <td><input value="<?php $datoPelicula[1]?>" name="actulizar1"></td>
                    <td><input value="<?php $datoPelicula[2]?>" name="<actualizar2"></td>
                    <td><input value="<?php $datoPelicula[3]?>" name="actualizar3"></td>
                    <td><input value="<?php $datoPelicula[8]?>" name="actualizar4"></td>
                    <td><input value="<?php $datoPelicula[7]?>" name="actualizar5"></td>
                    <td><input value="<?php $datoPelicula[9]?>" name="actualizar6"></td>
             
                </tr>
            </table>
            <input type="submit" value="actualizar">
            <input tipe="submit" value="cancelar">
        </form>
    </body>
</html>