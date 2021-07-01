<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/divisas.php');

// Se compueba si existe una acción a realizar
if (isset($_GET['action'])) {
    //Se crea o se reanuda la sesión actual
    session_start();
    //Se instancia un objeto de la clase modelo
    $divisas = new Divisas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como usuario para realizar las acciones correspondientes.
    if (isset($_SESSION['codigoadmin'])) {
        // Se evalua la acción a realizar
        switch ($_GET['action']) {
                //Caso para mostrar los el índice de entrega
            case 'readAll':
                if ($result['dataset'] = $divisas->selectDivisa()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay divisas registradas';
                    }
                }
            break;
            //Caso para insertar un registro
            case 'create':
                //Validamos los datos del formulario
                $_POST = $divisas->validateForm($_POST);
                //Pasamos la información al modelo, mediante los setters
                if ($divisas->setDivisa($_POST['divisa'])) {
                    if ($divisas->insertDivisa()) {
                        $result['status'] = 1;
                        // Se muestra un mensaje de exito en caso de registrarse correctamente
                        $result['message'] = 'Divisa registrada correctamente';
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Ocurrió un problema al insertar el registro';
                        }
                    }
                } else {
                    $result['exception'] = 'Divisa incorrecta';
                }
            break;
            //Caso para modificar un registro
            case 'update':
                //Validamos los datos del formulario
                $_POST = $divisas->validateForm($_POST);
                //Pasamos la información al modelo, mediante los setters
                if ($divisas->setDivisa($_POST['divisa'])) {
                    if ($divisas->updateDivisa()) {
                        $result['status'] = 1;
                        // Se muestra un mensaje de exito en caso de registrarse correctamente
                        $result['message'] = 'Divisa actualizada correctamente';
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Ocurrió un problema al insertar el registro';
                        }
                    }
                } else {
                    $result['exception'] = 'Divisa incorrecta';
                }
            break;
            //Caso para desactivar un registro
            case 'delete':
                if ($divisas->setIdDivisa($_POST['iddivisa'])) {
                    if ($data = $divisas->SelectOneDivisa()) {
                        if ($divisas->deleteDivisa()) {
                            $result['status'] = 1;
                            $result['message'] = 'Divisa eliminada correctamente';
                        } else {
                            $result['message'] = Database::getException();
                        }
                    } else {
                        $result['message'] = 'Divisa inexistente';
                    }
                } else {
                    $result['message'] = 'Divisa incorrecta';
                }
            break;
            // Caso para leer los datos de un solo registro parametrizado mediante el identificador
            case 'readOne':
                if ($divisas->setIdDivisa($_POST['iddivisa'])) {
                    // Se ejecuta la funcion para leer los datos de un registro
                    if ($result['dataset'] = $divisas->SelectOneDivisa()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Divisa inexistente'; // Se muestra en caso de no encontrar registro con ese id
                        }
                    }
                } else {
                    $result['exception'] = 'Divisa incorrecta';
                }
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
