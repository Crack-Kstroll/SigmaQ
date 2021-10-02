<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Estado de cuenta');
?>
<div class='my-4'></div>

<!-- Botón para el modal de personalización de la tabla -->
<div class='container-fluid'>
    <div class='row'>
        <div class='col'>
            <a onclick=openCustomDialog() type='button' class='btn btn-primary' id='conf_tabla_estado'>
                Configurar tabla
            </a>
        </div>
    </div>
</div>
<!-- Tabla -->
<!-- Seccion de tabla de registros -->
<div class='container-fluid espacioSuperior'>
    <div class='table-responsive'>
        <table class='table borde'>
            <!-- Cabecera de la tabla -->
            <thead class='thead-dark'>
                <tr>
                    <th>Responsable</th>
                    <th>Sociedad</th>
                    <th>Usuario</th>
                    <th>Código</th>
                    <th>Factura</th>
                    <th>Asignación</th>
                    <th>Fecha Contable</th>
                    <th>Clase</th>
                    <th>Fecha vencimiento</th>
                    <th>Días restantes</th>
                    <th>Divisa</th>
                    <th>Total General</th>
                </tr>
            </thead>
            <!-- Contenido de la tabla -->
            <tbody id='tbody-rows'>
            </tbody>
        </table>
    </div>
    <div id='seccionPaginacion' class='clearfix'>
        <!-- Seccion controladores tabla -->
    </div> <!-- Cierra controladores de tabla -->
    <!-- Cierra seccion de tabla -->
</div>
<?php
Public_Page::footerTemplate('estadoCuenta');
?>