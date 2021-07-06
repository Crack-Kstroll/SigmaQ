<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Estado de cuenta');
?>
<!-- Jumbotron para el título -->
<div class="jumbotron jumbotron-fluid" id="jumbo_estado">
  <div class="container">
    <h1 class="display-4">Estado de cuenta</h1>
    <p class="lead">Aquí puedes revisar tus estados de cuenta actualizados desde el mes de enero 2021.</p>
  </div>
</div>
<!-- Tabla -->
	<!-- Seccion de tabla de registros -->
	<div class="container-fluid espacioSuperior"> 
		<table class="table borde">
			<!-- Cabecera de la tabla -->
			<thead class="thead-dark">
				<tr>
          <th>Responsable</th>
          <th>Sociedad</th>
          <th>Usuario</th>
          <th>Codigo</th>
          <th>Factura</th>
          <th>Asignación</th>
          <th>Fecha Contable</th>
          <th>Clase</th>
          <th>Fecha de Vencimiento</th>
          <th>Días Restantes</th>
          <th>Divisa</th>
          <th>Total General</th>
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
<?php
Public_Page::footerTemplate('estadoCuenta');
?>