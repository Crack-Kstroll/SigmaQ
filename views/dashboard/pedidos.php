<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de pedidos','dashboard');
?>
<div id="contenido" class="container-fluid fondo"> <!-- Seccion de contenido -->
    
	<div class="container-fluid espacioSuperior"> <!-- Seccion de titulo de pagina -->
        <h5 class="tituloMto">Gestion de pedidos</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
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
    
	
	<div class="container-fluid"> <!-- Seccion de tabla de usuarios -->
		<br><br>
		<table class="table borde">
			<thead class="thead-dark">
				<tr>
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
			</tbody>
		</table>	  
	</div>

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
</div> <!-- Cierra seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('pedidos');
?>