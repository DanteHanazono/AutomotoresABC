<div class="card">
	<h5 class="card-header bg-dark text-white">Crear vehiculo</h5>
	<div class="card-body">
		<form method="post" action="?controlador=vehiculo&accion=crearVehiculo" id="frmCCat">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Marca del vehiculo</label>
						<input type="text" name="marca" id="marca" class="form-control" required>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Modelo del vehiculo</label>
						<input type="text" name="modelo" id="modelo" class="form-control" required>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Precio del vehiculo</label>
						<input type="number" name="precio" id="precio" class="form-control" required>
					</div>
				</div>
            </div>
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Numero unico del chasis del vehiculo</label>
						<input type="number" name="chasis" id="chasis" class="form-control" required>
					</div>
				</div>
			</div>
			<input type="submit" name="aceptar" value="Crear" class="btn btn-dark">
			<br />
			<?php
			if (isset($this->mensaje)) {
				echo $this->mensaje;
			}
			?>
		</form>
	</div>
</div>