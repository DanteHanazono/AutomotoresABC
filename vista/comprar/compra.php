<div class="card">
	<h5 class="card-header bg-dark text-white">Compra de Vehiculo</h5>
	<div class="card-body">
		<form method="post" action="?controlador=compra&accion=crearCompra" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Numero de documento de identidad</label>
						<input type="number" name="documentoid" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Numero unico del chasis del vehiculo</label>
						<input type="number" name="chasis" class="form-control" required>
					</div>
				</div>
			</div>
			<input type="submit" name="aceptar" value="Comprar" class="btn btn-success">
			<br />
			<?php
			if (isset($this->mensaje)) {
				echo $this->mensaje;
			}
			?>
		</form>
	</div>
</div>