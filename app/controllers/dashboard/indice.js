const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=readAll';
const API_INDICES = '../../app/api/dashboard/indiceEntrega.php?action=';

// Función manejadora de eventos, para ejecutar justo cuando termine de cardar.
document.addEventListener('DOMContentLoaded', () => {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_INDICES);
})

// Función para llenar la tabla con los datos de los registros. Se usa en la función readRows()
const fillTable = dataset => {
    $('#warning-message').empty();
    $('#tbody-rows').empty();
    let content = ''
    if(dataset == [].length) {
        //console.log(dataset)
        content+=`<h4>No hay índices registrados</h4>`
        document.getElementById('warning-message').innerHTML = content
    } else {
        //Se agregan los titulos de las columnas
        content += `
            <thead class="thead-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Organizacion</th>
                    <th>Indice</th>
                    <th>Compromisos</th>
                    <th>Cumplidos</th>
                    <th>No Cumplidos</th>
                    <th>No Considerados</th>
                    <th>% incum no entregados</th>
                    <th>% incum por fecha</th>
                    <th>% incum por calidad</th>
                    <th>% incum por cantidad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        `
        dataset.map( row => {
            content+= `
                <tr>
                    <td>${row.usuario}</th>
                    <td>${row.organizacion}</th>
                    <td>${row.indice}</th>
                    <td>${row.totalcompromiso}</th>
                    <td>${row.cumplidos}</th>
                    <td>${row.nocumplidos}</th>
                    <td>${row.noconsiderados}</th>
                    <td>${row.incumnoentregados}</th>
                    <td>${row.incumporfecha}</th>
                    <td>${row.incumporcalidad}</th>
                    <td>${row.incumporcantidad}</th>
                    <td>
                        <a href="#" onclick="openUpdateDialog(${row.idindice})" class="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#" onclick="openDeleteDialog(${row.idindice}, ${row.estado})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            `
        })
        //Se agrega el contenido a la tabla mediante su id
        document.getElementById('tbody-rows').innerHTML = content;
    }
}

const saveData = () => {
    // Se define atributo que almacenara la accion a realizar
    let action = '';
    // Se comprara el valor del input id 
    if (document.getElementById('idindice').value) {
        action = 'update'; // En caso que exista se actualiza 
    } else {
        action = 'create'; // En caso que no se crea 
    }
    // Ejecutamos la funcion saveRow de components y enviamos como parametro la API la accion a realizar el form para obtener los datos y el modal
    saveRow(API_INDICES, action, 'save-form', 'form-modal');
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_INDICES);
}

const openCreateDialog = () => {
    //Se restauran los elementos del form
    document.getElementById('save-form').reset();
    //Se abre el form
    $('#modal-form').modal('show');
    //Asignamos el titulo al modal
    document.getElementById('modal-title').textContent = 'Registrar Indice de Entrega'
    // Se llama a la function para llenar los Selects
    fillSelect(API_ADMINS, 'responsable', null);
    fillSelect(API_CLIENTES, 'cliente', null);
}

function openDeleteDialog(id,estado) {
    console.log(estado)
    const data = new FormData();
    // Asignamos el valor de la data que se enviara a la API
    data.append('id', id);
    // Ejecutamos la funcion confirm delete de components y enviamos como parametro la API y la data con id del registro a eliminar
    confirmDelete(API_INDICES, data);
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_INDICES);
}