<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente = new Paciente();
$pacientes = $paciente->consultarTodos();
include 'presentacion/menuAdministrador.php';
// <input type='submit' value='Eliminar'>
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Paciente</div>
				<div class="card-body">
					<div id="resultadosPacientes">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Telefono</th>
								<th scope="col">Direccion</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody>
						<?php
                foreach ($pacientes as $p) {
                    echo "<tr>";
                    echo "<td>" . $p->getId() . "</td>";
                    echo "<td>" . $p->getNombre() . "</td>";
                    echo "<td>" . $p->getApellido() . "</td>";
                    echo "<td>" . $p->getCorreo() . "</td>";
					echo "<td>" . $p->getTelefono() . "</td>";
                    echo "<td>" . $p->getDireccion() . "</td>";
					echo "<td>" . "<a href='" . $p->getId()."' 
					data-toggle='modal' data-target='#modalPaciente' > 
					<span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' 
					data-original-title='Eliminar Paciente'. ></span> </a></td>";
					
					echo "</tr>";
                	}
              		echo "<tr><td colspan='9'>" . count($pacientes) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
