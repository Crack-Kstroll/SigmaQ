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
<div id="contenido" class="container-fluid fondo">
    <div class="container-fluid espacioSuperior">
        <h5 class="tituloMto">Gestion de indice de entrega</h5>
        <img src="../../resources/img/division.png" class="separador" alt="">
    </div>
    <br><br>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-5">
                <div class="row">

                    <div class="col-6">
                        <h6 class="textoMostrar">Mostrar por sociedad</h6>
                    </div>
                    <div class="col-6">
                    <div class="dropdown">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Seleccione la sociedad
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  <a class="dropdown-item" href="#">ROTOFLEX</a>
				  <a class="dropdown-item" href="#">ZADICK</a>
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
		</div>
	</div>

    <div id="tablaIndice" class="container-fluid">
		<div class="table-responsive borde">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2 class="textoMto">Mantenimiento de <b>indice de entrega</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#modalMantenimientoSociedad" class="btn btn-info" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Mantenimiento Sociedad</span></a>
							<a href="#modalIngresarIndiceEntrega" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo indice de entrega</span></a>					
						</div>
					</div>
				</div>
				<div class="row">
                <table class="table table-striped table-hover ">
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
				</table>
				<div class="clearfix">
					<div class="hint-text">Mostrando <b>2</b> de <b>2</b> registros</div>
				</div>
                </div>
			</div>
		</div>        
	</div><br><br><br><br>
	
	<div id="modalMantenimientoSociedad" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Mantenimiento de sociedades</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
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
										<label>Sociedad</label>
										<input type="text" class="form-control" required>
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
						</div>


					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-info" data-dismiss="modal" value="Salir">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Agregar HTML -->
	<div id="modalIngresarIndiceEntrega" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar nuevo indice de entrega</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
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
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="modalModificarIndiceEntrega" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Editar indice entrega</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
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
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Modal HTML -->
	<div id="modalEliminarIndiceEntrega" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
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
			</div>
		</div>
	</div>


<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js');
?>