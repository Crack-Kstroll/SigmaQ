// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_ESTADO = '../../app/api/public/estadoCuenta.php?action=';
// const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';
// const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=readAll';
// const API_SOCIEDADES = '../../app/api/dashboard/sociedades.php?action=readAll';
// const API_DIVISAS = '../../app/api/dashboard/divisas.php?action=readAll';

// Método manejador de eventos que se ejecutara cuando cargue la pagina
document.addEventListener('DOMContentLoaded', function () {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_ESTADO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
const fillTable = dataset => {
    $('#warning-message').empty();
    $('#tbody-rows').empty();
    let content = ''
    if(dataset == [].length) {
        //console.log(dataset)
        content+=`<h4>No hay registros ingresados</h4>`
        document.getElementById('warning-message').innerHTML = content
    } else {
        //Se agregan los titulos de las columnas
        content += `
            <thead class="thead-dark">
                <tr>
                    <th>Responsable</th>
                    <th>Sociedad</th>
                    <th>Usuario</th>
                    <th>Codigo</th>
                    <th>Factura</th>
                    <th>Asignación</th>
                    <th>Fecha Contable</th>
                    <th>Clase</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Días Restantes</th>
                    <th>Divisa</th>
                    <th>Total General</th>
                </tr>
            </thead>
        `


        dataset.map( row => {

            content+= `
                <tr>
                    <td>${row.responsable}</td>
                    <td>${row.sociedad}</td>
                    <td>${row.usuario}</td>
                    <td>${row.codigo}</td>
                    <td>${row.factura}</td>
                    <td>${row.asignacion}</td>
                    <td>${row.fechacontable}</td>
                    <td>${row.clase}</td>
                    <td>${row.vencimiento}</td>
                    <td>${row.diasrestantes}</td>
                    <td>${row.divisa}</td>
                    <td>${row.totalgeneral}</td>
                </tr>
            `
            
        })
        //Se agrega el contenido a la tabla mediante su id
        document.getElementById('tbody-rows').innerHTML = content;
    }
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_HISTORIAL, 'search-form');
});