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
        $cadenas = $_POST["cadena"];// recopilo dtos 
        
        $palabras = explode(" ", $cadenas);// separar por espacios
       
        $pattern = "/^[a|e|i|o|u]/i";// que solo empieze por vocales
        foreach ($palabras as $value){ 
            if (preg_match($pattern,$value)){
                echo ($value.'ay'." ");
            }elseif (!preg_match($pattern,$value)) {
                echo $value." ";
        }
        }

        ?>
    </body>
</html>
