<?php
class EspecialidadDAO {
    private $id;
    private $nombre;

    function EspecialidadDAO($id= "", $nombre= ""){
        $this->id  = $id;
        $this->nombre = $nombre;
    }

    function registrar(){
        return "insert into especialidad
                (idespecialidad, nombre)
                values ('" . $this-> id . "', '" . $this-> nombre . "')";
    }

    function existeEspecialidad(){
        return "select idespecialidad from especialidad
                where nombre = '" . $this-> nombre . "'";
    }

    function actualizar(){
        return "update especialidad set
                idespecialidad= '" . $this -> especialidad . "',
                nombre=   '" . $this -> nombre . "',
                where idespecialidad= '" . $this -> id . "'";
    }

    function consultar() {
        return "select idespecialidad, nombre
                from especialidad
                where idespecialidad =" . $this -> id . "''";
    }

    function consultarTodos(){
        return "select idespecialidad, nombre
                from especialidad e
                order by idespecialidad";
    }
}
?>
