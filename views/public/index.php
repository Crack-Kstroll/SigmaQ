<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Public_Page::headerTemplate('SigmaQ');
?>

<center>
<h1>Public INDEX</h1>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-primary">Primary</button><br><br><br><br>
<button type="button" class="btn btn-outline-secondary">Secondary</button>
</center>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Public_Page::footerTemplate('index.js');
?>
