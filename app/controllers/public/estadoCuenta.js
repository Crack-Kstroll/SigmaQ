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
    // fillTable();
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    // Variable para almacenar registros de 5 en 5 del dataset 
    let data = '';
    // Variable para llevar un control de la cantidad de registros agregados
    let contador = 0; 
    dataset.map(function (row) {
        // Definimos la estructura de las filas con los campos del dataset 
        data+= `
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
        `;           
        // Agregamos uno al contador por la fila agregada anteriormente al data
        contador = contador + 1;
        //Verificamos si el contador es igual a 5 eso significa que la data contiene 5 filas
        if (contador == 9) {
            // Reseteamos el contador a 0
            contador = 0;
            // Agregamos el contenido de data al arreglo que contiene los datos content[]
            content.push(data); 
            // Vaciamos el contenido de data para volverlo a llenar
            data = '';
            // Agregamos una posicion dentro del arreglo debido a que se agrego un nuevo elemento
            posiciones = posiciones + 1;
        }      
    });
    // Verificamos si el ultimo retorno de datos no esta vacio en caso de estarlo no se agrega a la paginacion
    if (data != '') {
        // Agregamos el contenido el contenido al arreglo en caso de no estar vacio
        content.push(data); 
    } 
    else{
        // Se resta una posicion ya que no se agrego el contenido final por estar vacio
        posiciones = posiciones -1;
    }
    // Se llama la funcion fillPagination que carga los datos del arreglo en la tabla 
    fillPagination(content[0]);
    // Se llama la funcion para generar la paginacion segun el numero de registros obtenidos
    generatePagination();
}
