<?php
require 'persistencia/MedicoDAO.php';
require_once 'persistencia/Conexion.php';

class Medico {
    private $idmedico;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $id_especialidad;
    private $medicoDAO;
    private $conexion;


    function getIdmedico(){
        return $this -> idmedico;
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

    function getId_especialidad(){
        return $this -> id_especialidad;
    }




    function Medico ($idmedico="", $nombre="", $apellido="", $correo="", $clave="", $id_especialidad=""){
        $this -> idmedico = $idmedico;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> id_especialidad = $id_especialidad;
        $this -> conexion = new Conexion();
        $this -> medicoDAO = new MedicoDAO($idmedico, $nombre, $apellido, $correo, $clave, $id_especialidad);
    }

    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MedicoDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> MedicoDAO ->actualizar());
        $this -> conexion -> cerrar();
    }

    function actualizarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MedicoDAO ->actualizarFoto());
        $this -> conexion -> cerrar();
    }

    function actualizarEstado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MedicoDAO ->actualizarEstado());
        $this -> conexion -> cerrar();
    }

    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MedicoDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> medicoDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> id_especialidad = $resultado[3];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> medicoDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Medico($registro[0], $registro[1], $registro[2], $registro[3]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }


}
