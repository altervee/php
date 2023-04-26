<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

    <head>

         <meta charset="UTF-8">
        <meta http-equiv="10;url=listado.php" />
        <title></title>

    </head>
    <body>
        
                    <?php
$conexion = mysqli_connect("localhost", "sa", "sa", "decine");
      if(mysqli_connect_errno()) {
      echo "La conexión con la base de datos ha fallado";
      } else {
         echo "estamos conectados"; //comprobaciones mias
      }
?>
                <?php
        error_reporting(0);// es para que no me de error por no a ver cogido los act
        if (isset($_POST['cancelar'])){// en el caso de que se puse cancelar
            echo ' <h1>Ha pulsado cancelar</h1>';
            mysqli_close($conexion);//rollback improvisado
        }else  if (isset($_POST['actualizar'])){
            echo '<h1>Ha pulsado actualizar</h1>';
        }?>
    
        <?php
        $act0=$_POST['actualizar0'];
         $act1=$_POST['actualizar1'];
         $act2=$_POST['actualizar2'];
         $act3=$_POST['actualizar3'];
         $act8=$_POST['actualizar8'];
         $act7=$_POST['actualizar7'];
         $act9=$_POST['actualizar9'];
         
         $consulta = mysqli_query($conexion, "UPDATE film SET title='".$act1."', "// con estas cosultas cambiamos los datos de la nueva
                 . "description='".$act2."', release_year='".$act3."', "
                 . "length='".$act8."', rental_rate='".$act7."', "
                 . "replacement_cost='".$act9."' WHERE "
                 . "film_id='".$act0."';");// La id de la peli se seleciona 
         $stmt= mysqli_stmt_init($conexion);//comprobamos de nuevo la conexion
         if(mysqli_connect_errno()){
             echo "La conexión con la base de datos ha fallado";
             exit();
         }
         
         if (mysqli_stmt_prepare($stmt, $consulta)){
             mysqli_stmt_bind_param($stmt,"issiiii", $act0,$act1,$act2,$act3,$act8,$act7,$act9);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_close($stmt);
         

        
         }
         mysqli_close($conexion);
        ?>
        <form method="post" action="listado.php">
            <input type="submit" name="continuar" value="continuar">
        </form>
    </body>
</html>