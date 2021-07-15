<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de estado', 'dashboard');
?>
<div id="contenido" class="container-fluid fondo">
	<!-- Seccion de contenido (contiene todo el contenido de la pagina) -->
	<div class="container-fluid espacioSuperior">
		<!-- Seccion titulo de pagina -->
		<h5 class="tituloMto">Gestión de estados de cuenta</h5>
		<img src="../../resources/img/utilities/division.png" class="separador" alt="">
	</div> <!-- Cierra seccion titulo pagina -->

	<!-- Seccion de busqueda filtrada -->
	<div class="container-fluid">
		<form method="post" id="search-form">
			<div class="row">
				<div class="col-sm-7">
					<div class="row">
						<div class="col-sm-6">
							<!-- Campo de busqueda filtrada -->
							<input id="search" name="search" class="searchButtons form-control mr-sm-2" type="search" placeholder="Buscar por sociedad o responsable" aria-label="search">
						</div>
						<div class="col-sm-2">
							<!-- Boton para busqueda filtrada -->
							<button class="centrarBoton btn btn-outline-info my-2 my-sm-0" type="submit">
								<i class="material-icons">search</i></button>
							</button>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<!-- Boton para ingresar nuevos registros -->
					<a class="btn btn-info btn-md " onclick="openCreateDialog()" role="button" aria-disabled="true">Ingresar estado</button></a>
				</div>
				<!-- <div class="col-sm-2"> -->
					<!-- Boton para ingresar nuevos registros -->
					<!-- <a class="btn btn-success btn-md " onclick="openCreateDialogDivisas()" role="button" aria-disabled="true">Admin. Divisas</button></a>
				</div> -->
				<!-- <div class="col-sm-2"> -->
					<!-- Boton para ingresar nuevos registros -->
					<!-- <a class="btn btn-warning btn-md " onclick="openCreateDialogSociedades()" role="button" aria-disabled="true">Admin. Sociedades</button></a>
				</div> -->
			</div>
		</form>
		<!-- Cierra seccion de busqueda filtrada -->
	</div>

	<div class="container-fluid espacioSuperior"> 
		<table class="table borde">
			<!-- Cabecera de la tabla -->
			<thead class="thead-dark">
				<tr>
					<th>Responsable</th>
                    <th>Sociedad</th>
                    <th>Usuario</th>
                    <th>Código</th>
                    <th>Factura</th>
                    <th>Asignación</th>
                    <th>Fecha Contable</th>
                    <th>Clase</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Días Restantes</th>
                    <th>Divisa</th>
                    <th>Total General</th>
                    <th>Acciones</th>
				</tr>
			</thead>
			<!-- Contenido de la tabla -->
			<tbody id="tbody-rows">	
			</tbody>
		</table>	 
		<div id="seccionPaginacion" class="clearfix"> <!-- Seccion controladores tabla -->				
		</div> <!-- Cierra controladores de tabla --> 
	<!-- Cierra seccion de tabla -->
	</div>

	<!-- Seccion de tabla de registros -->
	<div class="container-fluid espacioSuperior">
		<table class="table borde" id="tbody-rows">
			<h4 id="warning-message" style="text-align:center"></h4>
			<!-- Contenido de la tabla -->
			<tbody>
			</tbody>
		</table>
	</div>
	<!-- Modal  Estados-->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="modal-title" name="modal-title" class="modal-title" id="staticBackdropLabel">Modal title</h5>
				</div>
				<div class="modal-body">
					<form method="post" id="save-form" name="save-form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-6">
								<!-- Campo invicible del ID -->
								<input class="d-none" type="number" id="idestado" name="idestado">
								<div class="form-group">
									<label>Responsable*</label>
									<select id="responsable" name="responsable" class="form-control">
									</select>
								</div>
								<div class="form-group">
									<label>Cliente*</label>
									<div class="form-group">
										<select id="cliente" name="cliente" class="form-control">
										</select>
									</div>
								</div>
								<div class="form-group">
									<label>Fecha contable*</label>
									<input id="fechacontable" name="fechacontable" type="date" class="form-control" required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Código*</label>
									<input id="codigo" name="codigo" type="number" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Factura*</label>
									<input id="factura" name="factura" type="number" class="form-control" placeholder="" required>
								</div>
								<div class="form-group">
									<label>Asignación*</label>
									<input id="asignacion" name="asignacion" type="number" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Fecha vencimiento*</label>
									<input id="vencimiento" name="vencimiento" type="date" class="form-control" required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Clase*</label>
									<input id="clase" name="clase" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Sociedad*</label>
									<select id="sociedad" name="sociedad" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Divisas*</label>
									<select id="divisa" name="divisa" class="form-control">
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label>Total general*</label>
								<input id="total" name="total" type="number" class="form-control" required>
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


	</div> <!-- Cierra seccion contenido -->


	<!-- Modal Sociedades -->
	<div class="modal fade" id="modal-sociedades" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="modal-title" name="modal-title" class="modal-title">Modal title</h5>
				</div>
				<div class="modal-body">
					<form method="post" id="save-form-sociedades" enctype="multipart/form-data">
						<div class="row">
							<!-- Campo invicible del ID -->
							<input class="d-none" type="number" id="idsociedad" name="idsociedad">
							<div class="col-6 form-group">
								<label>Cliente</label>
								<select id="clientesociedad" name="clientesociedad" class="form-control">
								</select>
							</div>
							<div class="col-6 form-group">
								<label>Sociedad</label>
								<input id="sociedad" name="sociedad" type="text" class="form-control" required>
							</div>
						</div>
					</form>

					<!-- Seccion de tabla de sociedades -->
					<div class="container-fluid espacioSuperior">
						<table class="table borde" id="tbody-sociedades">
							<h4 id="warning-message" style="text-align:center"></h4>
							<!-- Contenido de la tabla -->
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button onclick="saveData()" type="button" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Divisas -->
	<div class="modal fade" id="modal-divisas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="modal-title" name="modal-title" class="modal-title">Modal title</h5>
				</div>
				<div class="modal-body">
					<form method="post" id="save-form-divisas" enctype="multipart/form-data">
						<div class="row">
							<!-- Campo invicible del ID -->
							<input class="d-none" type="number" id="iddivisa" name="iddivisa">
							<div class="col-12 form-group">
								<label>Divisa</label>
								<input id="divisa" name="divisa" type="text" class="form-control" required>
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
	</div>
	<?php
	Dashboard_Page::footerTemplate('estadoCuenta');
	?>