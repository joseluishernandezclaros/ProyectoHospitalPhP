<?php
$paciente = new Paciente($_SESSION['id']);
$paciente -> consultar();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand"
		href="index.php?pid=<?php echo base64_encode("presentacion/sesionPaciente.php")?>">
    <i class="fas fa-home"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"> Analizar </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item"
						href="index.php?pid=<?php echo base64_encode("presentacion/paciente/verPerfilPaciente.php")?>">Perfil de Usuario</a>
					<a class="dropdown-item"
						href="index.php?pid=<?php echo base64_encode("presentacion/paciente/consultarPaciente.php")?>">Citas</a>

				</div></li>
		</ul>
		<ul  class="navbar-nav">
		    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Paciente: <?php echo $paciente -> getNombre() ?>
							</a>
		        <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
	 		           <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/paciente/cambiarPerfil.php")?>">Editar perfil</a>
           <a class="dropdown-item" href="index.php">Salir</a>
		        </div>
		      </li>
		</ul>
	</div>
</nav>
