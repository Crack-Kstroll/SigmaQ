// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_ESTADO = '../../app/api/dashboard/estadoCuenta.php?action=';
const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=readAll';
const API_SOCIEDADES = '../../app/api/dashboard/sociedades.php?action=readAll';
const API_DIVISAS = '../../app/api/dashboard/divisas.php?action=readAll';

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
                    <th>Acciones</th>
                </tr>
            </thead>
        `


        dataset.map( row => {

            let toggleEnabledIcon = '';
            let iconToolTip = '';
            let metodo = '';

            if(row.estado) {
                //Cuando el registro esté habilitado
                iconToolTip = 'Deshabilitar'
                toggleEnabledIcon = 'block'
                metodo = 'openDeleteDialog';

            } else {
                iconToolTip = 'Habilitar'
                toggleEnabledIcon = 'check_circle_outline'
                metodo = 'openActivateDialog';
            }

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
                    
                    <td>
                        <a href="#" onclick="openUpdateDialog(${row.idestadocuenta})" class="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#" onclick="${metodo}(${row.idestadocuenta})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            `
            
        })
        //Se agrega el contenido a la tabla mediante su id
        document.getElementById('tbody-rows').innerHTML = content;
    }
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Evitamos que la pagina se refresque 
    event.preventDefault();
    // Se ejecuta la funcion search rows de components y se envia como parametro la api y el form que contiene el input buscar
    searchRows(API_ESTADO, 'search-form');
});


// Función para abrir el Form al momento de crear un registro
const openCreateDialog = () => {
    //Se restauran los elementos del form
    document.getElementById('save-form').reset();
    //Se abre el form
    $('#staticBackdrop').modal('show');
    //Asignamos el titulo al modal
    document.getElementById('modal-title').textContent = 'Ingresar registro'
    // Se llama a la function para llenar los Selects
    fillSelect(API_ADMINS, 'responsable', null);
    fillSelect(API_CLIENTES, 'cliente', null);
    fillSelect(API_SOCIEDADES, 'sociedad', null);
    fillSelect(API_DIVISAS, 'divisa', null);
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Reseteamos el valor de los campos del modal
    document.getElementById('save-form').reset();
    // Asignamos el valor del parametro id al campo del id del modal
    document.getElementById('idestado').value = id;
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
                    fillSelect(API_ADMINS, 'responsable', response.dataset[0].codigoadmin);
                    fillSelect(API_CLIENTES, 'cliente', response.dataset[0].codigocliente);
                    fillSelect(API_SOCIEDADES, 'sociedad', response.dataset[0].idsociedad);
                    fillSelect(API_DIVISAS, 'divisa', response.dataset[0].iddivisa);
                    // document.getElementById('responsable').value = response.dataset.responsable;
                    // document.getElementById('sociedad').value = response.dataset.sociedad;
                    // document.getElementById('usuario').value = response.dataset.usuario;
                    document.getElementById('codigo').value = response.dataset.codigo;
                    document.getElementById('factura').value = response.dataset.factura;
                    document.getElementById('asignacion').value = response.dataset.asignacion;
                    document.getElementById('fechacontable').value = response.dataset.fechacontable;
                    document.getElementById('clase').value = response.dataset.clase;
                    document.getElementById('vencimiento').value = response.dataset.vencimiento;
                    // document.getElementById('diasrestantes').value = response.dataset.diasrestantes;
                    // document.getElementById('divisa').value = response.dataset.divisa;
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
const saveData = () => {
    // Se define atributo que almacenara la accion a realizar
    let action = '';
    // Se comprara el valor del input id 
    if (document.getElementById('idestado').value) {
        action = 'update'; // En caso que exista se actualiza 
    } else {
        action = 'create'; // En caso que no se crea 
    }
    // Ejecutamos la funcion saveRow de components y enviamos como parametro la API la accion a realizar el form para obtener los datos y el modal
    saveRow(API_ESTADO, action, 'save-form', 'staticBackdrop');
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_ESTADO);
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
        titulo = 'Ingresar registro'; // En caso que no exista valor se registra
    }
    else {
        titulo = 'Actualizar registro';  // En caso que exista se actualiza 
    }
    // Colocamos el titulo al elemento con el id modal-title
    document.getElementById('modal-title').textContent = titulo;
}

