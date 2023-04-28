<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                    $conexion = mysqli_connect('localhost', 'sa', 'sa', 'nba');//establecer la conexion
        if (mysqli_connect_errno()) {
            echo "La conexión con la base de datos ha fallado";//si falla 
        } else {
            echo "Estamos conectados";//si hemos enrado en la BD
        }
        include "Phtml.php";
?>
<?php
$sql="SELECT * FROM equipo";
$result =mysqli_query($conexion,$sql);
$equipos=[];
if (mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){//asociamos el array
        $equipos[]=$row;
    }
}

        $pagina = new Phtml("");
$pagina->cabecera();

$pagina->title("green", "50", "Titulo de la pagina");
$pagina->addTexto("Ejemplo de la clase Phtml");
$pagina->abrirFormulario("", "Integrantes de equipos");
$pagina->selecOption("equipos",$equipos);
$pagina->cerrarFormulario();
if(isset($_POST["mostrar"])) {
    $zero=0;
    $miequipo= $_POST['equipos'];
    
    $jugadores ="SELECT Nombre  FROM jugador  WHERE Nombre_equipo='".$miequipo."'";
$resultadoJug = mysqli_query($conexion, $jugadores);
$jugador=[];
if (mysqli_num_rows($resultadoJug)>0){
    while($mostrarNombres = mysqli_fetch_array($resultadoJug)){
  $jugador[]=$mostrarNombres['Nombre'];
    }
}
$numeroFilas= mysqli_num_rows($resultadoJug);

$pagina->trtd($jugador,$numeroFilas,$miequipo);


}
$pagina->pie("black");

echo $pagina->getPagina();
        ?>
    </body>
</html>

