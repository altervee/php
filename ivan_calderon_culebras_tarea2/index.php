<!doctype html>
<html>
<head>
    <title>Calderon_Ivan_DWES02_Practica</title>
    <style>
    </style>
</head>
<body>

    <?php
    
    error_reporting(0);
    //expresion  para un array combrobar si es null
    $vacio = '/^\s*$/';
    
    if(isset($_POST['enviar'])){// si enviamos el formulario recopilamos las suiguientes variables
        $nombre= $_POST['nombre'];
        $tel= $_POST['tel'];
        
        if(isset($_POST['enviar']) && (!preg_match($vacio, $nombre))) {// si se envia y el nombre no esta vacio
            $oculto = $_POST["oculto"];
            if(!corrigeArray(creaArray($oculto))) {// si no esta recogido el nombre
                if (empty($_POST['oculto'])){// la variable oculto será nuestro string
                    $oculto = $nombre."_".$tel;// mi string cuando lo recopile por primera vez
                } else{
                    $oculto = $_POST['oculto']."_".$nombre."_".$tel; //en e caso de que no haya coincidencia me hace la tabla
                }
                hacerTabla(creaArray($oculto));// se hace la tabla directamente 
            } else{// si esta en el array 
                $array = creaArray($oculto); 
                if (!preg_match($vacio,$tel)) { //en el caso que el telefono no este vacio
                    for($i = 0; $i < sizeof($array); $i++) {
                        if($array[$i] == $nombre) {
                            $array[$i+1] = $tel; //Si el nombre coincide, se añade el número a la posición contigua.
                        }
                    }
                    $oculto = implode("_", $array); //se remonta el formulario con sus cambios
                    hacerTabla(creaArray($oculto)); //Se imprime el resultado.
                }else{
                    for($i = 0; $i < sizeof($array); $i++) {   //Se recorre el array en busca de la coincidencia del nombre. Si coincide, el array corta dos posiciones desde la coincidencia, borrando así el nombre y el telñefono.                                                                                                                                                    
                        if($array[$i] == $nombre) {          
                                array_splice($array, $i,2);//quita la posicion i y la siguiente 
                            } 
                        }
                        $oculto = implode("_", $array); //Se vuelve a crear el array o agenda para sus nuevos datos
                        hacerTabla(creaArray($oculto));
                }
                }      
        }
        
        if(preg_match($vacio, $nombre)){// aviso de que el array no puede estar vacio y no registra el número en ese caso
            echo 'EL NOMBRE NO PUEDE ESTAR VACIO!!!';
        }
        
    }
    
    ?>
    <form action="index.php" method="post">
        
        <input type="text" placeholder="Nombre" name="nombre">
        <input type="number" placeholder="telefono" name="tel">
        <input type="hidden" name="oculto" value="<?php echo $oculto;?>">
        <input type="submit" name="enviar">
</form>
    <?php
        function corrigeArray($array) {
            foreach ($array as $value) {
                if($_POST["nombre"] == $value) {
                    return true;
                }
            }
            return false;
        }
            function creaArray($oculto) {// creaamos el array en base a la string $oculto
            $array = explode("_", $oculto);
            return $array;
        }
    
    function hacerTabla($array){// para crear la tabla 
       
        echo "<table>";
        echo "<caption>Agenda de contactos</caption>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";
        for($x=0; $x <(sizeof($array)); $x+= 2){// se debe incrementar de 2 en 2 porque asi hace que coincidan los nombres y los numeros
            echo "<tr>";
                echo "<td>".$array[$x]."</td>";
                echo "<td>".$array[$x+1]."</td>";// si se sumase de 2 en 2 solo mostraria los nombres
            echo "</tr>";    
            }
        }
        echo "</table>";
    ?>
</body>
 
</html>