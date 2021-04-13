<?php
include('../../app/helpers/dashboard_page.php');
Dashboard_Page::headerTemplate('Portal Clientes');
?>
<div id="contenido" class="container-fluid fondo">
    <div class="container-fluid espacioSuperior">
        <h5 class="tituloMto">Gestion de indice de entrega</h5>
        <img src="../../resources/img/division.png" class="separador" alt="">
    </div>
    <div class="container-fluid espacioSuperior">
		<div class="row">
			<div class="col-sm-5">
				<div class="row">
                    <div class="col-md-12 col-lg-5"> <!-- Seccion tipo busqueda -->
                        <h6 class="textoMostrar">Mostrar por estado</h6>
                    </div> <!-- Cierra seccion tipo de busqueda -->
                    <div class="col-md-12 col-lg-7"> <!-- Seccion de filtros -->
                    	<div class="dropdown">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccione sociedad
							</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  			<a class="dropdown-item" href="#">ROTOFLEX</a>
				  			<a class="dropdown-item" href="#">ZADICK</a>
						</div>
					</div> <!-- Cierra seccion de filtros -->
			    </div> <!-- Cierra la fila -->
			</div> <!-- Cierra la columna -->
            </div>
			<div class="col-sm-7"> <!-- Seccion de busqueda filtrada -->
				<div class="search-box">
					<i class="material-icons">&#xE8B6;</i>
					<input type="text" class="form-control" placeholder="Busqueda filtrada&hellip;">
				</div>
			</div> <!-- Cierra seccion de busqueda filtrada -->
		</div>
	</div>
    <div id="tablaIndice" class="container-fluid"> <!-- Seccion de tabla indice de entrega -->
		<div class="table-responsive borde"> 
			<div class="table-wrapper">
				<div class="table-title"> <!-- Seccion titulo de tabla -->
					<div class="row">
						<div class="col-sm-7 col-md-8 col-xl-6">
							<h2 class="textoMto">Mantenimiento de <b>indice de entrega</b></h2>
						</div>
						<div class="col-sm-5 col-md-4 col-xl-6"> <!-- Seccion botones titulo tabla -->
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-6">
									<a href="#modalMantenimientoSociedad" class="btn btn-info espacioBotones" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Mantenimiento Sociedad</span></a>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-6">				
									<a href="#modalIngresarIndiceEntrega" class="btn btn-success espacioBotones" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar indice entrega</span></a>					
								</div>
							</div>					
						</div> <!-- Cierra seccion botones titulo tabla -->
					</div> 
				</div> <!-- Cierra seccion titulo de tabla -->
				<div class="row"> <!-- Fila de tabla -->
            	<table class="table table-striped table-hover "> <!-- Tabla de indice -->
					<thead>
						<tr>
							<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
							</th>
								<th>Cliente</th>
								<th>Organizacion</th>
								<th>Indice</th>
								<th>Compromisos</th>
								<th>Cumplidos</th>
								<th>No Cumplidos</th>
								<th>No Considerados</th>
								<th>% incum no entregados</th>
								<th>% incum por fecha</th>
								<th>% incum por calidad</th>
								<th>% incum por cantidad</th>
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
								<td>Bayer</td>
								<td>Zadik</td>
								<td>0</td>
								<td>6</td>
								<td>0</td>
								<td>6</td>
									<td>0</td>
								<td>16.67</td>
									<td>0</td>
									<td>50</td>
									<td>0</td>
									<td>
										<a href="#modalModificarIndiceEntrega" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
										<a href="#modalEliminarIndiceEntrega" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									</td>
								</tr>	
							<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
								<td>Bayer</td>
								<td>Total Sel</td>
								<td>0</td>
								<td>6</td>
								<td>0</td>
								<td>6</td>
								<td>0</td>
								<td>16.67</td>
								<td>0</td>
								<td>50</td>
								<td>0</td>
							<td>
								<a href="#modalModificarIndiceEntrega" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarIndiceEntrega" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>								
					</tbody>
				</table>	<!-- Cierra tabla de indice -->
				<div class="clearfix">
					<div class="hint-text">Mostrando <b>2</b> de <b>2</b> registros</div>
				</div>
            	</div>
			</div> <!-- Cierra table wrapper -->
		</div>  <!-- Cierra tabla -->      
	</div> <!-- Cierra seccion tabla de indice entrega -->
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
	<div id="modalIngresarIndiceEntrega" class="modal fade"> <!-- Modal ingreso de indice de entrega -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Cabecera del modal -->					
						<h4 class="modal-title">Agregar nuevo indice de entrega</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>	<!-- Cierra cabecera del modal  -->
					<div class="modal-body"> <!-- Cuerpo del modal -->
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Cliente</label>
									<select id="inputState" class="form-control">
										<option selected></option>
										<option>BAYER S.A.</option>
									</select>
								</div>	
							</div>
						</div>					
						<div class="row"> <!-- Fila de campos modal -->
							<div class="col-6">
								<div class="form-group">
									<label>Organizacion</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Compromisos</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>No considerados</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>% incum por fecha</label>
									<input type="text" class="form-control" required>
								</div>						
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<label>Indice</label>
									<input type="text" class="form-control" required>
								</div>
								
								<div class="form-group">
									<label>No cumplidos</label>
									<input type="text" class="form-control" required>
								</div>

								<div class="form-group">
									<label>% incum no entregados</label>
									<input type="text" class="form-control" required>
								</div>
									
								<div class="form-group">
									<label>% incum por cantidad</label>
									<input type="text" class="form-control" required>
								</div>
							</div>
						</div>	<!-- Cierra fila de campos modal -->
					</div> <!-- Cierra cuerpo modal -->
					<div class="modal-footer"> <!-- Pie modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>	<!-- Cierra pie modal -->
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div> <!-- Cierra modal ingreso de indice de entrega -->
	<div id="modalModificarIndiceEntrega" class="modal fade"> <!-- Modal modificar indice de entrega -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">	<!-- Cabecera del modal -->					
						<h4 class="modal-title">Editar indice entrega</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div> <!-- Cierra cabecera del modal -->
					<div class="modal-body"> <!-- Cuerpo del modal -->					
						<div class="row">
							<div class="col-12">	
								<div class="form-group">
									<label>Cliente</label>
									<select id="inputState" class="form-control">
										<option selected></option>
										<option>BAYER S.A.</option>
									</select>
								</div>	
							</div>		
						</div>					
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Organizacion</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Compromisos</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>No considerados</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>% incum por fecha</label>
									<input type="text" class="form-control" required>
								</div>						
							</div>		
							<div class="col-6">
								<div class="form-group">
									<label>Indice</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>No cumplidos</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>% incum no entregados</label>
									<input type="text" class="form-control" required>
								</div>				
								<div class="form-group">
									<label>% incum por cantidad</label>
									<input type="text" class="form-control" required>
								</div>
							</div>
						</div>
					</div> <!-- Cierra cuerpo del modal -->
					<div class="modal-footer"> <!-- Pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
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

							.espacioSuperior{
								padding-top:50px;
							}

							.espacioBotones{
								padding-bottom:10px;
								width:280px;
							}

							.tamañoBotonesCRUD{
								width:150px;
							}

							.tamañoTituloTabla{width:100%;}

							.espacioCRUDModal{
								padding-top:30px;
								padding-bottom:30px;
							}
							</style>
					</div> <!-- Cierra pie del modal -->
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div> <!-- Cierra modal indice de entrega --> 
	<div id="modalEliminarIndiceEntrega" class="modal fade"> <!-- Modal eliminar indice de entrega -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header"> <!-- Contenido del modal -->						
						<h4 class="modal-title">Eliminar Indice Entrega</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div> 
					<div class="modal-body">					
						<p>¿Estas seguro que deseas eliminar indice de entrega?</p>
						<p class="text-warning"><small>Confirme si desea realizar la accion.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div> <!-- Cierra contenido del modal  -->
		</div>
	</div> <!-- Cierra el modal indice de entrega -->
</div> <!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js');
?>