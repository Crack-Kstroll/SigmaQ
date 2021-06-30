// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_ESTADO = '../../app/api/dashboard/estadoCuenta.php?action=';

// Método manejador de eventos que se ejecutara cuando cargue la pagina
document.addEventListener('DOMContentLoaded', function () {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_ESTADO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    // Atributo para guardar las filas retornadas en el dataset 
    let content = '';
    let metodo = '';

    //Se agregan los titulos de las columnas
    content += `
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
    `
    dataset.map(function (row) {
        // Definimos la estructura de las filas con los campos del dataset 
        content += `
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
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.idestadocuenta})" class="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" onclick="${metodo}(${row.idestadocuenta})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
        `;
    });

    content += `
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
`
    // Imprimimos las filas en la seccion de contenido de la tabla
    document.getElementById('tbody-rows').innerHTML = content;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Evitamos que la pagina se refresque 
    event.preventDefault();
    // Se ejecuta la funcion search rows de components y se envia como parametro la api y el form que contiene el input buscar
    searchRows(API_ESTADO, 'search-form');
});

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Reseteamos el valor de los campos del modal
    document.getElementById('save-form').reset();
    // Asignamos el valor del parametro id al campo del id del modal
    document.getElementById('txtIdx').value = id;
    //Mandamos a llamar la funcion para colocar el titulo al formulario
    modalTitle();
    const data = new FormData();
    data.append('idestado', id);
    // Hacemos una solicitud enviando como parametro la API y el nombre del case readOne para cargar los datos de un registro
    fetch(API_ESTADO + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Luego se compara si la respuesta de la API fue satisfactoria o no
        if (request.ok) {
            // En caso que la respuesta de la API sea satisfactoria se ejecuta el siguiente codigo
            request.json().then(function (response) {
                // En caso de encontrarse registros se imprimen los resultados en los inputs del modal
                if (response.status) {
                    // Colocamos el nombre de los inpus y los igualamos al valor de los campos del dataset 
                    document.getElementById('idestado').value = response.dataset.idestadocuenta;
                    document.getElementById('responsable').value = response.dataset.responsable;
                    document.getElementById('sociedad').value = response.dataset.sociedad;
                    document.getElementById('usuario').value = response.dataset.usuario;
                    document.getElementById('codigo').value = response.dataset.codigo;
                    document.getElementById('factura').value = response.dataset.factura;
                    document.getElementById('asignacion').value = response.dataset.asignacion;
                    document.getElementById('fechacontable').value = response.dataset.fechacontable;
                    document.getElementById('clase').value = response.dataset.clase;
                    document.getElementById('vencimiento').value = response.dataset.vencimiento;
                    document.getElementById('diasrestantes').value = response.dataset.diasrestantes;
                    document.getElementById('divisa').value = response.dataset.divisa;
                    document.getElementById('totalgeneral').value = response.dataset.totalgeneral;
                } else {
                    // En caso de fallar se muestra el mensaje de error 
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // En ocurrir un error se muestra en la consola 
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para definir si el metodo a ejecutar es guardar o actualizar.
function saveData() {
    // Se define atributo que almacenara la accion a realizar
    let action = '';
    // Se comprara el valor del input id 
    if (document.getElementById('idestado').value) {
        action = 'update'; // En caso que exista se actualiza 
    } else {
        action = 'create'; // En caso que no se crea 
    }
    // Ejecutamos la funcion saveRow de components y enviamos como parametro la API la accion a realizar el form para obtener los datos y el modal
    saveRow(API_CLIENTES, action, 'save-form', 'staticBackdrop');
}

// Funcion para ocultar el input del id del registro y para cambiar el titulo del modal depende de la accion a realizar.
function modalTitle() {
    // Reseteamos el valor de los campos del modal
    document.getElementById('save-form').reset();
    // Ocultamos el input que contiene el ID del registro
    document.getElementById('idestado').style.display = 'none';
    // Atributo para almacenar el titulo del modal
    let titulo = '';
    // Compramos si el contenido el input esta vacio
    if (document.getElementById("idestado").value == '') {
        titulo = 'Registrar cliente'; // En caso que no exista valor se registra
    }
    else {
        titulo = 'Actualizar cliente';  // En caso que exista se actualiza 
    }
    // Colocamos el titulo al elemento con el id modal-title
    document.getElementById('modal-title').textContent = titulo;
}

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    const data = new FormData();
    // Asignamos el valor de la data que se enviara a la API
    data.append('id', id);
    // Ejecutamos la funcion confirm delete de components y enviamos como parametro la API y la data con id del registro a eliminar
    confirmDesactivate(API_ESTADO, data);
}

// Función para establecer el registro a reactivar y abrir una caja de dialogo de confirmación.
function openActivateDialog(id) {
    const data = new FormData();
    // Asignamos el valor de la data que se enviara a la API
    data.append('id', id);
    // Ejecutamos la funcion confirm delete de components y enviamos como parametro la API y la data con id del registro a eliminar
    confirmActivate(API_ESTADO, data);
}