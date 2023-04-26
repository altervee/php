<?php
$conexion = mysqli_connect("localhost", "sa", "sa", "decine");
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title></title>
        <?php
        if (isset($POST_['cancelar'])){
        ?>
        <meta http-equiv="0;url=listado.php" />
        <?php
        }?>
    </head>
    <body>
        <?php
        $actualizar0=$_POST['actualizar0'];
        $actualizar1=$_POST['actualizar1'];
        $actualizar2=$_POST['actualizar2'];
        $actualizar3=$_POST['actualizar3'];
        $actualizar4=$_POST['actualizar4'];
        $actualizar5=$_POST['actualizar5'];
        $actualizar6=$_POST['actualizar6'];
        
        
        ?>
    </body>
</html>
