<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Status de pedidos');
?>
<!-- Jumbotron para el título -->
<div class="jumbotron jumbotron-fluid" id="jumbo_estado">
  <div class="container">
    <h1 class="display-4">Status de pedidos</h1>
    <p class="lead">Chequea el status de tu producto aquí.</p>
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
                      <label class="custom-control-label" for="customCheck1">POS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                      <label class="custom-control-label" for="customCheck2">OC Bayer</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" checked="">
                      <label class="custom-control-label" for="customCheck3">Cantidad pedida</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" checked="">
                      <label class="custom-control-label" for="customCheck4">Descripción</label>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">               
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" checked="">
                      <label class="custom-control-label" for="customCheck7">Código Bayer</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" checked="">
                      <label class="custom-control-label" for="customCheck8">Cantidad enviada</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" checked="">
                      <label class="custom-control-label" for="customCheck9">Fecha de entrega</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" checked="">
                      <label class="custom-control-label" for="customCheck10">Fecha de envío</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" checked="">
                      <label class="custom-control-label" for="customCheck11">Comentarios</label>
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
    <table class="table table-striped table-bordered mydatatable" id="tabla">
        <thead id="cabecera_tabla">
            <tr>
                <th>POS</th>
                <th>OC Bayer</th>
                <th>Cantidad pedida</th>
                <th>Descripción</th>
                <th>Cod. Bayer</th>
                <th>Cant. enviada</th>
                <th>Entrega</th>
                <th>Envío</th>
                <th>Comentarios</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>10</td>
                <td>45987415258</td>
                <td>50,000</td>
                <td>Inserto Aspirina Advanced</td>
                <td>159874568</td>
                <td>50,000</td>
                <td>15/03/2021</td>
                <td>15/03/2021</td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>45987415258</td>
                <td>20,000</td>
                <td>Inserto Aspirina Advanced</td>
                <td>159874568</td>
                <td>20,600</td>
                <td>15/03/2021</td>
                <td>15/03/2021</td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>2587946135</td>
                <td>500,000</td>
                <td>REDOXON Naranja TAEF</td>
                <td>58976431</td>
                <td>414,000</td>
                <td>25/03/2021</td>
                <td>01/04/2021</td>
                <td></td>
            <tr>
                <td>20</td>
                <td>2587946135</td>
                <td>500,000</td>
                <td>REDOXON Naranja TAEF</td>
                <td>58976431</td>
                <td>300,000</td>
                <td>25/03/2021</td>
                <td>01/04/2021</td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>98456721</td>
                <td>500,000</td>
                <td>FOIL Neversa 130</td>
                <td>69857245</td>
                <td>160,002</td>
                <td>25/03/2021</td>
                <td>09/01/2021</td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>9512364785</td>
                <td>200,000</td>
                <td>REDOXON Doble ACC</td>
                <td>987546211</td>
                <td>175,000</td>
                <td>25/03/2021</td>
                <td>01/04/2021</td>
                <td>Complementos</td>
            </tr>
            <tr>
            <td>10</td>
                <td>9512364785</td>
                <td>200,000</td>
                <td>REDOXON Doble ACC</td>
                <td>987546211</td>
                <td>175,000</td>
                <td>25/03/2021</td>
                <td>01/04/2021</td>
                <td>Complementos</td>
            </tr>
            <tr>
                <td>20</td>
                <td>9876541235</td>
                <td>8,000</td>
                <td>Caja Aspirina 1.28 COL</td>
                <td>987546211</td>
                <td>9,000</td>
                <td></td>
                <td>03/02/2021</td>
                <td>Cliente confirmará de recibido</td>
            </tr>
            <tr>
                <td>20</td>
                <td>9876541235</td>
                <td>8,000</td>
                <td>Caja Aspirina 1.28 COL</td>
                <td>987546211</td>
                <td>9,000</td>
                <td></td>
                <td>03/02/2021</td>
                <td>Cliente confirmará de retraso</td>
            </tr>
        </tbody>

        <tfoot>
        <tr>
                <th>POS</th>
                <th>OC Bayer</th>
                <th>Cantidad pedida</th>
                <th>Descripción</th>
                <th>Cod. Bayer</th>
                <th>Cant. enviada</th>
                <th>Entrega</th>
                <th>Envío</th>
                <th>Comentarios</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php
Public_Page::footerTemplate('status');
?>