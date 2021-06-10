<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Mantenimiento de usuarios','dashboard');
?>
<div id="contenido" class="container-fluid fondo"> <!-- Seccion de contenido -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion de titulo de pagina -->
        <h5 class="tituloMto">Gestion de usuarios</h5>
        <img src="../../resources/img/utilities/division.png" class="separador" alt="">
    </div> <!-- Cierra seccion de titulo de pagina -->
    <div class="container-fluid espacioSuperior"> <!-- Seccion de busqueda filtrada -->
		<div class="row"> <!-- Fila seccion de filtros de busqueda -->
			<div class="col-5"> <!-- Seccion de filtros de opciones -->
                <div class="row">
                    <div class="col-md-12 col-lg-5"> <!-- Seccion tipo busqueda -->
                        <h6 class="textoMostrar">Mostrar por tipo de usuario</h6>
                    </div> <!-- Cierra seccion tipo de busqueda -->
                    <div class="col-md-12 col-lg-7"> <!-- Seccion de filtros -->
                    	<div class="dropdown">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccione el tipo de usuario
							</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  			<a class="dropdown-item" href="#">Root</a>
				  			<a class="dropdown-item" href="#">Admin</a>
						</div>
					</div> 
			   	</div> <!-- Cierra seccion de filtros -->
			</div> <!-- Cierra seccion de filtros de opciones -->
        	</div>
			<div class="col-7"> <!-- Seccion de busqueda filtrada -->
				<div class="search-box">
					<i class="material-icons">&#xE8B6;</i>
					<input type="text" class="form-control" placeholder="Busqueda filtrada&hellip;">
				</div>
			</div> <!-- Cierra seccion de busqueda filtrada -->
		</div> <!-- Cierra fila de seccion de filtros de busqueda -->
	</div> <!-- Cierra seccion de busqueda filtrada -->
    <div class="container-fluid"> <!-- Seccion de tabla de usuarios -->
		<br><br>
		<table class="table borde">
			<thead class="thead-dark">
				<tr>
					<th>Estado</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>DUI</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Intentos</th>
					<th>Usuario</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Activo</td>
					<td>Root</td>
					<td>Diego</td>
					<td>Castro</td>
					<td>12345678-9</td>
					<td>Diego@gmail.com</td>
					<td>1234-1234</td>
					<td>0</td>
					<td>Castroll</td>
					<td>
						<a href="#modalEditarUsuario" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a href="#modalEliminarUsuario" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>		
			</tbody>
		</table>	  
	</div>
	<div id="modalAgregarUsuario" class="modal fade"> <!-- Modal ingresar usuario -->
		<div class="modal-dialog">
			<div class="modal-content"> <!-- Contenido modal -->
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar nuevo usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"><!-- Cuerpo del modal -->				
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Usuario</label>
									<input type="text" class="form-control" required>
								</div>	
								<div class="form-group">
									<label>Tipo Usuario</label>
									<select id="inputState" class="form-control">
										<option selected></option>
										<option>Root</option>
										<option>Administrador</option>
									</select>
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
									<label>Apellido</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>Confirmar contraseña</label>
									<input type="password" class="form-control" id="inputPassword" placeholder="">
								</div>
								<div class="form-group">
									<label>DUI</label>
									<div class="form-group">
										<input type="text" class="form-control" required>
									</div> 
								</div>		
							</div>
							<div class="col-12">
								<label>Correo</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo@example.com">				
							</div>
						</div>
					</div> <!-- Cierra el cuerpo del modal -->
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>
				</form>
			</div> <!-- Cierra contenido modal -->
		</div>
	</div> <!-- Cierra modal ingresar usuario -->
</div> <!-- Cierra seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('usuarios'); 
?> <!-- Agregamos el metodo que ingresa los scripts y mandamos el controlador correspondiente  -->