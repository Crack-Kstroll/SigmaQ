<?php
include('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Estado de cuenta');
?>

<div class="jumbotron jumbotron-fluid" id="jumbo_estado">
  <div class="container">
    <h1 class="display-4">Estado de cuenta</h1>
    <p class="lead">Aquí puedes revisar tus estados de cuenta actualizados desde el mes de enero 2021.</p>
  </div>
</div>
<button type="button" class="btn btn-primary">Primary</button>
<?php
Public_Page::footerTemplate('index.js');
?>