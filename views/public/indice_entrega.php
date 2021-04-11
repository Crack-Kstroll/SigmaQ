<?php
include('../../app/helpers/public_page.php');
Public_Page::headerTemplate('SigmaQ - Índice de entrega');
?>
<!-- Jumbotron para el título -->
<div class="jumbotron jumbotron-fluid" id="jumbo_estado">
  <div class="container">
    <h1 class="display-4">Índice de entrega</h1>
    <p class="lead">Revisa las fechas de índice de entrega por cada uno de tus productos en esta sección.</p>
  </div>
</div>
<!-- Botón con el modal -->
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="conf_tabla_estado">
        Configurar tabla
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <label class="custom-control-label" for="customCheck1">Organización</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                      <label class="custom-control-label" for="customCheck2">Índice</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" checked="">
                      <label class="custom-control-label" for="customCheck3">Compromisos</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" checked="">
                      <label class="custom-control-label" for="customCheck4">Cumplidos</label>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">               
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" checked="">
                      <label class="custom-control-label" for="customCheck7">No cumplidos</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" checked="">
                      <label class="custom-control-label" for="customCheck8">No considerados</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" checked="">
                      <label class="custom-control-label" for="customCheck9">% Incum. no entregados</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" checked="">
                      <label class="custom-control-label" for="customCheck10">% Incum. por fecha</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" checked="">
                      <label class="custom-control-label" for="customCheck11">% Incum. por calidad</label>
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
      </div>
    </div>
  </div>
</div>
<!-- Tabla -->
<div class="container-fluid">
    <table class="table table-striped table-bordered " id="tabla"> <!-- mydatatable -->
        <thead id="cabecera_tabla">
            <tr>
                <th>Organización</th>
                <th>Índice</th>
                <th>Compromisos</th>
                <th>Cumplidos</th>
                <th>No cumplidos</th>
                <th>No considerados</th>
                <th>% Incum. no entregados</th>
                <th>% Incum. por fecha</th>
                <th>% Incum. por cantidad</th>
                <th>% Incum. por calidad</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Zadik</td>
                <td>0</td>
                <td>6</td>
                <td>0</td>
                <td>6</td>
                <td>0</td>
                <td>16.67</td>
                <td>0</td>
                <td>50</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total Sel</td>
                <td>0</td>
                <td>6</td>
                <td>0</td>
                <td>6</td>
                <td>0</td>
                <td>16.67</td>
                <td>0</td>
                <td>50</td>
                <td>0</td>
            </tr>
    </table>
</div>
<!-- Total pedidos e imagen -->
<div class="container-fluid" id="container_total">
    <div class="row">
        <div class="col">
            <h3>Total de pedidos: 6</h3>
        </div>
    </div>
    <div class="row">
        <img id="imagen_indice" src="../../resources/static/svgs/undraw_setup_analytics_8qkl.svg" alt="">
    </div>
</div>

<?php
Public_Page::footerTemplate();
?>