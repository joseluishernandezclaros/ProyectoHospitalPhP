<?php
$medico  = new Medico($_SESSION['idmedico']);
$medico->consultar();
include 'presentacion/menuMedico.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido Medico</div>
				<div class="card-body">
					<p>Usuario: <?php echo $medico -> getNombre(); ?></p>
					<p>Correo: <?php echo $medico -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>