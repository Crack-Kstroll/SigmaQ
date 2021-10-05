<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Estado de cuenta');
?>
<div class='my-4'></div>

<!-- Botón para el modal de personalización de la tabla -->
<div class='container-fluid'>
    <div class='row'>
		<div class="col-sm-12 col-md-8">
			<form method="post" id="search-form">
				<div class="row">
					<div class="col-9 bajar">
						<!-- Campo de busqueda filtrada -->
						<input autocomplete="off" id="search" name="search" class="searchButtons form-control mr-sm-2 " type="search" placeholder="Buscar por responsable, sociedad u código" aria-label="search">
					</div>
					<div class="col-3">
						<!-- Boton para busqueda filtrada -->
						<button class="centrarBoton btn btn-outline-info my-2 my-sm-0" type="submit">
							<i class="material-icons">search</i></button>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class='col-sm-12 col-md-4'>
			<a onclick=openCustomDialog() type='button' class='btn btn-primary' id='conf_tabla_estado'>
				Configurar tabla
			</a>
		</div>
	</div><br>
</div>
<!-- Seccion de tabla de registros -->
<div class='container-fluid espacioSuperior'>
    <div class="table-responsive">
        <table class="table borde">
            <h4 id="warning-message" style="text-align:center"></h4>
            <!-- Contenido de la tabla -->
            <thead id="theaders" class="thead-dark">
            </thead>
            <tbody id="tbody-rows">
            </tbody>
        </table>
    </div>
    <div id='seccionPaginacion' class='clearfix'>
    </div>
</div>
<?php
Public_Page::footerTemplate('estadoCuenta');
?>