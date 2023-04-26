<?php
 
//se insertan en estas variables los campos introducidos en el formulario
$nombre_new = filter_input(INPUT_POST, 'nombre_new');
$telefono_new = filter_input(INPUT_POST, 'telefono_new');
?>
 
<html>
<head>
    <title>Agenda</title>
    <style>
 
form {
    width:30%;
    padding:10px;
    border: 3px solid black;
    margin: 0 auto;
    border-radius: 10%;

}
 
h2 {
    text-align: center;
}
p {
    font-size: 1.5rem;
}
 
#menu {
    text-align: center;
}
 
#menu label {
    width: 30%;
    display: block;
    float: left;
    margin: 5px 0 5px 45px;
    font-size: 1.2rem;
}
 
#menu input {
    padding: 5px;
    margin: 4px 0x;
    font-size: 1rem;
    margin: 0 0 20px -70px;
}
 
#menu input[type=submit] {
    display: block;
    width: 30%;
    margin: 2em auto;
}
 
#agenda{
    display: inline;
    width: 100%;
}
 
#agenda .titulos {
    display: flex;
    width: 100%;
    text-align: center;
}
 
#agenda div:first-child input {
    margin: 0 1em;
    border: 0px;
    font-weight: bold;
    width: 100%;
    text-align: center;
    display: flex;
    background: none;
}
 
#datos {
    width: 100%;
    text-align: center;
    display: flex;
}
 
#datos p {
    font-size: 1.5rem;
    width: 50%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
 
.warning {
    width: 80%;
    text-align: center;
    background-color: #ee7;
    border: 1px solid #ea2;
    padding: 4px 2.8em;
}
 
.noborder {
    border: none;
    background-color: transparent;
}
 
    </style>
</head>
<body>
 
<form  method="post">
    <h2>AGENDA DE CONTACTOS</h2>
    <div id="menu">
        <label for="formNombre">
            Nombre:
        </label>
            <input id="formNombre" type="text" name="nombre_new" value="<php?=$nombre_new?>" placeholder="Nombre en letras" autofocus>
 
        <label for="formTelefono">
            Teléfono:
        </label>
            <input id="formTelefono" type="text" name="telefono_new" value="<php?=$telefono_new?>" placeholder="En números">
        <input type="submit">
    </div>
    <div id="agenda">
        <div class="titulos">
            <input readonly value="Nombre">
            <input readonly value="Teléfono">
        </div>
        <hr>
        <?php
        /*
            * mostrar advertencia si el nombre esta vacio
            * */
 
        if (isset($nombre_new) && strlen($nombre_new)==0) {
            echo '<div class="warning">';
            echo '  El nombre no puede estar vacío.';
            echo '</div>';
        }
 
        /*
            * Indicar si no hay registros en la agenda
            * */
        $nombre= filter_input(INPUT_POST, 'nombre');
        if ($nombre) {
            echo '<div class="warning noborder">';
            echo '  No hay registros en la agenda.';
            echo '</div>';
        }
 
        $existe = false;//ponemos false para que compare con los datos de la agenda
        /*
            * mostrar todos los registros que hayan en el array
            * */
 
        for ($i=0;$i<count($_POST["nombre"]);$i++) {
 
            $nombre = $_POST["nombre"][$i];
            $telefono = $_POST["telefono"][$i];
 
            if ($nombre==$nombre_new) {
                //mismo nombre
                $existe = true;
                if (strlen($telefono_new)==0) {
                    $nombre = null;
                    $telefono = null;
                } else {
                    $telefono = $telefono_new;
                }
            }
            if ($nombre==null) {}else {
                agenda_agregar($nombre, $telefono);
            }
        }
        if ($existe) {
        }
        else{
            if (strlen($nombre_new)>0)
                agenda_agregar($nombre_new,$telefono_new);
        }
 
        /*
            * añade un nombre y telefono
            * */
        function agenda_agregar($nombre,$telefono) {
            echo '<div id="datos">';
            echo '<td><p>' .$nombre. '</p></td>';
            echo '<td><p>' .$telefono. '</p></td>';
            echo '    <input name="nombre[]" type="hidden" readonly value="'.$nombre.'">';
            echo '    <input name="telefono[]" type="hidden" readonly value="'.$telefono.'">';
            echo '</div>';
        }
        ?>
    </div>
</form>
</body>
 
</html>