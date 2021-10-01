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
    switch ($_GET['action']) 
    {
        // Caso para cerrar sesion dentro del sistema
        case 'logOut': 
            //Ejecutamos la funcion para cerrar sesion
            if (session_destroy()) { 
                $_SESSION['codigoadmin'] = 'null';
                $result['status'] = 1;
                $result['message'] = 'Sesión eliminada correctamente';
            } else {
                // En caso de ocurrir fallar la funcion mostramos el mensaje
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión'; 
            }
        break;
        // Caso para cerrar sesion dentro del sistema
        case 'logOut2': 
            //Ejecutamos la funcion para cerrar sesion
            if (session_destroy()) { 
                $_SESSION['codigoadmin'] = 'null';
                $result['status'] = 1;
                $result['message'] = 'La sesión ha expirado por inactividad';
            } else {
                // En caso de ocurrir fallar la funcion mostramos el mensaje
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión'; 
            }
        break;
        // Caso para el inicio de sesion del usuario
        case 'logIn': 
            // Reseteamos el codigo del cliente para evitar errores del sistema
            $_SESSION['codigocliente'] = 'null';
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $cliente->validateForm($_POST);
            // Ejecutamos la funcion que verifica si existe el usuario en la base de datos
            if ($cliente->checkUser($_POST['usuario'])) {
                // Ejecutamos la funcion que verifica si la clave es correcta
                if ($cliente->checkState($_POST['usuario']) == 1) {
                    // Creamos una variable de sesion para guardar los intentos del usuario
                    $_SESSION['intentos'] = $_SESSION['intentos'] + 1 ;
                    // Ejecutamos la funcion que verifica si el usuario esta activo
                    if ($cliente->checkPassword($_POST['clave'])) {
                        // Asignamos los valores a las variables de sesion de los datos obtenidos de las consultas
                        $_SESSION['codigocliente'] = $cliente->getId();
                        $_SESSION['usuario'] = $cliente->getUsuario();
                        $_SESSION['empresa'] = $cliente->getEmpresa();
                        $_SESSION['clave'] = $_POST['clave'];
                        $_SESSION['intentos'] = 0;
                        $result['status'] = 1;
                        // Mostramos mensaje de bienvenido al usuario
                        $result['message'] = 'Autenticación correcta, bienvenido';
                    // En caso exista un error de validacion se mostrara su respectivo mensaje
                    } else {
                        if ($_SESSION['intentos'] >= 3) {
                            // Ejecutamos la funcion que verifica si la clave es correcta
                            if ($cliente->desactivateClient($_POST['usuario'])) {
                                $result['status'] = 1;
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
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                // Mensaje de clave incorrecta
                                $result['exception'] = 'Clave ingresada es incorrecta';
                            }
                        }       
                    }             
                } else {
                    if (Database::getException()) {
                            $result['exception'] = Database::getException();
                    } else {
                        // Mensaje de estado inactivo
                        $result['exception'] = 'El usuario se encuentra inactivo';
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
        // Caso para cargar los datos todos los datos en la tabla
        case 'readAll':  
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
        // Caso verificar si existen usuarios activos en la base de datos
        case 'readIndex':  
            // Reseteamos el codigo del administrador para evitar errores del sistema
            $_SESSION['codigocliente'] = 'null';
            // Ejecutamos metodo del modelo y asignamos el valor de su retorno a la variable dataset 
            if ($result['dataset'] = $cliente->readIndex()) { 
               $result['status'] = 1;
            } else {
                if (Database::getException()) {
                   $result['exception'] = Database::getException();
                } else {
                   $result['exception'] = 'No hay usuarios registrados';  
                }
            }
        break; 
        // Caso para cerrar sesion dentro del sistema
        case 'logOut2': 
            //Ejecutamos la funcion para cerrar sesion
            if (session_destroy()) { 
                $_SESSION['codigoadmin'] = 'null';
                $result['status'] = 1;
                $result['message'] = 'La sesión ha expirado por inactividad';
            } else {
                // En caso de ocurrir fallar la funcion mostramos el mensaje
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión'; 
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