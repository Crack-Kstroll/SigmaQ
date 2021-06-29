<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de estado', 'dashboard');
?>
<div id="contenido" class="container-fluid fondo">
	<!-- Seccion de contenido (contiene todo el contenido de la pagina) -->
	<div class="container-fluid espacioSuperior">
		<!-- Seccion titulo de pagina -->
		<h5 class="tituloMto">Gestion de estados de cuenta</h5>
		<img src="../../resources/img/utilities/division.png" class="separador" alt="">
	</div> <!-- Cierra seccion titulo pagina -->
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
					<a href="#" onclick="modalTitle()" class="btn btn-info btn-md " role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ingresar registro</button></a>						
				</div>
			</div>
		</form>
	<!-- Cierra seccion de busqueda filtrada -->		
	</div>
	<!-- Seccion de tabla -->
	<div class="container-fluid espacioSuperior"> 
		<table class="table borde">
			<!-- Cabecera de la tabla -->
			<thead class="thead-dark">
				<tr>
					<th>Codigo</th>
					<th>Empresa</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Intentos</th>
					<th>Estado</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<!-- Contenido de la tabla -->
			<tbody id="tbody-rows">	
			</tbody>
		</table>	  
	<!-- Cierra seccion de tabla -->
	</div>
	<!-- Modal  -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title" name="modal-title" class="modal-title" id="staticBackdropLabel">Modal title</h5>
			</div>
			<div class="modal-body">
				<form method="post" id="save-form" name="save-form" enctype="multipart/form-data">
				<input type="number" id="txtIdx" name="txtIdx" />
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>Codigo</label>
								<input id="txtId" name="txtId" type="number" min="1" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Empresa</label>
								<input id="txtEmpresa" name="txtEmpresa" type="text" class="form-control" required>
							</div>									
							<div class="form-group">
								<label>Telefono</label>
								<div class="form-group">
									<input id="txtTelefono" name="txtTelefono" type="text" class="form-control" placeholder="0000-0000" required>
								</div>			
							</div>			
						</div>		
						<div class="col-6">
							<div class="form-group">
								<label>Usuario</label>
								<input id="txtUsuario" name="txtUsuario" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Contraseña</label>
								<input id="txtClave" name="txtClave" type="password" class="form-control" placeholder="" required>
							</div>
							<div class="form-group">
								<label>Confirmar contraseña</label>
								<input id="txtClave2" name="txtClave2" type="password" class="form-control" placeholder="" required>
							</div>	
						</div>
						<div class="col-12">
							<label>Correo</label>
							<input id="txtCorreo" name="txtCorreo" type="email" class="form-control" placeholder="correo@example.com" required>				
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
<?php
Dashboard_Page::footerTemplate('estado');
?>