<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si el nombre de la acción a realizar coincide con alguno de los casos, de lo contrario mostrara un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión que se llenaron en el login.
    session_start();
    // Se instancia la clase del modelo correspondiente.
    $cliente = new Cliente;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar cuando un usuario ha iniciado sesión.
    switch ($_GET['action']) {
        case 'logOut': // Caso para cerrar sesion dentro del sistema
            if (session_destroy()) { //Ejecutamos la funcion para cerrar sesion
                $result['status'] = 1;
                $result['message'] = 'Sesión eliminada correctamente';
            } else {
                // En caso de ocurrir fallar la funcion mostramos el mensaje
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión'; 
            }
        break;
        case 'logIn': // Caso para el inicio de sesion del usuario
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $cliente->validateForm($_POST);
            // Creamos una variable de sesion para guardar los intentos del usuario
            $_SESSION['intentos'] = $_SESSION['intentos']+1 ;
            // Ejecutamos la funcion que verifica si existe el usuario en la base de datos
            if ($cliente->checkUser($_POST['usuario'])) {
                if ($_SESSION['intentos'] != 5) {
                    // Ejecutamos la funcion que verifica si la clave es correcta
                    if ($cliente->checkPassword($_POST['clave'])) {
                        // Ejecutamos la funcion que verifica si el usuario esta activo
                        if ($cliente->checkState($_POST['usuario'])) {
                            // Asignamos los valores a las variables de sesion de los datos obtenidos de las consultas
                            $_SESSION['codigocliente'] = $cliente->getId();
                            $_SESSION['usuario'] = $cliente->getUsuario();
                            $_SESSION['empresa'] = $cliente->getEmpresa();
                            $result['status'] = 1;
                            // Mostramos mensaje de bienvenido al usuario
                            $result['message'] = 'Autenticación correcta, bienvenido';
                        // En caso exista un error de validacion se mostrara su respectivo mensaje
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                // Mensaje de usuario inactivo
                                $result['exception'] = 'El usuario se encuentra inactivo';
                            }
                        }             
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            // Mensaje de clave incorrecta
                            $result['exception'] = 'Clave incorrecta';
                        }
                    }
                }
                else{
                    // Ejecutamos la funcion que verifica si la clave es correcta
                    if ($cliente->desactivateClient($_POST['usuario'])) {
                        $result['status'] = 2;
                        // Mostramos mensaje de alerta
                        $result['message'] = 'Limite de intentos alcanzado usuario desactivado';
                        // En caso exista un error de validacion se mostrara su respectivo mensaje
                        $_SESSION['intentos'] = 0;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            // Mensaje de usuario inactivo
                            $result['exception'] = 'Error al desactivar usuario';
                        }
                    }          
                }       
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    // Mensaje de usuario incorrecto
                    $result['exception'] = 'Usuario incorrecto';
                }
            }
        break;
        case 'readAll':  // Caso para cargar los datos todos los datos en la tabla
            // Ejecutamos metodo del modelo y asignamos el valor de su retorno a la variable dataset 
            if ($result['dataset'] = $cliente->readAll()) { 
               $result['status'] = 1;
            } else {
                if (Database::getException()) {
                   $result['exception'] = Database::getException();
                } else {
                   $result['exception'] = 'No hay usuarios registrados';  
                }
            }
        break; 
        default:
            // En caso de que el caso ingresado no sea ninguno de los anteriores se muestra el siguiente mensaje 
            $result['exception'] = 'Acción no disponible dentro de la sesión';
        break; 
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    // En caso que no exista ninguna accion al hacer la peticion se muestra el siguiente mensaje
    print(json_encode('Recurso no disponible'));
}