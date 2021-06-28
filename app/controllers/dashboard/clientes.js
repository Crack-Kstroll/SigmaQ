// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=';

// Método manejador de eventos que se ejecutara cuando cargue la pagina
document.addEventListener('DOMContentLoaded', function () {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_CLIENTES);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    // Atributo para guardar las filas retornadas en el dataset 
    let content = '';
    dataset.map(function (row) {
        // Definimos el icono a mostrar en la tabla segun el estado del registro
        (row.estado) ? icon = 'lock_open' : icon = 'lock'; 
        // Definimos la estructura de las filas con los campos del dataset 
        content += `
            <tr>
                <td>${row.codigocliente}</td>
                <td>${row.empresa}</td>
                <td>${row.telefono}</td>
                <td>${row.correo}</td>
                <td>${row.usuario}</td>
                <td>${row.intentos}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.codigocliente})" class="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.codigocliente})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
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
    searchRows(API_CLIENTES, 'search-form');
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
    data.append('id', id);
    // Hacemos una solicitud enviando como parametro la API y el nombre del case readOne para cargar los datos de un registro
    fetch(API_CLIENTES + 'readOne', {
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
                    document.getElementById('txtId').value = response.dataset.codigocliente;
                    document.getElementById('txtEmpresa').value = response.dataset.empresa;
                    document.getElementById('txtCorreo').value = response.dataset.correo;
                    document.getElementById('txtTelefono').value = response.dataset.telefono;
                    document.getElementById('txtUsuario').value = response.dataset.usuario;
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
function saveData(){
    // Se define atributo que almacenara la accion a realizar
    let action = '';
    // Se comprara el valor del input id 
    if (document.getElementById('txtIdx').value) {
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
    document.getElementById('txtIdx').style.display = 'none';
    // Atributo para almacenar el titulo del modal
    let titulo = '';
    // Compramos si el contenido el input esta vacio
    if(document.getElementById("txtIdx").value == ''){
        titulo = 'Registrar cliente'; // En caso que no exista valor se registra
    }
    else{
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
    confirmDelete(API_CLIENTES, data);
}