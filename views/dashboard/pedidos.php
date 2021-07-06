<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de pedidos','dashboard');
?>

<!-- Seccion de contenido -->
<div id="contenido" class="container-fluid fondo"> 
    
	<!-- Seccion de titulo de pagina -->
	<div class="container-fluid espacioSuperior"> 
        <h5 class="tituloMto">Gestion de pedidos</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
    </div> 
	<!-- Cierra seccion de titulo de pagina -->
    
	<!-- Seccion de busqueda filtrada --> 
    <div class="container-fluid">
		<form method="post" id="search-form">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-5">
							<!-- Campo de busqueda filtrada --> 
							<input id="search" name="search" class="searchButtons form-control mr-sm-2" type="search" placeholder="Buscar por responsable, usuario, correo y empresa" aria-label="search">
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
					<a class="btn btn-info btn-md " onclick="openCreateDialog()" role="button" aria-disabled="true">Registrar Pedido</button></a>							
				</div>
			</div>
		</form>
	</div>
	<!-- Cierra seccion de busqueda filtrada -->		
	<div class="container-fluid espacioSuperior"> 
		<table class="table borde">
			<!-- Cabecera de la tabla -->
			<thead class="thead-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Pos</th>
                    <th>OC</th>
                    <th>Solicitada</th>
                    <th>Codigo</th>
                    <th>Enviada</th>
                    <th>Fecha registrado</th>
                    <th>Fecha de entrega</th>
                    <th>Fecha de confirmación</th>
                    <th>Opciones</th>
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
	<!-- Modal  -->
<div class="modal fade" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title" name="modal-title" class="modal-title">Modal title</h5>
			</div>
			<div class="modal-body">
				<form method="post" id="save-form" enctype="multipart/form-data">
					<div class="row">
						<!-- Campo invicible del ID -->
						<input class="d-none" type="number" id="idpedido" name="idpedido">
						<div class="col-6 form-group">
							<label>Responsable</label>
							<select id="responsable" name="responsable" class="form-control">
							</select>
						</div>	
						<div class="col-6 form-group">
							<label>Cliente</label>
							<select id="cliente" name="cliente" class="form-control">
							</select>
							<label class="font-italic text-danger">No podrá modificar el valor de este campo</label>
						</div>
						<div class="col-6 form-group">
							<label>Código</label>
							<div class="form-group">
								<input id="codigo" name="codigo" type="number" min="1" class="form-control" required>
							</div>
							<label class="font-italic text-danger">No podrá modificar el valor de este campo</label>
						</div>
						<div class="col-6 form-group">
							<label>Fecha registrado</label>
							<div class="form-group">
								<input id="fecharegistro" name="fecharegistro" type="date" class="form-control" readonly>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Pos</label>
							<input id="pos" name="pos" type="number" class="form-control" required>
						</div>
						<div class="col-6 form-group">
							<label>Oc</label>
							<div class="form-group">
								<input id="oc" name="oc" type="number" class="form-control" min="1" required>
							</div>			
						</div>
						<div class="col-6 form-group">
							<label>Cantidad solicitada</label>
							<div class="form-group">
								<input id="cantidadsolicitada" name="cantidadsolicitada" type="number" class="form-control" required>
							</div>
						</div>						
						<div class="col-6 form-group">
							<label>Cantidad enviada</label>
							<div class="form-group">
								<input id="cantidadenviada" name="cantidadenviada" type="number" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Fecha de entrega</label>
							<div class="form-group">
								<input id="fechaentrega" name="fechaentrega" type="date" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Fecha confirmada de envío</label>
							<div class="form-group">
								<input id="fechaconfirmadaenvio" name="fechaconfirmadaenvio" type="date" min="0" class="form-control" required>
							</div>
						</div>
						<div class="form-group col-6">
							<label>Descripcion</label>
							<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
						</div>
						<div class="col-6 form-group">
							<label>Comentarios</label>
							<textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
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
</div> 
<!-- Cierra seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('pedidos');
?>