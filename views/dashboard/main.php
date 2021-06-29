<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Portal Clientes','dashboard');
?>
<div id="contenido" class="container-fluid fondoBlanco"> <!-- Seccion incluye todo el contenido del cuerpo la pagina -->
	<div id="fondo" class="container-fluid"> <!-- Seccion de cabecera con imagen de fondo-->
      	<div class="container">
	  		<h1 class="letraBlancaEspacio">Bienvenido al sistema de administradores</h1>
		  	<h3 class="letraBlancaIndex">SigmaQ</h3>
	  	</div>
    </div>	<!-- Cierra seccion de cabecera -->
	<div id="estadisticas" class="container-fluid"><!-- Seccion de estadisticas -->	
		<div class="container-fluid">
			<h3 class="centrar">Acciones realizadas por los usuarios del sistema</h3>
			<div class="clearfix"> <!-- Seccion controladores tabla -->
				<div class="hint-text">Mostrando <b>4</b> de <b>12</b> registros</div>
					<ul class="pagination">
					<li class="page-item"><a href="#" class="page-link">Anterior</a></li>
					<li class="page-item active"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
				</ul>
			</div> <!-- Cierra controladores de tabla -->
			<table class="table borde">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Usuario</th>				
						<th scope="col">Hora</th>
						<th scope="col">Accion</th>
						<th scope="col">Empresa</th>
					</tr>
				</thead>
				<tbody id="tbody-rows">	
				</tbody>
			</table>
		</div>	
	</div> <!-- Cierra secion estadisticas -->
</div>	<!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('main');
?>
