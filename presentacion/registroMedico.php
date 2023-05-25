<?php
// require 'logica/Persona.php';
// require 'logica/Paciente.php';
$error = -1;
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";
$cedula = "";

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $cedula = $_POST["cedula"];

    $medico = new Medico("", $nombre, $apellido, $correo, $clave, $cedula, 0,"","");
    if(!$medico -> existeCorreo()){
        $medico -> registrar();
        $error = 0;
    }else{
        $error = 1;
    }
}
?>
