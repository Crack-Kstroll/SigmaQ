<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/historial.php');

// Se comprueba si el nombre de la acción a realizar coincide con alguno de los casos, de lo contrario mostrara un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión que se llenaron en el login.
    session_start();
    // Se instancia la clase del modelo correspondiente.
    $cliente = new Historial;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar cuando un usuario ha iniciado sesión.
    switch ($_GET['action']) {
        case 'readAll':  // Caso para cargar los datos todos los datos en la tabla
            // Ejecutamos metodo del modelo y asignamos el valor de su retorno a la variable dataset 
            if ($result['dataset'] = $cliente->readAll()) { 
                   $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay clientes registrados';  
                }
            }
        break;
        case 'search':  // Caso para realizar la busqueda filtrada 
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $cliente->validateForm($_POST);
            // Validamos si el input no esta vacio
            if ($_POST['search'] != '') {
                // Ejecutamos la funcion para la busqueda filtrada enviando el contenido del input como parametro
                if ($result['dataset'] = $cliente->searchRows($_POST['search'])) {
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
        case 'create':  // Caso para crear un registro
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $cliente->validateForm($_POST);
            // Obtenemos el valor de los input mediante los metodos set del modelo 
            if ($cliente->setId($_POST['txtId'])) {
                if ($cliente->setEmpresa($_POST['txtEmpresa'])) {
                    if ($cliente->setTelefono($_POST['txtTelefono'])) {
                        if ($cliente->setUsuario($_POST['txtUsuario'])) {
                            if ($cliente->setCorreo($_POST['txtCorreo'])) { 
                                // Validamos que la clave coincida con la confirmacion de clave                      
                                if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                    if ($cliente->setClave($_POST['txtClave'])) {
                                        // Se ejecuta la funcion para ingresar el registro
                                        if ($cliente->createRow()) {
                                            $result['status'] = 1;
                                            // Se muestra un mensaje de exito en caso de registrarse correctamente
                                            $result['message'] = 'Cliente registrado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();;
                                        }  
                                    } else {
                                        $result['exception'] = $cliente->getPasswordError();
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }                                                                                                                                                   
                        } else {
                                $result['exception'] = 'Usuario incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Telefono incorrecto';
                    }                                                                       
                } else {
                    $result['exception'] = 'Empresa incorrecta';
                }                                                                                 
            } else {
                $result['exception'] = 'Codigo incorrecto';
            }                            
        break;
        case 'readOne': // Caso para leer los datos de un solo registro parametrizado mediante el identificador
            if ($cliente->setId($_POST['id'])) {
                // Se ejecuta la funcion para leer los datos de un registro
                if ($result['dataset'] = $cliente->readRow()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente'; // Se muestra en caso de no encontrar registro con ese id
                    }
                }
            } else {
                $result['exception'] = 'Usuario incorrecto';
            }
        break;
        case 'update': // Caso para actualizar los datos de un registro
           // Validamos el form donde se encuentran los inputs para poder obtener sus valores
           $_POST = $cliente->validateForm($_POST);
           // Obtenemos el valor de los input mediante los metodos set del modelo 
            if ($cliente->setId($_POST['txtId'])) {
                if ($cliente->setCodigo($_POST['txtIdx'])) {
                    if ($cliente->setEmpresa($_POST['txtEmpresa'])) {
                        if ($cliente->setTelefono($_POST['txtTelefono'])) {
                            if ($cliente->setUsuario($_POST['txtUsuario'])) {
                                if ($cliente->setCorreo($_POST['txtCorreo'])) { 
                                    // Validamos que la clave coincida con la confirmacion de clave                      
                                    if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                        if ($cliente->setClave($_POST['txtClave'])) {
                                            // Se ejecuta la funcion para ingresar el registro
                                            if ($cliente->updateRow()) {
                                                $result['status'] = 1;
                                                // Se muestra un mensaje de exito en caso de registrarse correctamente
                                                $result['message'] = 'Cliente modificado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }  
                                        } else {
                                            $result['exception'] = $cliente->getPasswordError();
                                        }
                                    } else {
                                        $result['exception'] = 'Claves nuevas diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }                                                                                                                                                   
                            } else {
                                    $result['exception'] = 'Usuario incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Telefono incorrecto';
                        }                                                                       
                    } else {
                        $result['exception'] = 'Empresa incorrecta';
                    }                                                                     
                } else {
                    $result['exception'] = 'Codigo incorrecto';
                }                                                                                 
            } else {
               $result['exception'] = 'Codigo incorrecto';
            }       
        break;
        case 'delete': // Caso para eliminar un registro 
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $cliente->validateForm($_POST);      
            // Obtenemos el valor de los input mediante los metodos set del modelo 
            if ($cliente->setId($_POST['id'])) {
                // Cargamos los datos del registro que se desea eliminar
                if ($data = $cliente->readRow()) {
                    // Ejecutamos funcion para desactivar un usuario
                    if ($cliente->desactivateUser()) {
                        $result['status'] = 1;
                        // Mostramos mensaje de exito
                        $result['message'] = 'Cliente desactivado correctamente'; 
                    // En caso de que alguna validacion falle se muestra el mensaje con el error 
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Usuario inexistente';
                }
            } else {
                $result['exception'] = 'Codigo incorrecto';
            }
        break;   
        default:
            // En caso de que el caso ingresado no sea ninguno de los anteriores se muestra el siguiente mensaje 
            $result['exception'] = 'Acción no disponible dentro de la sesión';
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    // En caso que no exista ninguna accion al hacer la peticion se muestra el siguiente mensaje
    print(json_encode('Recurso no disponible'));
}