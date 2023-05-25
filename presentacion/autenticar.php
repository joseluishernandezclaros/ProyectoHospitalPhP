<?php
// require 'logica/Persona.php';
// require 'logica/Administrador.php';
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$administrador = new Administrador("", "", $correo, $clave);
$medico = new Medico("", "", "", $correo, $clave, "");
$paciente = new paciente("", "", "", $correo, $clave,"");
if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
}else if($paciente -> autenticar()){
    $_SESSION['id'] = $paciente -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionPaciente.php"));
}
?>
