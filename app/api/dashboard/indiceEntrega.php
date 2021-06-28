<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/indiceEntrega.php');

// Se compueba si existe una acción a realizar
if (isset($_GET['action'])) {
    //Se crea o se reanuda la sesión actual
    session_start();
    //Se instancia un objeto de la clase modelo
    $indice = new Indice;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como usuario para realizar las acciones correspondientes.
    if (isset($_SESSION['codigoadmin'])) { 
        // Se evalua la acción a realizar
        switch($_GET['action']) {
            //Caso para mostrar los administradores

        }
    } else {
        $result['exception'] = 'Acción no disponible fuera de la sesión';
    }
}
?>