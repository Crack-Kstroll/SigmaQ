<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de indice','dashboard');
?>
<div id="contenido" class="container-fluid fondo">
    <div class="container-fluid espacioSuperior">
        <h5 class="tituloMto">Gestion de indice de entrega</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
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

	<div class="container-fluid"> <!-- Seccion de tabla de usuarios -->
		<br><br>
		<table class="table borde">
			<thead class="thead-dark">
				<tr>
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
		</table>
			  
	</div>

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
</div> <!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('indice');
?>