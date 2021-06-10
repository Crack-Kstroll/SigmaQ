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
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Castroll</td>	
						<td>12/04/2021 4:39p.m.</td>
						<td>Consulto su estado de cuenta</td>
						<td>BAYER</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Moys</td>	
						<td>12/04/2021 3:32p.m.</td>
						<td>Inicio sesion</td>
						<td>SIGMAQ</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Pacheco</td>	
						<td>12/04/2021 2:43p.m.</td>
						<td>Consulto su estado de cuenta</td>
						<td>ROTOFLEX</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>Diego02</td>	
						<td>12/04/2021 1:12p.m.</td>
						<td>Inicio sesion</td>
						<td>BAYER</td>
					</tr>	
					<tr>
						<th scope="row">5</th>
						<td>Castroll</td>	
						<td>12/04/2021 12:12p.m.</td>
						<td>Inicio sesion</td>
						<td>BAYER</td>
					</tr>			
				</tbody>
			</table>
		</div>	
	</div> <!-- Cierra secion estadisticas -->
</div>	<!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('index');
?>
