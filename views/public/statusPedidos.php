<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Status de pedidos');
?>

<div class="my-4"></div>
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

<!-- Seccion de tabla de usuarios -->
<div class="container-fluid espacioSuperior"> 
  <table class="table borde" id="tbody-rows">
    <h4 id="warning-message" style="text-align:center"></h4>
    <!-- Contenido de la tabla -->
    <tbody>	
    </tbody>
  </table>
</div>



<?php
Public_Page::footerTemplate('status');
?>

<!-- Modal  -->
<div class="modal fade" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title" name="modal-title" class="modal-title">Modal title</h5>
			</div>
			<div class="modal-body">
				<form method="post" id="save-form" enctype="multipart/form-data">
					<div class="row">
						<!-- Campo invicible del ID -->
						<input class="d-none" type="number" id="idpedido" name="idpedido">
						<div class="col-6 form-group">
							<label>Responsable</label>
							<select id="responsable" name="responsable" class="form-control">
							</select>
						</div>	
						<div class="col-6 form-group">
							<label>Cliente</label>
							<select id="cliente" name="cliente" class="form-control">
							</select>
							<label class="font-italic text-danger">*No podrá modificar el valor de este campo*</label>
						</div>
						<div class="col-6 form-group">
							<label>Código</label>
							<div class="form-group">
								<input id="codigo" name="codigo" type="number" min="1" class="form-control" required>
							</div>
							<label class="font-italic text-danger">*No podrá modificar el valor de este campo*</label>
						</div>
						<div class="col-6 form-group">
							<label>Fecha registrado</label>
							<div class="form-group">
								<input id="fecharegistro" name="fecharegistro" type="date" class="form-control" readonly>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Pos</label>
							<input id="pos" name="pos" type="number" class="form-control" required>
						</div>
						<div class="col-6 form-group">
							<label>Oc</label>
							<div class="form-group">
								<input id="oc" name="oc" type="number" class="form-control" min="1" required>
							</div>			
						</div>
						<div class="col-6 form-group">
							<label>Cantidad solicitada</label>
							<div class="form-group">
								<input id="cantidadsolicitada" name="cantidadsolicitada" type="number" class="form-control" required>
							</div>
						</div>						
						<div class="col-6 form-group">
							<label>Cantidad enviada</label>
							<div class="form-group">
								<input id="cantidadenviada" name="cantidadenviada" type="number" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Fecha de entrega</label>
							<div class="form-group">
								<input id="fechaentrega" name="fechaentrega" type="date" min="0" class="form-control" required>
							</div>
						</div>
						<div class="col-6 form-group">
							<label>Fecha confirmada de envío</label>
							<div class="form-group">
								<input id="fechaconfirmadaenvio" name="fechaconfirmadaenvio" type="date" min="0" class="form-control" required>
							</div>
						</div>
						<div class="form-group col-6">
							<label>Descripcion</label>
							<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
						</div>
						<div class="col-6 form-group">
							<label>Comentarios</label>
							<textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button onclick="saveData()" type="button" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</div>