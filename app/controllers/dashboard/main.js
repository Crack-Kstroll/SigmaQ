// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_HISTORIAL = '../../app/api/dashboard/historial.php?action=';

// Método manejador de eventos que se ejecutara cuando cargue la pagina
document.addEventListener('DOMContentLoaded', function () {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_HISTORIAL);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    // Atributo para guardar las filas retornadas en el dataset 
    let content = '';
    dataset.map(function (row) {
        // Definimos la estructura de las filas con los campos del dataset 
        content += `
        <tr>
            <th scope="row">${row.idregistro}</th>
            <td>${row.usuario}</td>	
            <td>${row.hora}</td>
            <td>${row.accion}</td>
            <td>${row.empresa}</td>
        </tr>
        `;          
    });
    // Imprimimos las filas en la seccion de contenido de la tabla
    document.getElementById('tbody-rows').innerHTML = content;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Evitamos que la pagina se refresque 
    event.preventDefault();
    // Se ejecuta la funcion search rows de components y se envia como parametro la api y el form que contiene el input buscar
    searchRows(API_HISTORIAL, 'search-form');
});

