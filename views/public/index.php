<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Public_Page::headerTemplate('Bienvenido');
?>

<center><h1>PRUEBA PARA REPOSITORIO ACTUALIZACION DE CAMBIOS</h1></center><br><br>

<!--Componente slider con una altura de 400 píxeles e imágenes de 1600x400 píxeles-->
<div class="slider">
    <ul class="slides"> 
        <li>
            <img src="../../resources/img/slider/image01.png">
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/image02.png">
            <div class="caption left-align">
                <h3>Left Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/image03.png">
            <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/image04.png">
            <div class="caption center-align">
                <h3>This is our big Tagline! a</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
    </ul>
</div>

<!--Disparador del modal-->
<p class="center">
    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
</p>

<!--Estructura del modal-->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Public_Page::footerTemplate('index.js');
?>