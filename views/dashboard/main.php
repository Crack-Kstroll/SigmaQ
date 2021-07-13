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
			<table class="table borde">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Usuario</th>				
						<th scope="col">Hora</th>
						<th scope="col">Acción</th>
						<th scope="col">Empresa</th>
					</tr>
				</thead>
				<tbody id="tbody-rows">	
				</tbody>
			</table>
			<div id="seccionPaginacion" class="clearfix"> <!-- Seccion controladores tabla -->
			</div> <!-- Cierra controladores de tabla -->
		</div>	
	</div> <!-- Cierra secion estadisticas -->
</div>	<!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('main');
?>
