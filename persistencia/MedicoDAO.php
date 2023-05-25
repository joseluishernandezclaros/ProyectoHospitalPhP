
<?php
class MedicoDAO {
    private $idmedico;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $id_especialidad;


    function MedicoDAO($idmedico = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $id_especialidad=""){
        $this->idmedico  = $idmedico;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->id_especialidad =$id_especialidad;
        
    }

    function autenticar(){
        return "select idmedico from medico
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }

//function registrar(){
  //      return "insert into paciente
      //          (nombre, apellido, correo, clave, cedula)
    //            values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', md5('" . $this->clave . "'), '" . $this->cedula . "')";
   // }

    function actualizar(){
        return "update medico set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "',
                where idmedico=" . $this -> idmedico;
    }

    function actualizarEstado(){
        return "update medico set
                estado = '" . $this -> estado . "'
                where idmedico=" . $this -> idmedico;
    }

    function consultar() {
        return "select nombre, apellido, correo, id_especialidad
                from medico
                where idmedico =" . $this -> idmedico;
    }

    /*function existeCorreo(){
        return "select idpaciente from paciente
                where correo = '" . $this->correo . "'";
    }*/

    function consultarTodos(){
        return "select idmedico,nombre, apellido, correo 
                from medico 
                order by idmedico";
    }
}

?>
