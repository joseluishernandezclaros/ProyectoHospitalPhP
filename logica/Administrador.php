<?php
require 'persistencia/AdministradorDAO.php';
require_once 'persistencia/Conexion.php';

class Administrador  {
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $administradorDAO;
    private $conexion;

    function getId(){
        return $this -> id;
    }

    function getNombre(){
        return $this -> nombre;
    }

    function getCorreo(){
        return $this -> correo;
    }
    function getClave(){
        return $this -> clave;
    }

    function Administrador($id="", $nombre="", $correo="", $clave=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> conexion = new Conexion();
        $this -> administradorDAO = new AdministradorDAO($id, $nombre, $correo, $clave);
    }

    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> conexion -> cerrar();
    }

}
