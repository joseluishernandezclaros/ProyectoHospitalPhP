<?php
include 'presentacion/menuPaciente.php';
    $paciente = new Paciente($_SESSION['id']);
    $paciente->consultar();
    $error = 0;
if(isset($_POST['editar'])){
    $paciente->consultar();
    $pacienteEditado = new Paciente($_SESSION['id'],
                                    $_POST['nombre'],
                                    $_POST['apellido'],"","",
                                    $_POST['cedula'],
                                    $_POST['telefono'],
                                    $_POST['direccion']);
    $Medico = new Medico("","","",$_POST['correo']);
    $administrador = new Administrador("", "", "", $_POST['correo']);
    if($paciente->getCorreo()==$_POST['correo']){
        $pacienteEditado -> actualizar();
    }else{
    if (!$paciente -> existeCorreo() && !$administrador -> existeCorreo() && !$pacienteEditado -> existeCorreo() ){
        $pacienteEditado -> actualizar();
    }else{
        $error = 1;
    }
    }
}
?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Editar Paciente</div>
				<div class="card-body">
					<?php if (isset($_POST['editar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Cambio Exitoso" : $_POST['correo'] . " ya existe"; ?>
						 <?php $paciente->consultar();?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/paciente/cambiarPerfil.php") ?>">

            <div class="form-group">
             <input type="text" name="nombre" class="form-control"
               placeholder="nombre" required="required"
               value="<?php echo $paciente->getNombre(); ?>">
           </div>

           <div class="form-group">
             <input type="text" name="apellido" class="form-control"
               placeholder="apellido" required="required"
               value="<?php echo $paciente->getApellido(); ?>">
           </div>

            <div class="form-group">
							<input type="text" name="cedula" class="form-control"
								placeholder="Cedula" required="required"
								value="<?php echo $paciente->getCedula(); ?>">
						</div>

            <div class="form-group">
							<input type="text" name="telefono" class="form-control"
								placeholder="Telefono" required="required"
								value="<?php echo $paciente->getTelefono(); ?>">
						</div>

            <div class="form-group">
							<input type="text" name="direccion" class="form-control"
								placeholder="Direccion" required="required"
								value="<?php echo $paciente->getDireccion(); ?>">
						</div>

            <div class="form-group">
              <input type="email" name="correo" class="form-control"
                placeholder="Correo" required="required"
                value="<?php  echo $paciente->getCorreo(); ?>">
						</div>
						<button type="submit" name="editar" class="btn btn-primary">Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
