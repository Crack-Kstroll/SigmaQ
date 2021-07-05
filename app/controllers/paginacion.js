// Atributo para almacenar en un arreglo el contenido de la tabla 
var content = [];
// Atributo para almacenar el numero de posiciones que posee el arreglo
var posiciones = 0;
// Atributo para guardar el numero de pagina seleccionado en la paginacion
var seleccion = 0;

// Funcion para generar la estructura de la paginacion en el formulario
function generatePagination() {
    let pagination = '';
    // Definimos la estructura de la cabecera de la paginacion
    pagination += `
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" onclick="previousData()">Anterior</a></li>
        `; 
    // Creamos un ciclo para agregar los botones segun el numero de posiciones del arreglo de datos
    for (let index = 0; index <= posiciones; index++) {
        let controller= `
            <li class="page-item"><a class="page-link" onclick="fillPagination(content[${index}],${index+1})">${index+1}</a></li>
        `;
        // Vamos agregando el contenido al atributo en secuencia 
        pagination = pagination + controller;
    }
    // Definimos un atributo para guardar el pie de la paginacion
    let pie = '';
    // Definimos la estructura del pie 
    pie += `
                <li class="page-item"><a class="page-link" onclick="nextData()">Siguiente</a></li>
            </ul>
        </nav>
        `;  
    // Agregamos el pie al contenido previamente agregado al atributo paginacion
    pagination = pagination + pie;
    // Imprimimos el contenido del atributo paginacion en la seccion especificada
    document.getElementById('seccionPaginacion').innerHTML = pagination;
}

// Funcion para retroceder de pagina en pagina (paginacion)
function previousData() {
    // Como retrocedemos una pagina restamos uno a la atributo que contiene la pagina seleccionada
    seleccion = seleccion -1;
    // Se verifica si la pagina seleccionada no es menor a 0
    if (seleccion >= 0) {
        // Se imprime el contenido del arreglo en la tabla segun la pagina seleccionada
        document.getElementById('tbody-rows').innerHTML = content[seleccion];
    } else {
        // Se muestra un mensaje de alerta con el error
        sweetAlert(3, 'No puedes retroceder mas', null);
    }
}

// Funcion para avanzar de pagina en pagina (paginacion)
function nextData() {
    // Como avanzamos una pagina agregamos uno al atributo que contiene la pagina seleccionada
    seleccion = seleccion + 1;
    // Verificamos si la pagina seleccionada no es mayor a la ultima posicion del arreglo
    if (seleccion <= posiciones) {
        // Se imprime el contenido del arreglo en la tabla segun la pagina seleccionada
        document.getElementById('tbody-rows').innerHTML = content[seleccion];
    } else {
        // Se muestra un mensaje de alerta con el error
        sweetAlert(3, 'No puedes avanzar mas', null);
    }
}

// Funcion para cargar los datos dentro de la tabla 
function fillPagination(contenido,select) {
    // Imprimimos las filas en la seccion de contenido de la tabla
    document.getElementById('tbody-rows').innerHTML = contenido;
    // Asignamos el valor al atributo seleccion para identificar que pagina se cargo
    seleccion = select;
}

// Funcion para resetar el valor de todos los atributos de la clase
function resetPagination(){
    content = [];
    posiciones = 0;
    seleccion = 0;
}