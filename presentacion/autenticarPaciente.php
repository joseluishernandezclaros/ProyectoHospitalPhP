<?php
// require 'logica/Persona.php';
// require 'logica/Administrador.php';
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$paciente = new Paciente("", "", $correo, $clave);
if($paciente -> autenticar()){
    $_SESSION['id'] = $paciente -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionPaciente.php"));
}
?>
