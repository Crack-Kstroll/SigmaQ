<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Índice de entrega');
?>
<div class="my-4"></div></div>
<!-- Tabla -->
	<!-- Seccion de tabla de registros -->
	<div class="container-fluid espacioSuperior"> 
		<table class="table borde">
			<!-- Cabecera de la tabla -->
			<thead class="thead-dark">
				<tr>
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
Public_Page::footerTemplate('indice');
?>