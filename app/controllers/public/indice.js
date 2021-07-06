const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=readAll';
const API_INDICES = '../../app/api/public/indice.php?action=';

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
                </tr>
            </thead>
        `

        dataset.map( row => {
            content+= `
                <tr>
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
                </tr>
            `
        })
        //Se agrega el contenido a la tabla mediante su id
        document.getElementById('tbody-rows').innerHTML = content;

        console.log(content)
    }
}