<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/estadoCuenta.php');

// Se compueba si existe una acción a realizar
if (isset($_GET['action'])) {
    //Se crea o se reanuda la sesión actual
    session_start();
    //Se instancia un objeto de la clase modelo
    $estadoCuenta = new EstadoCuenta;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como usuario para realizar las acciones correspondientes.
    if (isset($_SESSION['codigocliente'])) {
        // if (true){
        // Se evalua la acción a realizar
        // print($_GET['action']);
        switch ($_GET['action']) 
        {
            //Caso para mostrar los registros
            case 'readAll':
                if ($result['dataset'] = $estadoCuenta->SelectEstadoCuentaPublico()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay registros ingresados';
                    }
                }
            break;
            //Caso para realizar una busqueda de registros
            case 'search':
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $estadoCuenta->validateForm($_POST);
                // Validamos si el input no esta vacio
                if ($_POST['search'] != '') {
                    // Ejecutamos la funcion para la busqueda filtrada enviando el contenido del input como parametro
                    if ($result['dataset'] = $estadoCuenta->searchEstado($_POST['search'])) {
                        $result['status'] = 1;
                        // Obtenemos la cantidad de resultados retornados por la consulta
                        $rows = count($result['dataset']);
                        // Verificamos si la cantidad de resultados es mayor a uno asi varia el mensaje a mostrar
                        if ($rows > 1) {
                            // Mostramos un mensaje con la cantidad de coincidencias encontradas
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            // Mostramos un mensaje donde solo hubo una sola coincidencia
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            // En caso de no encontrar registros se muestra el siguiente mensaje
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
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
