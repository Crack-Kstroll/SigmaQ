<?php
include('../../app/helpers/public_page.php');
Public_Page::headerTemplate('SigmaQ - Estado de cuenta');
?>
<!-- Jumbotron para el título -->
<div class="jumbotron jumbotron-fluid" id="jumbo_estado">
  <div class="container">
    <h1 class="display-4">Estado de cuenta</h1>
    <p class="lead">Aquí puedes revisar tus estados de cuenta actualizados desde el mes de enero 2021.</p>
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
      </div>
    </div>
  </div>
</div>
<!-- Tabla -->
<div class="container-fluid">
    <table class="table table-striped table-bordered mydatatable" id="tabla">
        <thead id="cabecera_tabla">
            <tr>
                <th>Sociedad</th>
                <th>PO</th>
                <th>POS</th>
                <th>Factura</th>
                <th>Asignación</th>
                <th>Fecha</th>
                <th>Clase</th>
                <th>Crédito</th>
                <th>Vence</th>
                <th>Días vencidos</th>
                <th>Moneda</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Zadik</td>
                <td>45987415258</td>
                <td>10</td>
                <td>1254789654</td>
                <td>159874568</td>
                <td>03/01/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>04/03/2021</td>
                <td>-11</td>
                <td>GTQ</td>
                <td>10,200.00</td>
            </tr>
            <tr>
                <td>Zadik</td>
                <td>45879461258</td>
                <td>20</td>
                <td>547896578</td>
                <td>123545968</td>
                <td>03/02/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>04/04/2021</td>
                <td>-33</td>
                <td>GTQ</td>
                <td>48,225.56</td>
            </tr>
            <tr>
                <td>Zadik</td>
                <td>4587965231</td>
                <td>10</td>
                <td>9874563215</td>
                <td>98756874</td>
                <td>25/01/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>26/04/2021</td>
                <td>-33</td>
                <td>GTQ</td>
                <td>21,589.55</td>
            <tr>
                <td>Zadik</td>
                <td>45987415258</td>
                <td>10</td>
                <td>1254789654</td>
                <td>159874568</td>
                <td>03/01/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>04/03/2021</td>
                <td>-11</td>
                <td>GTQ</td>
                <td>10,200.00</td>
            </tr>
            <tr>
                <td>Rotoflex</td>
                <td>845987545</td>
                <td>10</td>
                <td>6548795412</td>
                <td>987546952</td>
                <td>25/02/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>26/04/2021</td>
                <td>-11</td>
                <td>USD</td>
                <td>10,000.22</td>
            </tr>
            <tr>
                <td>Rotoflex</td>
                <td>578954265</td>
                <td>20</td>
                <td>951756324</td>
                <td>15975346</td>
                <td>25/02/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>26/04/2021</td>
                <td>-11</td>
                <td>USD</td>
                <td>8,300.56</td>
            </tr>
            <tr>
                <td>Rotoflex</td>
                <td>978451623</td>
                <td>20</td>
                <td>951756324</td>
                <td>15975346</td>
                <td>25/02/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>26/04/2021</td>
                <td>-11</td>
                <td>USD</td>
                <td>3,58.22</td>
            </tr>
            <tr>
                <td>Rotoflex</td>
                <td>7946138256</td>
                <td>20</td>
                <td>951784694</td>
                <td>15975346</td>
                <td>25/02/2021</td>
                <td>ZF</td>
                <td>60</td>
                <td>26/04/2021</td>
                <td>-11</td>
                <td>USD</td>
                <td>7,500.33</td>
            </tr>
        </tbody>

        <tfoot>
        <tr>
                <th>Sociedad</th>
                <th>PO</th>
                <th>POS</th>
                <th>Factura</th>
                <th>Asignación</th>
                <th>Fecha</th>
                <th>Clase</th>
                <th>Crédito</th>
                <th>Vence</th>
                <th>Días vencidos</th>
                <th>Moneda</th>
                <th>Total</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php
Public_Page::footerTemplate();
?>