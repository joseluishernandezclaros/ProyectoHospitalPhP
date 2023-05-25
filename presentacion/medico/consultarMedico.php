

<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$medico = new Medico();
$medicos = $medico->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Medico</div>
				<div class="card-body">
				<div id="resultadosMedicos">

					<table class="table table-striped table-hover">
					<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>

							</tr>
							</thead>
						<tbody>

						<?php
                foreach ($medicos as $m) {
                    echo "<tr>";
                    echo "<td>" . $m->getIdmedico() . "</td>";
                    echo "<td>" . $m->getNombre() . "</td>";
                    echo "<td>" . $m->getApellido() . "</td>";
                    echo "<td>" . $m->getCorreo() . "</td>";

                    echo "<td>" . "<a href='modalMedico.php?idmedico=" . $m->getIdmedico() . "' data-toggle='modal' data-target='#modalMedico' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>

                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/medico/actualizarMedico.php") . "&idMedico=" . $m->getIdmedico() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>

                          </td>";
                    echo "</tr>";

                }
                echo "<tr><td colspan='9'>" . count($medicos) . " registros encontrados</td></tr>"?>

</tbody>
</table>
		</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
