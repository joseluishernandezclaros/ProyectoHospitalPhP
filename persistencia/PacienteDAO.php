<?php
class PacienteDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $cedula;
    private $telefono;
    private $direccion;

    function PacienteDAO($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $cedula = "", $telefono = "", $direccion = ""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->cedula = $cedula;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }

    function autenticar(){
        return "select idpaciente from paciente
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }

    function eliminar(){
        return 	"DELETE FROM paciente WHERE idpaciente=$id;
        mysql_query($sql, $conexion)";
    }
    function registrar(){
        return "insert into paciente
                (nombre, apellido, correo, clave, cedula)
                values ('" . $this-> nombre . "', '" . $this-> apellido . "', '" . $this-> correo . "', md5('" . $this-> clave . "'), '" . $this-> cedula . "')";
    }

    function actualizar(){
        return "update paciente set
                nombre=   '" . $this -> nombre . "',
                apellido= '" . $this -> apellido . "',
                cedula=   '" . $this -> cedula . "',
                telefono= '" . $this -> telefono . "',
                direccion='" . $this -> direccion . "'
                where idpaciente= '" . $this -> id . "'";
    }

    function consultar() {
        return "select idpaciente, nombre, apellido, correo, cedula, telefono, direccion
                from paciente
                where idpaciente = '" . $this -> id . "'";
    }

    function existeCorreo(){
        return "select idpaciente from paciente
                where correo = '" . $this-> correo . "'";
    }

    function consultarTodos(){
        return "select idpaciente, nombre, apellido, correo, telefono, direccion
                from paciente
                order by apellido";
    }

}

?>
