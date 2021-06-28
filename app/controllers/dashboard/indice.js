const API_ADMINS = '../../app/api/dashboard/usuarios.php?action=readAll';

// Función manejadora de eventos, para ejecutar justo cuando termine de cardar.
document.addEventListener('DOMContentLoaded', () => {
    
})

const openCreateDialog = () => {
    //Se restauran los elementos del form
    document.getElementById('save-form').reset();
    //Se abre el form
    $('#modal-form').modal('show');
    //Asignamos el titulo al modal
    document.getElementById('modal-title').textContent = 'Registrar Indice de Entrega'
    // Se llama a la function para llevar el Select
    fillSelect(API_ADMINS, 'responsable', null);
}