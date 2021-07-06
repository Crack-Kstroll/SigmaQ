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
					<a class="btn btn-info btn-md " onclick="openCreateDialog()" role="button" aria-disabled="true">Registrar Pedido</button></a>							
				</div>
			</div>
		</form>
	</div>
	<!-- Cierra seccion de busqueda filtrada -->		
	
	<div class="container-fluid espacioSuperior"> <!-- Seccion de tabla de usuarios -->
		<table class="table borde" id="tbody-rows">
			<h4 id="warning-message" style="text-align:center"></h4>
			<!-- Contenido de la tabla -->
			<tbody>	
			</tbody>
		</table>
	</div>
</div> 
<!-- Cierra seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('pedidos');
?>