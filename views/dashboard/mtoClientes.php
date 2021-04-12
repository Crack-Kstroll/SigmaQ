<?php
include('../../app/helpers/dashboard_page.php');
Dashboard_Page::headerTemplate('Portal Clientes');
?>

<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #333c87;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 1000px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	

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
	width:250px;
}

</style>

<script>

$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});

</script>
<div id="contenido" class="container-fluid fondo"> <!-- Contenedor de todo el contenido de la pagina-->
    <div id="tituloPagina" class="container-fluid espacioSuperior"> <!-- Seccion de titulo de pagina-->
		<h5 class="tituloMto">Gestion de clientes</h5>
        <img src="../../resources/img/division.png" class="separador" alt="">
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
    <div id="tablaClientes" class="container-fluid"> <!-- Seccion de tabla de clientes -->
		<div class="table-responsive borde"> <!-- Tabla de clientes -->
			<div class="table-wrapper">
				<div class="table-title"> <!-- Cabecera de la tabla -->
					<div class="row">
						<div class="col-sm-7 col-md-8 col-xl-6">
							<h2 class="fontWhite">Mantenimiento de <b>clientes</b></h2>
						</div>
						<div class="col-sm-5 col-md-4 col-xl-6">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-6">
									<a href="#modalMantenimientoContactos" class="btn btn-info espacioBotones" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Registrar contactos</span></a>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-6">				
									<a href="#modalIngresarCliente" class="btn btn-success espacioBotones" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar cliente</span></a>
								</div>
							</div>					
						</div>
					</div>
				</div> <!-- Cierra cabecera de la tabla -->
				<table class="table table-striped table-hover"> <!-- Seccion de contenido de la tabla -->
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox"> <!-- Checkbox para marcar registros -->
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
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
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
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
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
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
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
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
											<option selected>SigmaQ</option>
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

						<div class="row">
							
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
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
								  </tr>
								  <tr>
									<th scope="row"><span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span></th>
									<td colspan="2">Larry the Bird</td>
									<td>@twitter</td>
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
									<label>Correo</label>
									<input type="text" class="form-control" required>
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
									<label>Telefono</label>
									<div class="form-group">
										<input type="text" class="form-control" required>
									</div>
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
									<label>Correo</label>
									<input type="text" class="form-control" value="Bayer@gmail.com" required>
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
									<input type="password" class="form-control" id="inputPassword" value="12345">
								</div>
								<div class="form-group">
									<label>Telefono</label>
									<div class="form-group">
										<input type="text" class="form-control" value="Diego" required>
									</div>
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
					</div>	<!-- Cierra cabecera del modal -->
					<div class="modal-body">	<!-- Seccion cuerpo del modal -->		
						<p>¿Estas seguro que deseas eliminar al cliente?</p>
						<p class="text-warning"><small>Confirme si desea realizar la accion.</small></p>
					</div>	<!-- Cierra cuerpo del modal -->
					<div class="modal-footer">	<!-- Seccion del pie del modal -->
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>	<!-- Cierra pie del modal -->
				</form>
			</div>
		</div>
	</div> 	<!-- Cierra modal de eliminacion de cliente -->
</div><!-- Cierra seccion de contenido de la pagina -->
<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js');
?>