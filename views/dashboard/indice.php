<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de indice','dashboard');
?>
<div id="contenido" class="container-fluid fondo">
    <div class="container-fluid espacioSuperior">
        <h5 class="tituloMto">Gestion de indice de entrega</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
    </div>
    <!-- Seccion de busqueda filtrada --> 
    <div class="container-fluid">
		<form method="post" id="search-form">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-5">
							<!-- Campo de busqueda filtrada --> 
							<input id="search" name="search" class="searchButtons form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="search">
						</div>
						<div class="col-sm-2">
							<!-- Boton para busqueda filtrada --> 
							<button class="centrarBoton btn btn-outline-info my-2 my-sm-0" type="submit">
								<i class="material-icons">search</i></button>
							</button>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<!-- Boton para ingresar nuevos registros --> 
					<a class="btn btn-info btn-md " onclick="openCreateDialog()" role="button" aria-disabled="true">Registrar Índice</button></a>							
				</div>
			</div>
		</form>
	<!-- Cierra seccion de busqueda filtrada -->		
	</div>

	<div class="container-fluid espacioSuperior"> <!-- Seccion de tabla de usuarios -->
		<table class="table borde" id="tbody-rows">
			<h4 id="warning-message" style="text-align:center"></h4>
			<!-- Contenido de la tabla -->
			<tbody>	
			</tbody>
		</table>
	</div>

	<!-- Modal  -->
	<div class="modal fade" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title" name="modal-title" class="modal-title">Modal title</h5>
			</div>
			<div class="modal-body">
				<form method="post" id="save-form" enctype="multipart/form-data">
					<div class="row">
						<!-- Campo invicible del ID -->
						<input class="d-none" type="number" id="idindice" name="idindice">
						<div class="col-6 form-group">
							<label>Responsable</label>
							<select id="responsable" name="responsable" class="form-control">
							</select>
						</div>	
						<div class="col-6 form-group">
							<label>Cliente</label>
							<select id="cliente" name="cliente" class="form-control">
							</select>
						</div>
						<div class="col-6 form-group">
							<label>Organización</label>
							<input id="organizacion" name="organizacion" type="text" class="form-control" required>
						</div>
						<div class="col-6 form-group">
							<label>Índice</label>
							<div class="form-group">
								<input id="indice" name="indice" type="number" class="form-control" min="1" required>
							</div>			
						</div>
						<div class="col-6 form-group">
							<label>Compromiso total</label>
							<div class="form-group">
								<input id="totalcompromiso" name="totalcompromiso" type="number" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Cumplidos</label>
							<div class="form-group">
								<input id="cumplidos" name="cumplidos" type="number" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>No cumplidos</label>
							<div class="form-group">
								<input id="nocumplidos" name="nocumplidos" type="number" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>No considerados</label>
							<div class="form-group">
								<input id="noconsiderados" name="noconsiderados" type="number" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Incumplidos no entregados</label>
							<div class="form-group">
								<input id="incumnoentregados" name="incumnoentregados" type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Incumplidos por calidad</label>
							<div class="form-group">
								<input id="incumporcalidad" name="incumporcalidad" type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Incumplidos por fecha</label>
							<div class="form-group">
								<input id="incumporfecha" name="incumporfecha" type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Incumplidos por cantidad</label>
							<div class="form-group">
								<input id="incumporcantidad" name="incumporcantidad" type="text" class="form-control" required>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button onclick="saveData()" type="button" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>


</div> <!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('indice');
?>