<?php
$paciente = new Paciente($_SESSION['id']);
$paciente->consultar();
include 'presentacion/menuPaciente.php';
?>
<div class="card text-center">
  <div class="card-header">
    Perfil
  </div>
  <div class="card-body">
    <h5 class="card-title">Paciente Clínica Los Altos de los Andes</h5>
    <p>Usuario: <?php echo $paciente -> getNombre(); ?><?php echo $paciente -> getApellido(); ?></p>
    <button href="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Ver Perfil
      </button>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Usuario: <?php echo $paciente -> getNombre(); ?></p>
        <p>Apellido: <?php echo $paciente -> getApellido(); ?></p>
        <p>Correo: <?php echo $paciente -> getCorreo(); ?></p>
        <p>Cedula: <?php echo $paciente -> getCedula(); ?></p>
        <p>Telefono: <?php echo $paciente -> getTelefono(); ?></p>
        <p>Direccion: <?php echo $paciente -> getDireccion(); ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
