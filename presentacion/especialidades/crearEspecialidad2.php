<?php
$administrador= new Administrador($_SESSION["id"]);
$administrador->consultar();
include 'presentacion/menuAdministrador.php';
$id = "";
if(isset($_POST["id"])){
    $id = $_POST["id"];
}
$nombre = "";
if(isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
}
if(isset($_POST["crear"])){
       $especialidad = new Especialidad($id,$nombre);
        $especialidad -> registrar();
    }
 
?>
<div class="container mt-3">
	<div class="row">
		<div class="col-lg-3 col-md-0"></div>
		<div class="col-lg-6 col-md-12">
            <div class="card">
				<div class="card-header bg-primary text-white">
					<h4>Crear especialidad</h4>
				</div>
              	<div class="card-body">
					<?php if(isset($_POST["crear"])){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Datos creados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<?php } ?>
					<form action="index.php?pid=<?php echo base64_encode("presentacion/especialidades/crearEspecialidad2.php") ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Id</label> 
							<input type="number" name="id" class="form-control" value="<?php echo $id ?>" required>
						</div>
						<div class="form-group">
							<label>Nombre</label> 
							<input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" required>
						</div>
					<button type="submit" name="crear" class="btn btn-primary">Crear</button>
					</form>
            	</div>
            </div>
		</div>
	</div>
</div>