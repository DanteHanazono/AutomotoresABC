<div class="card">
	<h5 class="card-header bg-dark text-white">Registro de usuario</h5>
	<div class="card-body">
		<form method="post" action="?controlador=usuario&accion=crearUsuario" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombres" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Fecha de nacimiento</label>
						<input type="date" name="fecha" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Usuario</label>
						<input type="text" name="nick" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Correo electrónico</label>
						<input type="email" name="correo" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Tipo de documento</label>
						<input type="text" name="tipo" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Numero de documento</label>
						<input type="number" name="documentoid" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-6">
					<div class="form-group">
						<label>Numero de celular</label>
						<input type="number" name="celular" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
				</div>
			</div>
			<input type="submit" name="aceptar" value="Registrar" class="btn btn-success">
			<br />
			<?php
			if (isset($this->mensaje)) {
				echo $this->mensaje;
			}
			?>
		</form>
	</div>
</div>