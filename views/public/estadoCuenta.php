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


<!-- <div class="my-4"></div> -->
<!-- Botón con el modal -->
<!-- <div class="container-fluid my-4">
  <div class="row">
    <div class="col">
        Button trigger modal
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="conf_tabla_estado">
          Configurar tabla
        </button>
    </div>
  </div>
</div> -->
	<!-- Seccion de busqueda filtrada -->
	<div class="container-fluid">
		<form method="post" id="search-form">
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-5">
							<!-- Campo de busqueda filtrada -->
							<input id="search" name="search" class="searchButtons form-control mr-sm-2" type="search" placeholder="Buscar por sociedad o responsable" aria-label="search">
						</div>
						<div class="col-sm-2">
							<!-- Boton para busqueda filtrada -->
							<button class="centrarBoton btn btn-outline-info my-2 my-sm-0" type="submit">
								<i class="material-icons">search</i></button>
							</button>
						</div>
					</div>
				</div>
				<!-- <div class="col-sm-2"> -->
					<!-- Boton para ingresar nuevos registros -->
					<!-- <a class="btn btn-primary btn-md " onclick="openCreateDialog()" role="button" aria-disabled="true">Configurar tabla</button></a>
				</div> -->
			</div>
		</form>
		<!-- Cierra seccion de busqueda filtrada -->
	</div>

      <!-- Modal -->
      <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Configura lo que quieres ver</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                      <label class="custom-control-label" for="customCheck1">Sociedad</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                      <label class="custom-control-label" for="customCheck2">PO</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" checked="">
                      <label class="custom-control-label" for="customCheck3">POS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" checked="">
                      <label class="custom-control-label" for="customCheck4">Factura</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5" checked="">
                      <label class="custom-control-label" for="customCheck5">Asignación</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" checked="">
                      <label class="custom-control-label" for="customCheck6">Fecha</label>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">               
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" checked="">
                      <label class="custom-control-label" for="customCheck7">Clase</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" checked="">
                      <label class="custom-control-label" for="customCheck8">Crédito</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" checked="">
                      <label class="custom-control-label" for="customCheck9">Vence</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" checked="">
                      <label class="custom-control-label" for="customCheck10">Días vencidos</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" checked="">
                      <label class="custom-control-label" for="customCheck11">Moneda</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck12" checked="">
                      <label class="custom-control-label" for="customCheck12">Total</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div> -->

<!-- Tabla -->
	<!-- Seccion de tabla de registros -->
	<div class="container-fluid espacioSuperior">
		<table class="table borde" id="tbody-rows">
			<h4 id="warning-message" style="text-align:center"></h4>
			<!-- Contenido de la tabla -->
			<tbody>
			</tbody>
		</table>
	</div>

<?php
Public_Page::footerTemplate('estadoCuenta');
?>