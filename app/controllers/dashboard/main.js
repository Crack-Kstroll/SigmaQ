// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_HISTORIAL = '../../app/api/dashboard/historial.php?action=';

// Método manejador de eventos que se ejecutara cuando cargue la pagina
document.addEventListener('DOMContentLoaded', function () {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_HISTORIAL);
});

var content = [];
var posiciones = 0;
var seleccion = 0;

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let data = '';
    let contador = 0; 
    dataset.map(function (row) {
        // Definimos la estructura de las filas con los campos del dataset 
        data += `
        <tr>
            <th scope="row">${row.idregistro}</th>
            <td>${row.usuario}</td>	
            <td>${row.hora}</td>
            <td>${row.accion}</td>
            <td>${row.empresa}</td>
        </tr>
        `;  
        contador = contador + 1;
        if (contador == 5) {
            contador = 0;
            content.push(data); 
            data = '';
            posiciones = posiciones + 1;
        }      
    });
    content.push(data); 
    fillPagination(content[0]);
    generatePagination();
}

function generatePagination() {
    let pagination = '';
    pagination += `
        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item"><a class="page-link" onclick="previousData()">Previous</a></li>
        `; 
    for (let index = 0; index <= posiciones; index++) {
        let controller= `
            <li class="page-item"><a class="page-link" onclick="fillPagination(content[${index}],${index+1})">${index+1}</a></li>
        `;;
        pagination = pagination + controller;
    }
    let pie = '';
    pie += `
                <li class="page-item"><a class="page-link" onclick="nextData()">Next</a></li>
            </ul>
        </nav>
        `;  
    pagination = pagination + pie;
    document.getElementById('seccionPaginacion').innerHTML = pagination;
}

function previousData() {
    seleccion = seleccion -1;
    let position = seleccion;
    if (position >= 0) {
        document.getElementById('tbody-rows').innerHTML = content[position];
    } else {
        sweetAlert(3, 'No puedes retroceder mas', null);
    }
}

function nextData() {
    seleccion = seleccion + 1;
    let position = seleccion;
    if (position <= posiciones) {
        document.getElementById('tbody-rows').innerHTML = content[position];
    } else {
        sweetAlert(3, 'No puedes avanzar mas', null);
    }
}

function fillPagination(contenido,select) {
    // Imprimimos las filas en la seccion de contenido de la tabla
    document.getElementById('tbody-rows').innerHTML = contenido;
    seleccion = select;
}
