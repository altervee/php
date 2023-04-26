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
        $cadena = $_POST["cadena"];
        $espBlan = nl2br($cadena);
        echo $espBlan."<br/>";
        echo trim($cadena);//quita los espacios
        ?>
    </body>
</html>
