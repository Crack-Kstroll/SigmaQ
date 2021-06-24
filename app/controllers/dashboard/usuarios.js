// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/usuarios.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    readRows(API_USUARIOS);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.estado}</td>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.dui}</td>
                <td>${row.correo}</td>
                <td>${row.telefono}</td>
                <td>${row.usuario}</td>
                <td>${row.intentos}</td>
                <td>
                    <a href="#" onclick="openDeleteDialog(${row.codigoadmin})" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" onclick="openUpdateDialog(${row.codigoadmin})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
        `;          
    });
    document.getElementById('tbody-rows').innerHTML = content;
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
/*document.getElementById('search-form').addEventListener('submit', function (event) {
    event.preventDefault();
    searchRows(API_PRODUCTOS, 'search-form');
});*/

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar cliente';    
    fillSelect(ENDPOINT_CATEGORIAS, 'cmbEstado', null);
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar cliente';
    const data = new FormData();
    data.append('id', id);

    fetch(API_PRODUCTOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('txtId').value = response.dataset.id;
                    document.getElementById('txtNombre').value = response.dataset.nombre;
                    document.getElementById('txtApellido').value = response.dataset.apellido;
                    fillSelect(ENDPOINT_CATEGORIAS, 'cmbEstado', response.dataset.estado);
                    M.updateTextFields();
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
/*document.getElementById('save-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    if (document.getElementById('txtId').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_PRODUCTOS, action, 'save-form', 'save-modal');
});*/

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    const data = new FormData();
    data.append('id', id);
    confirmDelete(API_PRODUCTOS, data);
}