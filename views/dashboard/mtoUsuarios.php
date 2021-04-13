<?php
include('../../app/helpers/dashboard_page.php');
Dashboard_Page::headerTemplate('Portal Clientes');
?>
<div id="contenido" class="container-fluid fondo"> <!-- Seccion de contenido -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion de titulo de pagina -->
        <h5 class="tituloMto">Gestion de usuarios</h5>
        <img src="../../resources/img/division.png" class="separador" alt="">
    </div> <!-- Cierra seccion de titulo de pagina -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion de busqueda filtrada -->
		<div class="row"> <!-- Fila seccion de filtros de busqueda -->
			<div class="col-5"> <!-- Seccion de filtros de opciones -->
                <div class="row">
                    <div class="col-md-12 col-lg-5"> <!-- Seccion tipo busqueda -->
                        <h6 class="textoMostrar">Mostrar por tipo de usuario</h6>
                    </div> <!-- Cierra seccion tipo de busqueda -->
                    <div class="col-md-12 col-lg-7"> <!-- Seccion de filtros -->
                    	<div class="dropdown">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccione el tipo de usuario
							</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  			<a class="dropdown-item" href="#">Root</a>
				  			<a class="dropdown-item" href="#">Admin</a>
						</div>
					</div> <!-- Cierra seccion de filtros -->
			    </div>
			</div> <!-- Cierra seccion de filtros de opciones -->
        	</div>
			<div class="col-7"> <!-- Seccion de busqueda filtrada -->
				<div class="search-box">
					<i class="material-icons">&#xE8B6;</i>
					<input type="text" class="form-control" placeholder="Busqueda filtrada&hellip;">
				</div>
			</div> <!-- Cierra seccion de busqueda filtrada -->
		</div> <!-- Cierra fila de seccion de filtros de busqueda -->
	</div> <!-- Cierra seccion de busqueda filtrada -->
    <div id="tablaUsuarios" class="container-fluid "> <!-- Seccion de tabla de usuarios -->
		<div class="table-responsive borde">
			<div class="table-wrapper">
				<div class="table-title"> <!-- Titulo de tabla -->
					<div class="row">
						<div class="col-sm-6">
							<h2 class="textoMto">Mantenimiento de <b>usuarios</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#modalAgregarUsuario" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo usuario</span></a>					
						</div>
					</div>
				</div> <!-- Cierra titulo de tabla -->
				<table class="table table-striped table-hover"> <!-- Contenido de tabla -->
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
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
					<tbody>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
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
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>Activo</td>
							<td>Admin</td>
							<td>Diego</td>
							<td>Moys</td>
							<td>87654321-9</td>
							<td>Fernando@gmail.com</td>
							<td>4321-4321</td>
							<td>0</td>
							<td>Moys</td>
							<td>
								<a href="#modalEditarUsuario" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarUsuario" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>Activo</td>
							<td>Admin</td>
							<td>Diego</td>
							<td>Pacheco</td>
							<td>25654578-9</td>
							<td>Josue@gmail.com</td>
							<td>3278-4321</td>
							<td>0</td>
							<td>Pacheco</td>
							<td>
								<a href="#modalEditarUsuario" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarUsuario" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>						
					</tbody>
				</table> <!-- Cierra contenido de tabla -->
				<div class="clearfix"> <!-- Seccion controladores tabla -->
					<div class="hint-text">Mostrando <b>3</b> de <b>10</b> registros</div>
					<ul class="pagination">
						<li class="page-item"><a href="#" class="page-link">Anterior</a></li>
						<li class="page-item active"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
					</ul>
				</div> <!-- Cierra controladores de tabla -->
			</div>
		</div>        
	</div>
	<div id="modalAgregarUsuario" class="modal fade"> <!-- Modal ingresar usuario -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar nuevo usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"><!-- Cuerpo del modal -->				
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
										<input type="text" class="form-control" required>
									</div>			
								</div>			
							</div>		
							<div class="col-6">
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>Confirmar contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>DUI</label>
									<div class="form-group">
										<input type="text" class="form-control" required>
									</div> 
								</div>		
							</div>
							<div class="col-12">
								<label>Correo</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo@example.com">				
							</div>
						</div>
					</div> <!-- Cierra el cuerpo del modal -->
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>
				</form>
			</div> <!-- Cierra contenido modal -->
		</div>
	</div> <!-- Cierra modal ingresar usuario -->
	<div id="modalEditarUsuario" class="modal fade"> <!-- Modal editar usuario -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Editar usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
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
										<input type="text" class="form-control" required>
									</div>			
								</div>			
							</div>		
							<div class="col-6">
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>Confirmar contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>DUI</label>
									<div class="form-group">
										<input type="text" class="form-control" required>
									</div> 
								</div>		
							</div>
							<div class="col-12">
								<label>Correo</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo@example.com">				
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
					</div>
				</form>
			</div> <!-- Cierra contenido modal -->
		</div>
	</div>
	<div id="modalEliminarUsuario" class="modal fade"> <!-- Modal eliminar usuario -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Estas seguro que deseas eliminar al usuario?</p>
						<p class="text-warning"><small>Confirme si desea realizar la accion.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div> <!-- Cierra modal eliminar usuario -->
</div> <!-- Cierra seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js'); 
?> <!-- Agregamos el metodo que ingresa los scripts y mandamos el controlador correspondiente  -->