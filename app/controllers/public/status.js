const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=readAll';
const API_PEDIDOS = '../../app/api/public/pedidos.php?action=';

// Función manejadora de eventos, para ejecutar justo cuando termine de cardar.
document.addEventListener('DOMContentLoaded', () => {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_PEDIDOS);
})

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
                <td>${row.usuario}</th>
                <td>${row.pos}</th>
                <td>${row.oc}</th>
                <td>${row.cantidadsolicitada}</th>
                <td>${row.codigo}</th>
                <td>${row.cantidadenviada}</th>
                <td>${row.fecharegistro}</th>
                <td>${row.fechaentregada}</th>
                <td>${row.fechaconfirmadaenvio}</th>
            </tr>
        `;           
        // Agregamos uno al contador por la fila agregada anteriormente al data
        contador = contador + 1;
        //Verificamos si el contador es igual a 5 eso significa que la data contiene 5 filas
        if (contador == 3) {
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

// Función para preparar el formulario al momento de modificar un registro.
function openView(id) {
    // Reseteamos el valor de los campos del modal
    document.getElementById('save-form').reset();
    //Se abre el form
    $('#modal-form').modal('show');
    //Asignamos el titulo al modal
    document.getElementById('modal-title').textContent = 'Ver más'
    // Asignamos el valor del parametro id al campo del id del modal
    document.getElementById('idpedido').value = id;
    //Se establece ReadOnly el campo del codigo
    document.getElementById("codigo").readOnly = true;
    //Se establece ReadOnly el campo del cliente
    document.getElementById("cliente").setAttribute('disabled',false)
    const data = new FormData();
    data.append('id', id);
}