const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=readAll';
const API_PEDIDOS = '../../app/api/public/pedidos.php?action=';

// Función manejadora de eventos, para ejecutar justo cuando termine de cardar.
document.addEventListener('DOMContentLoaded', () => {
    // Se manda a llamar la funcion para llenar la tabla con la API de parametro
    readRows(API_PEDIDOS);
})

//Función para llenar la tabla con los registros
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
                    <th>Pos</th>
                    <th>OC</th>
                    <th>Solicitada</th>
                    <th>Codigo</th>
                    <th>Enviada</th>
                    <th>Fecha registrado</th>
                    <th>Fecha de entrega</th>
                    <th>Fecha de confirmación</th>
                    ${' '/*<th>Opciones</th>*/}
                </tr>
            </thead>
        `


        dataset.map( row => {
            content+= `
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
                    ${' '/*<td>
                        <a href="#" onclick="openView(${row.idpedido})" class="edit"><i class="material-icons" data-toggle="tooltip" title="Ver Más">visibility</i></a>
                    </td>*/}
                </tr>
            `
        })
        //Se agrega el contenido a la tabla mediante su id
        document.getElementById('tbody-rows').innerHTML = content;
    }
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
    // Hacemos una solicitud enviando como parametro la API y el nombre del case readOne para cargar los datos de un registro
    // fetch(API_PEDIDOS + 'readOne', {
    //     method: 'post',
    //     body: data 
    // }).then( request => { 
    //     // Luego se compara si la respuesta de la API fue satisfactoria o no
    //     if (request.ok) { 
    //         // console.log(request.text())
    //        return request.json()
    //     } else {
    //         console.log(request.status + ' ' + request.statusText);
    //     }
    // // En ocurrir un error se muestra en la consola 
    // }).then( response => {
    //     // En caso de encontrarse registros se imprimen los resultados en los inputs del modal
    //     if (response.status) {
    //         // Colocamos el nombre de los inpus y los igualamos al valor de los campos del dataset 
    //         document.getElementById('idpedido').value = response.dataset[0].idpedido;
    //         fillSelect(API_ADMINS, 'responsable', response.dataset[0].codigoadmin);
    //         fillSelect(API_CLIENTES, 'cliente', response.dataset[0].codigocliente);
    //         document.getElementById('oc').value = response.dataset[0].oc
    //         document.getElementById('pos').value = response.dataset[0].pos;
    //         document.getElementById('codigo').value = response.dataset[0].codigo;
    //         document.getElementById('cantidadsolicitada').value = response.dataset[0].cantidadsolicitada;
    //         document.getElementById('descripcion').value = response.dataset[0].descripcion;
    //         document.getElementById('cantidadenviada').value = response.dataset[0].cantidadenviada;
    //         document.getElementById('fechaentrega').value = response.dataset[0].fechaentregada;
    //         document.getElementById('fechaconfirmadaenvio').value = response.dataset[0].fechaconfirmadaenvio;
    //         document.getElementById('comentarios').value = response.dataset[0].comentarios;
    //         document.getElementById('fecharegistro').value = response.dataset[0].fecharegistro;
    //         } else { 
    //         // En caso de fallar se muestra el mensaje de error 
    //         sweetAlert(2, response.exception, null);
    //     }
    // }
    // ).catch(function (error) {
    //     console.log(error);
    // });
}