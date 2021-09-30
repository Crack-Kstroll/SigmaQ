<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Índice de entrega');
?>
<div class="my-4"></div>

<!-- Botón para el modal de personalización de la tabla -->
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<a onclick=openCustomDialog() type="button" class="btn btn-primary" id="conf_tabla_estado">
				Configurar tabla
			</a>
		</div>
	</div>
</div>

<!-- Seccion de tabla de registros -->
<div class="container-fluid table-responsive espacioSuperior"> 
	<table class="table borde">
		<h4 id="warning-message" style="text-align:center"></h4>
		<!-- Contenido de la tabla -->
		<thead id="theaders" class="thead-dark">

		</thead>
		<tbody id="tbody-rows">	
		</tbody>
	</table>	 

	<!-- Seccion controladores tabla -->				
	<div id="seccionPaginacion" class="clearfix"> 
	</div> 
	<!-- Cierra controladores de tabla --> 

</div>  
<!-- Cierra seccion de tabla -->

<!-- Modal  -->
<div class="modal fade" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title" name="modal-title" class="modal-title">Personalización de la tabla</h5>
			</div>
			<div class="modal-body">
				<form method="post" id="save-form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="organizacion" id="organizacion" checked>
								<label class="form-check-label" for="organizacion">Organización</label>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="indice" id="indice" checked>
								<label class="form-check-label" for="indice">Índice</label>
							</div>		
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="compromisos" id="compromisos" checked>
								<label class="form-check-label" for="compromisos">Compromisos</label>
							</div>	
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="cumplidos" id="cumplidos" checked>
								<label class="form-check-label" for="cumplidos">Cumplidos</label>
							</div>	
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="nocumplidos" id="nocumplidos" checked>
								<label class="form-check-label" for="nocumplidos">No Cumplidos</label>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="noconsiderados" id="noconsiderados" checked>
								<label class="form-check-label" for="noconsiderados">No Considerados</label>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="incumnoentregados" id="incumnoentregados" checked>
								<label class="form-check-label" for="incumnoentregados">% Incumplidos No Entregados</label>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="incumporcalidad" id="incumporcalidad" checked>
								<label class="form-check-label" for="incumporcalidad">% Incumplidos Por Calidad</label>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="incumporfecha" id="incumporfecha" checked>
								<label class="form-check-label" for="incumporfecha">% Incumplidos Por Fecha</label>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="incumporcantidad" id="incumporcantidad" checked>
								<label class="form-check-label" for="incumporcantidad">% Incumplidos Por Cantidad</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button onclick="readRows('../../app/api/public/indice.php?action=')" type="button" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</div>
	
<?php
Public_Page::footerTemplate('indice');
?>
