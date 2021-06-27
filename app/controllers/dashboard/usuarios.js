// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/usuarios.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    readRows(API_USUARIOS);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        (row.estado) ? icon = 'lock_open' : icon = 'lock';
        content += `
            <tr>
                <td>${row.codigoadmin}</td>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.dui}</td>
                <td>${row.correo}</td>
                <td>${row.telefono}</td>
                <td>${row.usuario}</td>
                <td>${row.intentos}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.codigoadmin})" class="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.codigoadmin})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
        `;          
    });
    document.getElementById('tbody-rows').innerHTML = content;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    event.preventDefault();
    searchRows(API_USUARIOS, 'search-form');
});

// Funcion para ocultar el input del id del registro y para cambiar el titulo del modal depende de la accion a realizar.
function modalTitle() {
    document.getElementById('txtIdx').style.display = 'none';
    let titulo = '';
    if(document.getElementById("txtIdx").value == ''){
        titulo = 'Registrar usuario';    
    }
    else{
        titulo = 'Actualizar usuario';    
    }
    document.getElementById('modal-title').textContent = titulo;    
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    document.getElementById('txtIdx').value = id;
    modalTitle();
    const data = new FormData();
    data.append('id', id);

    fetch(API_USUARIOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('txtId').value = response.dataset.codigoadmin;
                    document.getElementById('txtNombre').value = response.dataset.nombre;
                    document.getElementById('txtApellido').value = response.dataset.apellido;
                    document.getElementById('txtDui').value = response.dataset.dui;
                    document.getElementById('txtCorreo').value = response.dataset.correo;
                    document.getElementById('txtTelefono').value = response.dataset.telefono;
                    document.getElementById('txtDireccion').value = response.dataset.direccion;
                    document.getElementById('txtUsuario').value = response.dataset.usuario;
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

function saveData(){
    let action = '';
    if (document.getElementById('txtIdx').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_USUARIOS, action, 'save-form', 'save-modal');
}

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    const data = new FormData();
    data.append('id', id);
    confirmDelete(API_USUARIOS, data);
}