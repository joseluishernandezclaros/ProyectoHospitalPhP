<?php
require 'persistencia/PacienteDAO.php';
require_once 'persistencia/Conexion.php';

class Paciente {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $cedula;
    private $telefono;
    private $direccion;
    private $pacienteDAO;
    private $conexion;


    function getId(){
        return $this -> id;
    }

    function getNombre(){
        return $this -> nombre;
    }

    function getApellido(){
        return $this -> apellido;
    }

    function getCorreo(){
        return $this -> correo;
    }

    function getClave(){
        return $this -> clave;
    }

    function getCedula(){
        return $this -> cedula;
    }

    function getTelefono(){
        return $this -> telefono;
    }
    function getDireccion(){
        return $this -> direccion;
    }


    function Paciente ($id="", $nombre="", $apellido="", $correo="", $clave="", $cedula="", $telefono="", $direccion=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> cedula = $cedula;
        $this -> telefono = $telefono;
        $this -> direccion = $direccion;
        $this -> conexion = new Conexion();
        $this -> pacienteDAO = new PacienteDAO($id, $nombre, $apellido, $correo, $clave, $cedula,$telefono,$direccion);
    }

    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> autenticar());
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

    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> registrar());
        $this -> conexion -> cerrar();
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO ->actualizar());
        $this -> conexion -> cerrar();
    }

    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;
        }
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> apellido = $resultado[2];
        $this -> correo = $resultado[3];
        $this -> cedula = $resultado[4];
        $this -> telefono = $resultado[5];
        $this -> direccion = $resultado[6];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Paciente($registro[0], $registro[1], $registro[2], $registro[3], "", "", $registro[4],$registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }



}
