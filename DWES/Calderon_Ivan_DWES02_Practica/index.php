
 

<!doctype html>
<html>
<head>
    <title>Calderon_Ivan_DWES02_Practica</title>
    <style>
 
#reg{
    display: inline;
    width: 100%;
}
 
#reg .titulo {
    display: flex;
    width: 100%;
    text-align: center;
}

 
#reg div:first-child input {/*Primer elemento de otros muchos*/
    margin: 0 1em;
    border: 0px;
    font-weight: bold;
    width: 100%;
    text-align: center;
    display: flex;
    background: none;
}
 
#datos {/* centrar datos para que parezca una tabla*/
    width: 100%;
    text-align: center;
    display: flex;
}
 
#datos p {/* datos caracteristicas*/
    font-size: 1rem;
    width: 50%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
.aviso{
    margin: auto;
    background-color: whitesmoke;
    color:red;
    text-align: center;
    height:10%;
    width: 90%;
    border: red 1px solid;
  
}
  h3 {
    text-align: center;
    color: white;
}
form {
    width:20%;
    border: black 3px solid;
    display:flex;
    align-items: center;
    flex-direction: column-reverse;
    justify-content: space-between;
    background: greenyellow;
}

 
    </style>
</head>
<body>
 <?php
 
//se insertan en estas variables los campos introducidos en el formulario
$nombreRegis = filter_input(INPUT_POST, 'nombreRegis');
$telefonoRegis = filter_input(INPUT_POST, 'telefonoRegis');
/* Variables definitivas*/
?>
<form  method="post">
   
    <div>

        <input  type="text" name="nombreRegis" value="<?php $nombreRegis?>" placeholder="Nombre" autofocus><br>
 

            <input type="text" name="telefonoRegis" value="<?php $telefonoRegis?>" placeholder="Número de teléfono"><br>
        <input type="submit">
    </div>
    <div id="reg">
        <div class="titulo">
            <input readonly value="Nombre">
            <input readonly value="Teléfono">
        </div>
        <hr>
        <?php
        $error_reporting = error_reporting(0);
// muetsra la advertencia cuando falta el campo nombre
 
        if (isset($nombreRegis) && strlen($nombreRegis)==0) {
            echo '<div class="aviso">';
            echo '  AVISO!!! El nombre no puede estar vacío.';
            echo '</div>';
        }
 
// indica que no hay elementos registrados en la agenda
        $nombre= filter_input(INPUT_POST, 'nombre');
        if ($nombre) {
            echo '<div class="advertencia">';
            echo '  No hay registros en la agenda.';
            echo '</div>';
        }
 
        $existe = false;//ponemos false para que compare con los datos de la agenda

        //mostrar los datos de la agenda
       
        for ($i=0;$i<count($_POST["nombre"]);$i++) {
 
            $nombre = $_POST["nombre"][$i];//recopilamos
            $telefono = $_POST["telefono"][$i];
 
            if ($nombre==$nombreRegis) {
                //si coincide un nombre ya recopilado
                $existe = true;
                if (strlen($telefonoRegis)==0) {// en el caso de que el nombre o el telefono sea nulo
                    $nombre = null;
                    $telefono = null;
                } else {
                    $telefono = $telefonoRegis;// añadir el nuevo telfono en su respectivo nombre
                }
            }
            if ($nombre==null) {
                
            }else{
                anadirAgenda($nombre, $telefono);
            }
        }
        if ($existe) {// solamente para comprobar si repeticiones 
        }
        else{
            if (strlen($nombreRegis) > 0) {
                anadirAgenda($nombreRegis, $telefonoRegis);
            }
        }
        
 //recopilamos el telefono y el nombre, lo situmos en 2 casillas
        function anadirAgenda($nombre,$telefono) {
            echo '<div id="datos">';
            echo '<td><p>' .$nombre. '</p></td>';
            echo '<td><p>' .$telefono. '</p></td>';
            echo '    <input name="nombre[]" type="hidden" readonly value="'.$nombre.'">';// PARA RECOPILAR NOMBRE
            echo '    <input name="telefono[]" type="hidden" readonly value="'.$telefono.'">';// RECOPILAR telefono
            echo '</div>';
        }
        ?>
    </div>
    
</form>
<h3>AGENDA DE CONTACTOS</h3><!--lo pongo al final para que salga al principio-->
</body>
 
</html>