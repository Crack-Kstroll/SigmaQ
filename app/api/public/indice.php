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
    if (isset($_SESSION['codigocliente'])) { 
        // Se evalua la acción a realizar
        switch($_GET['action']) 
        {
            case 'readAll':
                if($indice->setCliente($_SESSION['codigocliente'])) {
                    if($result['dataset'] = $indice->readClienteIndices()) {
                        $result['status'] = 1;
                    } else {
                        if(Database::getException()) {
                            $result['exception'] = Database::getException(); 
                        } else {
                            $result['exception'] = 'No hay índices registradas';
                        }
                    }
                } else {
                    $result['exception'] = 'Código de cliente incorrecto';
                }
            break;
            default:
                $result['exception'] = 'Acción no reconocida';

        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
}
?>