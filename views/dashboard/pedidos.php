<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de pedidos','dashboard');
?>
<div id="contenido" class="container-fluid fondo"> <!-- Seccion de contenido -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion de titulo de pagina -->
        <h5 class="tituloMto">Gestion de pedidos</h5>
        <img src="../../resources/img/division.png" class="separador" alt="">
    </div> <!-- Cierra seccion de titulo de pagina -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion de busqueda filtrada -->
		<div class="row"> <!-- Fila opciones recuperacion -->
			<div class="col-sm-5">
                <div class="row">
                    <div class="col-5">
                        <h6 class="textoMostrar">Mostrar por cliente</h6>
                    </div>
                    <div class="col-7">
                    	<div class="dropdown">
						<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Seleccione el cliente
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  			<a class="dropdown-item" href="#">Activo</a>
				  			<a class="dropdown-item" href="#">Bloqueado</a>
				  			<a class="dropdown-item" href="#">Inactivo</a>
						</div>
					</div>
			        </div>
				</div>
            </div>
			<div class="col-sm-7">
				<div class="search-box">
					<i class="material-icons">&#xE8B6;</i>
					<input type="text" class="form-control" placeholder="Busqueda filtrada&hellip;">
				</div>
			</div>
		</div> <!-- Cerrar opciones de busqueda filtrada -->
	</div> <!-- Cierra seccion de busqueda filtrada -->
    <div id="tablaPedidos" class="container-fluid"> <!-- Seccion de tabla de pedidos -->
		<div class="table-responsive borde">
			<div class="table-wrapper"> 
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2 class="textoMto">Mantenimiento de <b>pedidos</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#modalIngresarPedido" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo pedido</span></a>					
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover"> <!-- tabla de pedidos -->
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Cliente</th>
							<th>Pos</th>
							<th>OC</th>
							<th>Solicitada</th>
							<th>Descripcion</th>
							<th>Codigo</th>
							<th>Enviada</th>
							<th>Fecha entregada</th>
							<th>Fecha confirmada</th>
							<th>Comentarios</th>
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
							<td>10</td>
							<td>4502180550</td>
							<td>50000</td>
							<td>Inserto Aspirina Advanced TABS EC</td>
							<td>86612704</td>
							<td>50000</td>
							<td>15-mar-21</td>
							<td>15-mar-21</td>
							<td></td>
							<td>
								<a href="#modalModificarPedido" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarPedido" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
							<td>10</td>
							<td>4502181591</td>
							<td>20000</td>
							<td>Inserto Aspirina Advanced TABS EC</td>
							<td>86612704</td>
							<td>206000</td>
							<td>15-mar-21</td>
							<td>15-mar-21</td>
							<td></td>
							<td>
								<a href="#modalModificarPedido" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarPedido" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
							<td>10</td>
							<td>4502176767</td>
							<td>500000</td>
							<td>REDOXON NARANJA TAEF DORSO 3/19</td>
							<td>86400227</td>
							<td>41450</td>
							<td>25-mar-21</td>
							<td>1-abril-21</td>
							<td></td>
							<td>
								<a href="#modalModificarPedido" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarPedido" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
							<td>20</td>
							<td>4502176767</td>
							<td>50000</td>
							<td>REDOXON NARANJA TAEF DORSO 3/19</td>
							<td>86400227</td>
							<td>37350</td>
							<td>25-mar-21</td>
							<td>1-jul-21</td>
							<td>Complementos</td>
							<td>
								<a href="#modalModificarPedido" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#modalEliminarPedido" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>								
					</tbody>
				</table> <!-- Cierra tabla de pedidos -->
				<div class="clearfix"> <!-- Seccion controladores de tabla -->
					<div class="hint-text">Mostrando <b>5</b> de <b>25</b> registros</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Anterior</a></li>
						<li class="page-item"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item active"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
					</ul>
				</div> <!-- Cierra controladores de tabla -->
			</div> <!-- Cierra el wrapper de la tabla  -->
		</div>        
	</div> <!-- Cierra seccion de tabla de pedidos -->
	<div id="modalIngresarPedido" class="modal fade"> <!-- Modal ingresar pedido -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar nuevo pedido</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"> <!-- Cuerpo del modal -->				
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Cliente</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
								</div>	
								<div class="form-group">
									<label>OC</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Codigo</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Fecha compra</label>
									<input type="text" class="form-control" required>
								</div>				
							</div>			
							<div class="col-6">			
								<div class="form-group">
									<label>Pos</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Cantidad solicitada</label>
									<input type="text" class="form-control" required>
								</div>
									
								<div class="form-group">
									<label>Cantidad enviada</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Fecha confirmada</label>
									<input type="text" class="form-control" required>
								</div>
							</div>										
						</div>		
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Descripcion</label>
									<textarea class="form-control" aria-label="With textarea"></textarea>
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Comentarios</label>
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
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div><!-- Cierra modal ingresar pedido -->
	<div id="modalModificarPedido" class="modal fade"> <!-- Modal modificar pedido -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Editar pedido</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="row">
	
							<div class="col-6">
								<div class="form-group">
									<label>Cliente</label>
									<select id="inputState" class="form-control">
										<option selected>ROTOFLEX</option>
										<option>ZADICK</option>
									</select>
									</div>	
									<div class="form-group">
										<label>OC</label>
										<input type="text" class="form-control" value="4502180550" required>
									</div>	
									<div class="form-group">
										<label>Codigo</label>
										<input type="text" class="form-control" value="86612704" required>
									</div>	
									<div class="form-group">
										<label>Fecha entregada</label>
										<input type="text" class="form-control" value="15/03/2021" required>
										<style>
											.fondis{
												background-color: white;
												padding-top: 50px;
											}

											.borde{
												border: black 1px solid;
												border-radius: 5px;
											}
											.search-box {
												position: relative;        
												float: right;
											}
											.search-box input {
												height: 34px;
												border-radius: 20px;
												padding-left: 35px;
												border-color: #ddd;
												box-shadow: none;
											}
											.search-box input:focus {
												border-color: #3FBAE4;
											}
											.search-box i {
												color: #a0a5b1;
												position: absolute;
												font-size: 19px;
												top: 8px;
												left: 10px;
											}

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
											</style>
									</div>				
								</div>		
							<div class="col-6">		
								<div class="form-group">
									<label>Pos</label>
									<input type="text" class="form-control" value="10" required>
								</div>

								<div class="form-group">
									<label>Cantidad solicitada</label>
									<input type="text" class="form-control" value="50000" required>
								</div>
									
								<div class="form-group">
									<label>Cantidad enviada</label>
									<input type="text" class="form-control" value="50000" required>
								</div>
								<div class="form-group">
									<label>Fecha confirmada</label>
									<input type="text" class="form-control" value="15/03/2021" required>
								</div>
							</div>										
						</div>				
						<div class="row">
							<div class="col-12">	
								<div class="form-group">
									<label>Descripcion</label>
									<textarea class="form-control" aria-label="With textarea"></textarea>
								</div>	
							</div>	
						</div>	
			    		<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Comentarios</label>
									<input type="text" class="form-control" required>
								</div>	
							</div>
						</div>	
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
					</div>
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div> 
	</div> <!-- Cierra modal modificar pedido -->
	<div id="modalEliminarPedido" class="modal fade"> <!-- Modal eliminar pedido -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido del modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar pedido</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Estas seguro que deseas eliminar el pedido?</p>
						<p class="text-warning"><small>Confirme si desea realizar la accion.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div> <!-- Cierra contenido del modal -->
		</div>
	</div> <!-- Cierra modal eliminar pedido -->
</div> <!-- Cierra seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js');
?>