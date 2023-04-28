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
      
$tamano = $_POST["tamano"];
$base = $_POST["Base"];
$salsa = $_POST["salsa"];
if($tamano==2.95)
{//  unos if para que salgan los datos ordenados y los que se requieren
echo("Tamaño Mini.....".$tamano."<br>");

}elseif($tamano==4.95)
{
echo("Tamaño mediano..".$tamano."<br>");
}elseif($tamano==8.95)
{
echo("Tamaño maxi.....".$tamano."<br>");
}

if($base==0)
{
echo("Base normal...".$base."<br>");

}elseif($base==1)
{
echo("Base crujiente..".$base."<br>");
}elseif($base==2)
{
echo("base rellena.....".$base."<br>");
}
if($salsa==0)
{
echo("salsa ninguna...".$salsa."<br>");

}elseif($salsa==0.95)
{
echo("salsa barbacoa..".$base."<br>");
}elseif($salsa==1.45)
{
echo("salsa carbonara.....".$salsa."<br>");
}
//ingredientes
$valIng = $_POST["ingredientes"];
$ingre = array(
    array("pollo", 0.55),
    array("bacon", 0.75),
    array("jamon", 0.95),
    array("cebolla", 0.45),
    array("aceitunas", 0.55),
    array("pimiento", 0.55),
);
echo("Ingredientes:"."<br>");
$preciosIng = 0;
for ($i = 0;$i < sizeof($valIng); $i++){
$preciosIng += $ingre[$valIng[$i]][1];// hago el sumatorio de los ingredirntes
}
for ($i = 0;$i < sizeof($valIng); $i++){// para sacar los resultados de ingredientes mediante un for sacara el unmero de selecionados i veces
echo $ingre[$valIng[$i]][0]." ".$ingre[$valIng[$i]][1]." €"."<br>";// hago el sumatorio de los ingredirntes
}
$total = $tamano + $base + $salsa + $preciosIng;
echo "Precio Total:  ".$total;

        ?>
    </body>
    <!-- Segun un if determinado sale un echo determinado para lo que selecina el usuario -->
    <!-- En la parte de ingredientes las recopilo en arrays y creo un for para el sumatorio de ingredientes junto aotro que los muestra por panatalla -->
</html>
