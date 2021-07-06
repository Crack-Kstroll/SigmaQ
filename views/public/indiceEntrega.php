<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Índice de entrega');
?>
<!-- Jumbotron para el título
<div class="jumbotron jumbotron-fluid" id="jumbo_estado">
  <div class="container">
    <h1 class="display-4">Índice de entrega</h1>
    <p class="lead">Revisa las fechas de índice de entrega por cada uno de tus productos en esta sección.</p>
  </div>
</div> -->

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

</div>

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
Public_Page::footerTemplate('indice');
?>