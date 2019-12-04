<div class="card">
	<h5 class="card-header bg-dark text-white">Perfil</h5>
	<div class="card-body">
		<form method="post" action="?controlador=usuario&accion=editarPerfil" id="frmEPerfil">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nombres</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $this->datos["usu_nombre"]; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Apellido</label>
						<input type="text" name="apellido" class="form-control" value="<?php echo $this->datos["usu_apellido"]; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Tipo de documento</label>
						<input type="text" name="tipo" class="form-control" value="<?php echo $this->datos["usu_tipo"]; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Numero de documento</label>
						<input type="numero" name="documentoid" class="form-control" value="<?php echo $this->datos["usu_doc"]; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Correo</label>
						<input type="email" name="correo" class="form-control" value="<?php echo $this->datos["usu_correo"]; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Numero de celular</label>
						<input type="numero" name="celular" class="form-control" value="<?php echo $this->datos["usu_cel"]; ?>">
					</div>
				</div>
			</div>
			<input type="submit" name="aceptar" value="Actualizar" class="btn btn-dark">
			<br />
			<?php
			if (isset($this->mensaje)) {
				echo $this->mensaje;
			}
			?>
		</form>
	</div>
</div>