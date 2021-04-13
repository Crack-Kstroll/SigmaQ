<?php
include('../../app/helpers/dashboard_page.php');
Dashboard_Page::headerTemplate('Portal Clientes');
?>
<div id="contenido" class="container-fluid fondo"> <!-- Seccion de contenido (contiene todo el contenido de la pagina) -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion titulo de pagina -->
        <h5 class="tituloMto">Gestion de estados de cuenta</h5>
        <img src="../../resources/img/division.png" class="separador" alt="division1">
    </div>	<!-- Cierra seccion titulo pagina -->
    <div id="filtrosBusqueda" class="container-fluid espacioSuperior"> <!-- Cierra seccion de filtros de busqueda -->
		<div class="row">
            <div class="col-sm-12 col-lg-12 col-xl-4">
                <div class="row"> <!-- Filtro 1 por clientes -->
                    <div class="col-5"> 
                    	<h6 class="textoMostrar">Mostrar por cliente</h6>
                    </div>
                    <div class="col-6"> <!-- Seccion dropdown list (combobox) -->
                   	 	<div class="dropdown">
				        	<button class="btn btn-info dropdown-toggle espacioBotones" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        		Seleccione el cliente
				        	</button>
				        	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				            	<a class="dropdown-item" href="#">BAYER S.A</a>
				            	<a class="dropdown-item" href="#">ROTOFLEX</a>
				        	</div>
			        	</div>
                    </div> <!-- Cierra seccion dropdown -->
                </div> <!-- Cierra filtro 1 -->
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-4">
                <div class="row"> <!-- Filtro 2 por sociedad -->
                    <div class="col-5">
                    	<h6 class="textoMostrar">Mostrar por sociedad</h6>
                    </div>
                    <div class="col-6"> <!-- Seccion dropdown list (combobox) -->
                    	<div class="dropdown">
				        	<button class="btn btn-info dropdown-toggle espacioBotones" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        	Seleccione la sociedad
				        	</button>
				        	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				            	<a class="dropdown-item" href="#">Activo</a>
				            	<a class="dropdown-item" href="#">Bloqueado</a>
				            	<a class="dropdown-item" href="#">Inactivo</a>
				        	</div>
			        	</div>
                    </div> <!-- Cierra seccion dropdown -->
                </div> <!-- Cierra filtro 2 -->
            </div>
            <div class="col-4"> <!-- Seccion busqueda filtrada -->
                <div class="search-box">
					<i class="material-icons">&#xE8B6;</i>
					<input type="text" class="form-control" placeholder="Busqueda filtrada&hellip;">
				</div>
            </div> <!-- Cierra seccion busqueda filtrada -->
        </div>
	</div> <!-- Cierra seccion de filtros de busqueda -->
	<div id="tablaClientes" class="container-fluid"> <!-- Seccion de tabla de clientes -->
		<div class="table-responsive borde"> <!-- Tabla de clientes -->
			<div class="table-wrapper">
				<div class="table-title"> <!-- Titulo de tabla -->
					<div class="row">
						<div class="col-sm-6">
							<h2 class="textoMto">Mantenimiento de <b>estado de cuenta</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#modalAgregarUsuario" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo usuario</span></a>					
						</div>
					</div>
				</div> <!-- Cierra titulo de tabla -->
				<table class="table table-striped table-hover"> <!-- Seccion de contenido de la tabla -->
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Cliente</th>
							<th>Sociedad</th>
							<th>Codigo</th>
							<th>Factura</th>
							<th>Asignacion</th>
							<th>Fecha</th>
							<th>Clase</th>
							<th>Credito</th>
							<th>Vencimiento</th>
							<th>Dias vendidos</th>
							<th>Divisa</th>
							<th>Total</th>
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
							<td>BAYER, S.A.</td>
							<td>Zadik</td>
							<td>18</td>
							<td>3675128430</td>
							<td>1025498765</td>
							<td>03/01/2021</td>
							<td>ZF</td>
							<td>60</td>
							<td>04/03/2021</td>
							<td>-11</td>
							<td>GTQ</td>
							<td>10,200.00</td>
							<td>
								<a href="#modalModificarEstadoCuenta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarEstadoCuenta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>BAYER, S.A.</td>
							<td>Zadik</td>
							<td>18</td>
							<td>2775796050</td>
							<td>1136016414</td>
							<td>25/02/2021</td>
							<td>ZF</td>
							<td>60</td>
							<td>26/04/2021</td>
							<td>-33</td>
							<td>GTQ</td>
							<td>201,200.13</td>
							<td>
								<a href="#modalModificarEstadoCuenta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarEstadoCuenta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>BAYER, S.A.</td>
							<td>Zadik</td>
							<td>18</td>
							<td>3185724788</td>
							<td>1136016415</td>
							<td>25/02/2021</td>
							<td>ZF</td>
							<td>60</td>
							<td>26/04/2021</td>
							<td>-33</td>
							<td>GTQ</td>
							<td>41,284.05</td>
							<td>
								<a href="#modalModificarEstadoCuenta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarEstadoCuenta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>						
					</tbody>
				</table> <!-- Cierra seccion de contenido de la tabla -->
				<div class="clearfix"> <!-- Seccion inferior de la tabla controles-->
					<div class="hint-text">Mostrando <b>3</b> de <b>9</b> registros</div>
					<ul class="pagination">
						<li class="page-item"><a href="#" class="page-link">Anterior</a></li>
						<li class="page-item active"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
					</ul>
				</div> <!-- Cierra seccion inferior de la tabla controles-->
			</div>
		</div><!-- Cierra la tabla de clientes -->        
	</div> <!-- Cierra seccion de tabla de clientes -->
	<div id="modalMantenimientoSociedad" class="modal fade"> <!-- Modal mantenimientos sociedad -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Cabecera del modal -->					
						<h4 class="modal-title">Mantenimiento de sociedades</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div> <!-- Cierra cabera del modal -->
					<div class="modal-body"> <!-- Cuerpo del modal -->					
						<div class="container"> <!-- Seccion de campos modal -->
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Cliente</label>
										<select id="inputState" class="form-control">
											<option selected>SigmaQ</option>
											<style>
												.letraBlanca{
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

												.textoMto{
													color:white;
												}

												.tamañoTabla{
													max-height: 95%;
												}

												.espacioSuperior{
													padding-top:50px;
												}

												.espacioBotones{
													width:300px;
												}

												.tamañoBotones{
													width:280px;
												}

												.tamañoBotonesCRUD{
													width:150px;
												}

												.tamañoTituloTabla{
													width:100%;
												}
											</style>
										</select>
									</div>					
								</div>			
								<div class="col-6">
									<div class="form-group">
										<label>Sociedad</label>
										<input type="text" class="form-control" required>
									</div>				
								</div>
							</div>					
						</div> <!-- Cierra seccion de campos del modal -->
						<div class="row espacioCRUDModal"> <!-- Fila de botones de mantenimientos -->
							<div class="col-sm-3">
								<button type="button" class="btn btn-info tamañoBotonesCRUD">Ingresar</button>
							</div>
							<div class="col-sm-3">
								<button type="button" class="btn btn-info tamañoBotonesCRUD">Modificar</button>
							</div>
							<div class="col-sm-3">
								<button type="button" class="btn btn-info tamañoBotonesCRUD">Eliminar</button>
							</div>
							<div class="col-sm-3">	
								<button type="button" class="btn btn-info tamañoBotonesCRUD">Busqueda</button>
							</div>									
						</div> <!-- Cierra fila de botones -->
						<div class="container"> <!-- Seccion de tabla sociedades -->
							<table class="table table-sm">
								<thead>
								  <tr>
									<th scope="col">#</th>
									<th scope="col">ID</th>
									<th scope="col">Cliente</th>
									<th scope="col">Sociedad</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<th scope="row"><span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span></th>
									<td>1</td>
									<td>BAYER S.A.</td>
									<td>ROTOFLEX</td>
								  </tr>
								  <tr>
									<th scope="row"><span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span></th>
									<td>2</td>
									<td>BAYER S.A.</td>
									<td>ZADIK</td>
								  </tr>
								</tbody>
							  </table>
						</div><!-- Cierra tabla de sociedades -->
					</div>	<!-- Cierra cuerpo del modal -->
					<div class="modal-footer">	<!-- Pie del modal -->
						<input type="button" class="btn btn-info" data-dismiss="modal" value="Salir">
					</div> <!-- Cierra pie del modal -->
				</form>
			</div>	<!-- Cierra contenido del modal -->
		</div>
	</div> <!-- Cierra modal mantenimiento sociedad -->
	<div id="modalIngresarEstadoCuenta" class="modal fade"> <!-- Modal de ingreso de estado de cuenta -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Cabecera del modal -->				
						<h4 class="modal-title">Agregar nuevo estado de cuenta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>	<!-- Cierra cabecera del modal -->
					<div class="modal-body"><!-- Cuerpo del modal -->			
						<div class="row"> <!-- Fila de campos del modal -->
							<div class="col-6">
								<div class="form-group">
									<label>Cliente</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Codigo</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Asignacion</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Clase</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Vencimiento</label>
									<input type="text" class="form-control" required>
								</div>		
								<div class="form-group">
									<label>Divisa
									</label>
									<select id="inputState" class="form-control">
										<option selected>USD</option>
										<option>GTQ</option>
									</select>
								</div>			
							</div>
								
							<div class="col-6">
								<div class="form-group">
									<label>Sociedad</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
								</div>
									
								<div class="form-group">
									<label>Factura</label>
									<input type="text" class="form-control" required>
								</div>
	
								<div class="form-group">
									<label>Fecha</label>
									<input type="text" class="form-control" required>
								</div>
										
								<div class="form-group">
									<label>Credito</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Dias vencidos</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Total</label>
									<input type="text" class="form-control" required>
								</div>
							</div>
						</div>	<!-- Cierra fila de campos del modal -->
					</div>	<!-- Cierra cuerpo del modal -->
					<div class="modal-footer">	<!-- Pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>	<!-- Cierra pie del modal -->
				</form>
			</div>	<!-- Cierra contenido del modal -->						
		</div> <!-- Cierra modal dialog -->
	</div><!-- Cierra modal ingreso de estado de cuenta -->
	<div id="modalModificarEstadoCuenta" class="modal fade"> <!-- Modal modificar estado de cuenta -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Cabecera del modal -->					
						<h4 class="modal-title">Editar estado de cuenta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div> <!-- Cierra cabecera del modal -->
					<div class="modal-body"> <!-- Cuerpo del modal -->					
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Cliente</label>
									<select id="inputState" class="form-control">
										<option>ROTOFLEX</option>
										<option selected>ZADICK</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Codigo</label>
									<input type="text" class="form-control" value="18" required>
								</div>	
								<div class="form-group">
									<label>Asignacion</label>
									<input type="text" class="form-control"  value="1025498765" required>
								</div>	
								<div class="form-group">
									<label>Clase</label>
									<input type="text" class="form-control" value="ZF" required>
								</div>	
								<div class="form-group">
									<label>Vencimiento</label>
									<input type="text" class="form-control" value="04/03/2021" required>
								</div>		
								<div class="form-group">
									<label>Divisa
									</label>
									<select id="inputState" class="form-control">
										<option>USD</option>
										<option  selected>GTQ</option>
									</select>
								</div>			
							</div>				
							<div class="col-6">
								<div class="form-group">
									<label>Sociedad</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Factura</label>
									<input type="text" class="form-control" value="3675128430" required>
								</div>
								<div class="form-group">
									<label>Fecha</label>
									<input type="text" class="form-control" value="03/01/2021" required>
								</div>		
								<div class="form-group">
									<label>Credito</label>
									<input type="text" class="form-control" value="60" required>
								</div>
								<div class="form-group">
									<label>Dias vencidos</label>
									<input type="text" class="form-control" value="-11" required>
								</div>
								<div class="form-group">
									<label>Total</label>
									<input type="text" class="form-control" value="10,200.00" required>
								</div>
							</div>
						</div>
					</div>	<!-- Cierra cabecera del modal -->
					<div class="modal-footer"> <!-- Pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
					</div> <!-- Cerrar pie del modal -->
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div>
	<div id="modalEliminarEstadoCuenta" class="modal fade"> <!-- Modal eliminar estado de cuenta  -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Cabecera modal -->				
						<h4 class="modal-title">Eliminar Estado de Cuenta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>	<!-- Cierra cabecera modal -->
					<div class="modal-body"> <!-- Cuerpo del modal -->					
						<p>¿Estas seguro que deseas eliminar estado de cuenta?</p>
						<p class="text-warning"><small>Confirme si desea realizar la accion.</small></p>
					</div> <!-- Cierra cuerpo del modal -->
					<div class="modal-footer"> <!-- Pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div> <!-- Cierra pie del modal -->
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div> <!-- Cierra modal estado de cuenta -->
</div> <!-- Cierra seccion contenido -->
<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js');
?>