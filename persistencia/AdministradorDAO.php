<?php
class AdministradorDAO {
    private $id;
    private $nombre;
    private $correo;
    private $clave;

    function AdministradorDAO ($id="", $nombre="", $correo="", $clave=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }

    function autenticar(){
        return "select id from administrador
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }

    function consultar(){
        return "select id, nombre, correo from administrador
                where id = '" . $this -> id . "'";
    }
}
?>
