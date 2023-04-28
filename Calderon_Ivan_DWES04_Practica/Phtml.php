<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Phtml
 *
 * @author madrid
 */
class Phtml{

    protected $pagina;

    function __construct($nuevoTitulo = "NuevaPagina") {//constructor 
        $this->titulo = $nuevoTitulo;
    }

    function getPagina() {
        return $this->pagina;
    }

    function addContenido($contenido) {// añadir contenido
        $this->pagina .= $contenido . "\n";
    }

    function cabecera() {//crear una cabecera
        $temp = "<!DOCTYPE html html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'\n";

        $temp .= "'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n";
        $temp .= "<html lang='EN' dir='ltr'

xmlns='http://www.w3.org/1999/xhtml'>\n";

        $temp .= "<head>\n";
        $temp .= " <title>$this->titulo</title>\n";
        $temp .= "</head>\n";
        $temp .= "<body>\n";
        $temp .= " <h1>$this->titulo</h1>";
        $this->addContenido($temp);
    }

    function titulo($texto) {
        $this->addEtiqueta("h1", $texto);
    }

    function title($colorFondoTitulo, $altura, $texto) {// titulo decorado
        $temp = "<div style='background:" . $colorFondoTitulo . "; height:" . $altura . "px; width:100%; margin-top:3px;'>\n"; // se debe inicializar
        $temp .= "<h1>" . $texto . "</h1>\n";
        $temp .= "</div>\n"; // el punto es para anidar y en el primero no se pone 
        $temp .= "<br>\n";
        $this->addContenido($temp);
    }
function selecOption($name,$opciones){//generamos los select de los equipos
    $temp ="<select name=".$name." id=".$name.">";
    
    foreach($opciones as $opciones){
        $temp.="<option value=";
        $temp.= $opciones['Nombre'].">".$opciones['Nombre'];
        $temp.="</option>";
    }
    $temp.="</select>";
    $this->addContenido($temp);
}
function trtd($datos,$filas,$equipo){//hacer una tabla y mostrar datos de una consulta
    $temp ="<table border='2px'>";
    $temp.="<caption>".$equipo."<caption>";
    for($i = 0; $i < $filas; $i++) {
        $temp.="<tr><td>";
        $temp.= $datos[$i];
        $temp.="</td></tr>";
    }
    $temp.="</table>";
    $this->addContenido($temp);
}

    function abrirFormulario($caption, $tituloForm) {//abrir form
        $temp = '<form method="post" action="' . $caption . '">'; // se debe inicializar
        $temp .= "<fieldset>\n";
        $temp .= "<legend>" . $tituloForm . "</legend>\n";
        $this->addContenido($temp);
    }

    function input($type, $id, $placeholder) {// para inputs de texto o number
        $temp = '<input type="' . $type . '" id="' . $id . '"  placeholder="' . $placeholder . '" size="20">';
        $temp .= "<br>";
        $this->addContenido($temp);
    }

    function otrosInputs($mensaje, $type, $id) {//es para otros inputs como checkbos, radius y fecha (funciona en chorme la fecha
        $temp = '<p> "' . $mensaje . '"<p>';//mensaje para acompañar al input 
        $temp .= '<input type="' . $type . '" id="' . $id . '"  >';
        $temp .= "<br>";
        $this->addContenido($temp);
    }

    function cerrarFormulario() {//se cierra el formulario y se añaden 2 botones, enviar y otro de reset 
        $temp = "<input type='submit' name='mostrar' value='Mostrar' />\n";
        $temp .= "<input type='reset' value='Limpiar' />\n";
        $temp .= "</fieldset>\n";
        $temp .= "</form>\n"; // se debe inicializar
        $this->addContenido($temp);
    }
        function abrirTabla($bordeTabla, $tituloTabla) {//abrir tabla
        $temp = "<table border=" . $bordeTabla . "px>\n"; // 
        $temp .= "<caption>" . $tituloTabla . "</caption>\n";
        $this->addContenido($temp);
    }
            function cerrarTabla() {//cerrar tabla
        $temp = "</table>\n"; // 
        $this->addContenido($temp);
    }
            function abrirFila() {//abrir tr
        $temp = "<tr>\n"; // 
        $this->addContenido($temp);
    }
                function cerrarFila() {//cerrar tr
        $temp = "</tr>\n"; // 
        $this->addContenido($temp);
    }
            function crearth($contenidoth) {//abrir tabla
        $temp = "<th>" . $contenidoth . "</th>\n"; // 
        $this->addContenido($temp);
    }

    function creartd($contenidotd) {//abrir tabla
        $temp = "<td>" . $contenidotd . "</td>\n"; // 
        $this->addContenido($temp);
    }

    function h1($texto) {//añade textos en h1
        $this->addEtiqueta("h1", $texto);
    }

    function h2($texto) {
        $this->addEtiqueta("h2", $texto);
    }

    function h3($texto) {
        $this->addEtiqueta("h3", $texto);
    }

    function etiquetar($etiqueta, $contenido) {//crear etiquetas
        $temp = "<$etiqueta>\n";
        $temp .= " " . $contenido . "\n";
        $temp .= "</$etiqueta>";
        return $temp;
    }

    function addEtiqueta($etiqueta, $contenido) {//para cualquier etiqueta 
        $this->addContenido($this->etiquetar($etiqueta,
                        $contenido));
    }

    function pie($colorFondoPie) {// partefinal de la pagina
        $temp = "<div style='background:" . $colorFondoPie . "; height:20px; width:100%;'></div>\n"; // se debe inicializar
        $temp .= "</body>\n"; // el punto es para anidar y en el primero no se pone 
        $temp .= "</html>";
        $this->addContenido($temp);
    }

    function addTexto($texto) {// sirve para añadir 
        $texto .= "<br/>";
        $this->addContenido($texto);
    }
        function enlace($direc, $contenido) {//enlaces/ links
        $temp = "<a href=" . $direc . ">" . $contenido . "</a>\n";
        $this->addContenido($temp);
    }

}
