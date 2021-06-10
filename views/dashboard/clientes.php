<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de clientes','dashboard');
?>
<div id="contenido" class="container-fluid fondo"> <!-- Contenedor de todo el contenido de la pagina-->
    <div id="tituloPagina" class="container-fluid espacioSuperior"> <!-- Seccion de titulo de pagina-->
		<h5 class="tituloMto">Gestion de clientes</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
    </div> 	<!-- Cierra seccion de titulo de pagina -->
    <div id="filtros" class="container-fluid espacioSuperior"> <!-- Seccion de filtros de busqueda -->
		<div class="row"> <!-- Fila seccion de filtros de busqueda -->
			<div class="col-sm-5"> <!-- Seccion de filtros de opciones -->
                <div class="row">
                    <div class="col-md-12 col-lg-5"> <!-- Seccion tipo busqueda -->
                        <h6 class="textoMostrar">Mostrar por estado</h6>
                    </div> <!-- Cierra seccion tipo de busqueda -->
                    <div class="col-md-12 col-lg-7"> <!-- Seccion de filtros -->
                    	<div class="dropdown">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccione el estado
							</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  			<a class="dropdown-item" href="#">Activo</a>
				  			<a class="dropdown-item" href="#">Bloqueado</a>
				  			<a class="dropdown-item" href="#">Inactivo</a>
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
	</div>	<!-- Cierra seccion de filtros de busqueda -->
    
	
	<div class="container-fluid"> <!-- Seccion de tabla de usuarios -->
		<br><br>
		<table class="table borde">
			<thead class="thead-dark">
				<tr>
					<th>Estado</th>
					<th>Empresa</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Intentos</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Activo</td>
					<td>BAYER S.A.</td>
					<td>5421-6545</td>
					<td>Bayer@gmail.com</td>
					<td>Bayer02</td>
					<td>1</td>
					<td>
						<a href="#modalModificarCliente" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a href="#modalEliminarCliente" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>	
				<tr>
					<td>Activo</td>
					<td>ATESA, S.A. de C.V</td>
					<td>7895-6545</td>
					<td>Atesa@gmail.com</td>
					<td>Atesa03</td>
					<td>0</td>
					<td>
						<a href="#modalModificarCliente" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a href="#modalEliminarCliente" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>	
				<tr>
					<td>Activo</td>
					<td>CORSES S.A.</td>
					<td>7895-6545</td>
					<td>Corses@gmail.com</td>
					<td>Corses03</td>
					<td>3</td>
					<td>
						<a href="#modalModificarCliente" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a href="#modalEliminarCliente" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>
			</tbody>
		</table>
			  
	</div>

	
	

	<div id="modalMantenimientoContactos" class="modal fade"> <!-- Modal de mantenimiento de contactos -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Seccion de contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Seccion de cabecera del modal -->					
						<h4 class="modal-title">Mantenimiento de contactos</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div> <!-- Cierra cabecera del modal -->
					<div class="modal-body"> <!-- Seccion cuerpo del modal -->		
						<div class="container">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Cliente</label>
										<select id="inputState" class="form-control">
											<option selected>BAYER S.A.</option>
										</select>
									</div>		
								</div>		
								<div class="col-6">
									<div class="form-group">
										<label>Tipo Contacto</label>
										<select id="inputState" class="form-control">
											<option selected>Correo Electronico</option>
										</select>
									</div>		
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Contacto</label>
										<input type="text" class="form-control" value="Diego"required>
									</div>
								</div>
							</div>					
						</div>
						<div class="row espacioCRUD2">					
							<div class="col-sm-3">
								<button type="button" class="btn btn-info">Ingresar</button>
							</div>
							<div class="col-sm-3">
								<button type="button" class="btn btn-info">Modificar</button>
							</div>
							<div class="col-sm-3">
								<button type="button" class="btn btn-info">Eliminar</button>
							</div>
							<div class="col-sm-3">	
								<button type="button" class="btn btn-info">Busqueda</button>
							</div>									
						</div>
						<div class="container">
							<table class="table table-sm">
								<thead>
								  	<tr>
										<th scope="col">#</th>
										<th scope="col">Cliente</th>
										<th scope="col">Tipo contacto</th>
										<th scope="col">Contacto</th>
								  	</tr>
								</thead>
								<tbody>
								  	<tr>
										<th scope="row"><span class="custom-checkbox">
											<input type="checkbox" id="selectAll">
											<label for="selectAll"></label>
										</span></th>
										<td>BAYER S.A.</td>
										<td>Correo Electronico</td>
										<td>Correo@gmail.com</td>
								  	</tr>
								  	<tr>
										<th scope="row"><span class="custom-checkbox">
											<input type="checkbox" id="selectAll">
											<label for="selectAll"></label>
										</span></th>
										<td>BAYER S.A.</td>
										<td>Telefono</td>
										<td>1234-1234</td>
								  	</tr>
								</tbody>
							</table>
						</div>
					</div> <!-- Cierra seccion del cuerpo del modal -->
					<div class="modal-footer"> <!-- Seccion de pie de modal-->
						<input type="button" class="btn btn-info" data-dismiss="modal" value="Salir">
					</div> <!-- Cierra el pie del modal -->
				</form>
			</div> <!-- Cierra seccion de contenido del modal -->
		</div>
	</div><!-- Cierra el modal de mantenimiento de contactos -->
	<div id="modalIngresarCliente" class="modal fade"><!-- Modal de ingreso de clientes -->
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">	<!-- Seccion cabecera del modal -->					
						<h4 class="modal-title">Agregar nuevo cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div> <!-- Cierra cabecera del modal -->
					<div class="modal-body">  <!-- Seccion cuerpo del modal -->					
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Empresa</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Usuario</label>
									<input type="text" class="form-control" required>
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
									<label>Estado</label>
									<select id="inputState" class="form-control">
										<option selected>Activo</option>
										<option>Inactivo</option>
									</select>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>Confirmar Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>						
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Correo</label>
									<input type="text" class="form-control" required>
								</div>	
							</div>
						</div>
					</div> <!-- Cierra cuerpo del modal -->
					<div class="modal-footer"> <!-- Pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div> <!-- Cierra pie del modal -->
				</form>
			</div>
		</div>
	</div><!-- Cierra el modal de ingreso de clientes -->
	<div id="modalModificarCliente" class="modal fade"> <!-- Modal de modificacion de clientes -->
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">	<!-- Seccion de cabecera del modal -->					
						<h4 class="modal-title">Editar usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>	<!-- Cierra cabecera del modal -->
					<div class="modal-body">  <!-- Seccion del cuerpo del modal -->		
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Empresa</label>
									<input type="text" class="form-control" value="BAYER S.A." required>
								</div>	
								<div class="form-group">
									<label>Usuario</label>
									<input type="text" class="form-control" value="Bayer02" required>
								</div>	
								<div class="form-group">
									<label>Telefono</label>
									<div class="form-group">
										<input type="text" class="form-control" value="1234-1234" required>
									</div>
								</div>						
							</div> 				
							<div class="col-6">
								<div class="form-group">
									<label>Estado</label>
									<select id="inputState" class="form-control">
										<option selected>Activo</option>
										<option>Inactivo</option>
									</select>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" value="1234" placeholder="">
								</div>
								<div class="form-group">
									<label>Confirmar Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" value="1234" placeholder="">
								</div>						
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Correo</label>
									<input type="text" class="form-control" value="Bayer@gmail.com" required>
								</div>	
							</div>
						</div>
					</div>	<!-- Cierra cuerpo del modal -->
					<div class="modal-footer">	<!-- Seccion del pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
					</div>	<!-- Cierra pie del modal -->
				</form>
			</div>
		</div>
	</div>	<!-- Cierra modal de modificacion de cliente -->
	<div id="modalEliminarCliente" class="modal fade">	<!-- Modal de eliminacion de cliente -->
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">	<!-- Seccion cabecera del modal -->					
						<h4 class="modal-title">Eliminar Cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<style>
							.fondis{
								background-color: white;
								padding-top: 50px;
							}

							.borde{
								border: black 1px solid;
								border-radius: 5px;
							}

							.fontWhite{
								color:white;
							}

							.separador{
								width:80%;
							}

							.seccionTitulo{
								padding-left:50px;
							}

							.textoMostrar{
								padding-top:12px;
								font-size:12px;
								padding-left:12px;
							}

							.tituloMto{
								padding-left:5px;
							}

							.tamañoTabla{
								max-height: 95%;
							}

							.espacioSuperior{
								padding-top:50px;
							}

							.espacioBotones{
								padding-bottom:10px;
								width:280px;
							}
							</style>
					</div>	<!-- Cierra cabecera del modal -->
					<div class="modal-body">	<!-- Seccion cuerpo del modal -->		
						<p>¿Estas seguro que deseas eliminar al cliente?</p>
						<p class="text-warning"><small>Confirme si desea realizar la accion.</small></p>
					</div>	<!-- Cierra cuerpo del modal -->
					<div class="modal-footer">	<!-- Seccion del pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
						<style>.espacioCRUD2{padding-top:20px; padding-bottom:20px;} </style>
					</div>	<!-- Cierra pie del modal -->
				</form>
			</div>
		</div>
	</div> 	<!-- Cierra modal de eliminacion de cliente -->
</div><!-- Cierra seccion de contenido de la pagina -->
<?php
Dashboard_Page::footerTemplate('clientes');
?>