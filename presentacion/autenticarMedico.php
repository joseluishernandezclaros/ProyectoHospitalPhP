<?php
// require 'logica/Persona.php';
// require 'logica/Administrador.php';
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$medico = new Medico("", "","", $correo, $clave);
if($medico -> autenticar()){
    $_SESSION['idmedico'] = $medico -> getIdmedico();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionMedico.php"));
}
?>