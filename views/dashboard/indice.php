<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de indice','dashboard');
?>
<div id="contenido" class="container-fluid fondo">
    <div class="container-fluid espacioSuperior">
        <h5 class="tituloMto">Gestion de indice de entrega</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
    </div>
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
					<a class="btn btn-info btn-md " onclick="openCreateDialog()" role="button" aria-disabled="true">Registrar Índice</button></a>							
				</div>
			</div>
		</form>
	<!-- Cierra seccion de busqueda filtrada -->		
	</div>

	<div class="container-fluid espacioSuperior"> <!-- Seccion de tabla de usuarios -->
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
			<!-- Contenido de la tabla -->
			<tbody id="tbody-rows">	
			</tbody>
		</table>
			  
	</div>

	<!-- Modal ingresar usuario -->
	<div id="modal-form" class="modal fade"> 
		<div class="modal-dialog">
			<!-- Contenido modal -->
			<div class="modal-content">
				<form id="save-form">
					<div class="modal-header">						
						<h4 id="modal-title">Agregar Índice de Entrega</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<!-- Cuerpo del modal -->
					<div class="modal-body">				
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Responsable</label>
									<input type="text" id="responsable" name="responsable" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Cliente</label>
									<select id="cliente" name="cliente" class="form-control">
										<option selected></option>
										<option>Root</option>
										<option>Administrador</option>
									</select>
								</div>				
								<div class="form-group">
									<label>Organización</label>
									<input id="organizacion" name="organizacion" type="text" class="form-control" required>
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
			</div>
		</div>
	</div>


</div> <!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('indice');
?>