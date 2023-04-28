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
    <body>
        <?php
$origen = $_POST["origen"];//recopilamos los datos
$destino = $_POST["destino"];
//array asociativo
$bar = array ( "Barcelona" => "0", "Coruña" => "1188", "Madrid" => "621", "Sevilla" => "1046");
$cor = array ( "Barcelona" => "1188", "Coruña" => "0", "Madrid" => "609", "Sevilla" => "947");
$mad = array ( "Barcelona" => "621", "Coruña" => "609", "Madrid" => "0", "Sevilla" => "538");
$sev = array ( "Barcelona" => "1046", "Coruña" => "947", "Madrid" => "538", "Sevilla" => "0");
$resultados = array (// para hacer el array bidimensional
  "Barcelona" => $bar,
  "Coruña" => $cor,
  "Madrid" => $mad,
  "Sevilla" => $sev
  );
echo "La distancia es : \n";
echo $resultados[$origen][$destino];// mostrara la distancia entre origen y destino
// al ser string los selecciona directamente
        ?>
    </body>
</html>
