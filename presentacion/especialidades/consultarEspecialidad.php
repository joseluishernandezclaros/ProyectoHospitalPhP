<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$especialidad = new Especialidad();
$especialidadd = $especialidad->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Especialidad</div>
				<div class="card-body">
					<div id="resultadosPacientes">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody>
						<?php
                foreach ($especialidadd as $e) {
                    echo "<tr>";
                    echo "<td>" . $e->getId() . "</td>";
                    echo "<td>" . $e->getNombre() . "</td>";
                    echo "<td>" . "<a href='modalPaciente.php?idPaciente=" . $e->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>

                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/especialidad/actualizarSesionPaciente.php") . "&id=" . $e->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                          </td>";
                    echo "</tr>";

                }
                echo "<tr><td colspan='9'>" . count($especialidadd) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
