// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/usuarios.php?action=';

// Método manejador de eventos que se ejecutara cuando cargue la pagina
document.addEventListener('DOMContentLoaded', function () {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_USUARIOS);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    // Variable para almacenar registros de 5 en 5 del dataset 
    let data = '';
    // Variable para llevar un control de la cantidad de registros agregados
    let contador = 0; 
    // Variables para almacernar los nombres de los iconos del los botones y del estado del usuario en la tabla
    let iconToolTip = '';
    let iconMetod = '';
    dataset.map(function (row) {
        // Definimos el icono a mostrar en la tabla segun el estado del registro
        if (row.estado) {
            // Si el estado del usuario es activo se muestran los siguiente icono
            icon = 'lock_open'
            // Se asigna el nombre del metodo para deshabilitar el registro
            metodo = 'openDeleteDialog';
            // Tooltip para indicar la accion que realiza el boton
            iconToolTip = 'Deshabilitar';
            // Se asigna el siguiente icono al boton
            iconMetod = 'block';
        }
        else{
            // Si el estado del usuario es activo se muestran los siguiente icono
            icon = 'lock';
            // Se asigna el nombre del metodo para activar el registro
            metodo = 'openActivateDialog';
            // Tooltip para indicar la accion que realiza el boton
            iconToolTip = 'Habilitar'; 
            // Se asigna el siguiente icono al boton
            iconMetod= 'check_circle_outline'
        }
        // Definimos la estructura de las filas con los campos del dataset 
        data += `
            <tr>
                <td>${row.codigoadmin}</td>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.dui}</td>
                <td>${row.correo}</td>
                <td>${row.telefono}</td>
                <td>${row.usuario}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.codigoadmin})" class="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" onclick="${metodo}(${row.codigoadmin})" class="delete"><i class="material-icons" data-toggle="tooltip" title="${iconToolTip}">${iconMetod}</i></a>
                </td>
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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Evitamos que la pagina se refresque 
    event.preventDefault();
    // Se ejecuta la funcion search rows de components y se envia como parametro la api y el form que contiene el input buscar
    searchRows(API_USUARIOS, 'search-form');
});

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    //Mandamos a llamar la funcion para colocar el titulo al formulario
    modalTitle(id);
    // Asignamos el valor del parametro id al campo del id del modal
    document.getElementById('txtIdx').value = id;
    const data = new FormData();
    data.append('id', id);
    // Hacemos una solicitud enviando como parametro la API y el nombre del case readOne para cargar los datos de un registro
    fetch(API_USUARIOS + 'readOne', {
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
                    document.getElementById('txtId').value = response.dataset.codigoadmin;
                    document.getElementById('txtNombre').value = response.dataset.nombre;
                    document.getElementById('txtApellido').value = response.dataset.apellido;
                    document.getElementById('txtDui').value = response.dataset.dui;
                    document.getElementById('txtCorreo').value = response.dataset.correo;
                    document.getElementById('txtTelefono').value = response.dataset.telefono;
                    document.getElementById('txtDireccion').value = response.dataset.direccion;
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
    saveRow(API_USUARIOS, action, 'save-form', 'staticBackdrop');
}

// Funcion para ocultar el input del id del registro y para cambiar el titulo del modal depende de la accion a realizar.
function modalTitle(id) {
    // Reseteamos el valor de los campos del modal
    document.getElementById('save-form').reset();
    // Ocultamos el input que contiene el ID del registro
    document.getElementById('txtIdx').style.display = 'none';
    // Atributo para almacenar el titulo del modal
    let titulo = '';
    // Atributo para almacenar el input de clave
    let clave = '';
    // Atributo para almacenar el input confirmar clave
    let confirmar = '';
    // Compramos si el contenido el input esta vacio
    if(id == 0){
        titulo = 'Registrar usuario'; // En caso que no exista valor se registra
        clave = `<label  id="lblClave">Contraseña*</label>
        <input id="txtClave" name="txtClave" type="password" maxlength="35" aria-describedby="passwordHelpBlock" class="form-control" placeholder="clave123" data-bs-toggle="tooltip" data-bs-placement="top" title="Campo obligatorio" required>
        <div id="passwordHelpBlock" class="form-text">
            La contraseña del usuario debe tener una longitud minima de 6 caracteres y un maximo de 35
        </div>`;
        confirmar = `<label id="lblConfirmarClave">Confirmar clave*</label>
        <input id="txtClave2" name="txtClave2" type="password" maxlength="35" aria-describedby="passwordHelpBlock" class="form-control" placeholder="clave123" data-bs-toggle="tooltip" data-bs-placement="top" title="Campo obligatorio" required>
        <div id="passwordHelpBlock" class="form-text">
            La contraseña del usuario debe tener una longitud minima de 6 caracteres y un maximo de 35
        </div>`;     
    }
    else{
        titulo = 'Actualizar usuario';  // En caso que exista se actualiza 
        clave = `<label  id="lblClave">Contraseña</label>
        <input id="txtClave" name="txtClave" type="password" maxlength="35" aria-describedby="passwordHelpBlock" class="form-control" placeholder="" data-bs-toggle="tooltip" data-bs-placement="top" title="Campo opcional">
        <div id="passwordHelpBlock" class="form-text">
            La contraseña del usuario debe tener una longitud minima de 6 caracteres y un maximo de 35
        </div>`;
        confirmar = `<label id="lblConfirmarClave">Confirmar clave</label>
        <input id="txtClave2" name="txtClave2" type="password" maxlength="35" aria-describedby="passwordHelpBlock" class="form-control" placeholder="" data-bs-toggle="tooltip" data-bs-placement="top" title="Campo opcional">
        <div id="passwordHelpBlock" class="form-text">
            La contraseña del usuario debe tener una longitud minima de 6 caracteres y un maximo de 35
        </div>`;
    }
    // Colocamos el titulo al elemento con el id modal-title
    document.getElementById('boxClave').innerHTML = clave;
    document.getElementById('boxConfirmar').innerHTML = confirmar;
    document.getElementById('modal-title').textContent = titulo;    
}

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    const data = new FormData();
    // Asignamos el valor de la data que se enviara a la API
    data.append('id', id);
    // Ejecutamos la funcion confirm delete de components y enviamos como parametro la API y la data con id del registro a eliminar
    confirmDesactivate(API_USUARIOS, data);
}

// Función para establecer el registro a reactivar y abrir una caja de dialogo de confirmación.
function openActivateDialog(id) {
    const data = new FormData();
    // Asignamos el valor de la data que se enviara a la API
    data.append('id', id);
    // Ejecutamos la funcion confirm delete de components y enviamos como parametro la API y la data con id del registro a eliminar
    confirmActivate(API_USUARIOS, data);
}