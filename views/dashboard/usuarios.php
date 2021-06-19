<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de usuarios','dashboard');
?>
<!-- Seccion de contenido -->
<div id="contenido" class="container-fluid fondo"> 
	<!-- Seccion de titulo de pagina -->
	<div class="container-fluid espacioSuperior"> 
        <h5 class="tituloMto">Gestion de usuarios</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
	<!-- Cierra seccion de titulo de pagina -->
    </div>
	<!-- Seccion de busqueda filtrada --> 
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-5">
						<!-- Campo de busqueda filtrada --> 
						<input class="searchButtons form-control mr-sm-2" type="search" placeholder="Buscar por DUI" aria-label="Search">
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
				<a href="#" class="btn btn-info btn-md " role="button" aria-disabled="true">Registrar usuario</button></a>							
			</div>
		</div>
	<!-- Cierra seccion de busqueda filtrada -->		
	</div>
	
	<!-- Seccion de tabla -->
	<div class="container-fluid espacioSuperior"> 
		<table class="table borde">
			<!-- Cabecera de la tabla -->
			<thead class="thead-dark">
				<tr>
					<th>Estado</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>DUI</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Intentos</th>
					<th>Usuario</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<!-- Contenido de la tabla -->
			<tbody>
				<tr>
					<td>Activo</td>
					<td>Root</td>
					<td>Diego</td>
					<td>Castro</td>
					<td>12345678-9</td>
					<td>Diego@gmail.com</td>
					<td>1234-1234</td>
					<td>0</td>
					<td>Castroll</td>
					<td>
						<a href="#modalEditarUsuario" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a href="#modalEliminarUsuario" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>		
			</tbody>
		</table>	  
	<!-- Cierra seccion de tabla -->
	</div>
	
	<!-- Modal ingresar usuario -->
	<div id="modalAgregarUsuario" class="modal fade"> 
		<div class="modal-dialog">
			<!-- Contenido modal -->
			<div class="modal-content"> 
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar nuevo usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<!-- Cuerpo del modal -->
					<div class="modal-body">				
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Usuario</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Tipo Usuario</label>
									<select id="inputState" class="form-control">
										<option selected></option>
										<option>Root</option>
										<option>Administrador</option>
									</select>
								</div>				
								<div class="form-group">
								<label>Telefono</label>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="0000-0000" required>
									</div>			
								</div>			
							</div>		
							<div class="col-6">
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" class="form-control" id="txtApellido" required>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" id="txtClave" placeholder="" required>
								</div>
								<div class="form-group">
									<label>Confirmar contraseña</label>
									<input type="password" class="form-control" id="txtConfirmar" placeholder="" required>
								</div>
								<div class="form-group">
									<label>DUI</label>
									<div class="form-group">
										<input type="text" class="form-control" id="txtDui" placeholder="01234567-8" required>
									</div> 
								</div>		
							</div>
							<div class="col-12">
								<label>Correo</label>
								<input type="email" class="form-control" id="txtCorreo" placeholder="correo@example.com" required>				
							</div>
						</div>
					<!-- Cierra el cuerpo del modal -->
					</div> 
					<!-- Seccion del pie del modal -->
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>
				</form>
			<!-- Cierra contenido modal -->
			</div>
		<!-- Cierra modal ingresar usuario --> 
		</div>
	<!-- Cierra seccion de contenido -->
	</div> 
<?php
Dashboard_Page::footerTemplate('usuarios'); 
?> <!-- Agregamos el metodo que ingresa los scripts y mandamos el controlador correspondiente  -->