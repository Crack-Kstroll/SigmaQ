<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/estadoCuenta.php');

// Se comprueba si el nombre de la acción a realizar coincide con alguno de los casos, de lo contrario mostrara un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión que se llenaron en el login.
    session_start();
    // Se instancia la clase del modelo correspondiente.
    $estadoCuenta = new EstadoCuenta;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar cuando un usuario ha iniciado sesión.
    switch ($_GET['action']) {
        case 'readAll':  // Caso para cargar los datos todos los datos en la tabla
            // Ejecutamos metodo del modelo y asignamos el valor de su retorno a la variable dataset 
            if ($result['dataset'] = $estadoCuenta->SelectEstadoCuenta()) {
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
        case 'create':  // Caso para crear un registro
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $estadoCuenta->validateForm($_POST);
            // Obtenemos el valor de los input mediante los metodos set del modelo 
            if ($estadoCuenta->setId($_POST['idestado'])) {
                if ($estadoCuenta->setResponsable($_POST['responsable'])) {
                    if ($estadoCuenta->setSociedad($_POST['sociedad'])) {
                        if ($estadoCuenta->setCliente($_POST['cliente'])) {
                            if ($estadoCuenta->setCodigo($_POST['codigo'])) {
                                if ($estadoCuenta->setFactura($_POST['factura'])) {
                                    if ($estadoCuenta->setAsignacion($_POST['asignacion'])) {
                                        if ($estadoCuenta->setFechaContable($_POST['fechacontable'])) {
                                            if ($estadoCuenta->setClase($_POST['clase'])) {
                                                if ($estadoCuenta->setVencimiento($_POST['vencimiento'])) {
                                                    if ($estadoCuenta->setDivisa($_POST['divisa'])) {
                                                        if ($estadoCuenta->setTotal($_POST['total'])) {
                                                            if ($estadoCuenta->insertEstado()) {
                                                                $result['status'] = 1;
                                                                // Se muestra un mensaje de exito en caso de registrarse correctamente
                                                                $result['message'] = 'Cliente registrado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();;
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Total incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Divisa incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Fecha de vencimiento incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Clase incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha contable incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Asignación incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Factura incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Código incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Cliente incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Sociedad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Responsable incorrecto';
                }
            } else {
                $result['exception'] = 'Id incorrecto';
            }
            break;
        case 'readOne': // Caso para leer los datos de un solo registro parametrizado mediante el identificador
            if ($estadoCuenta->setId($_POST['idestado'])) {
                // Se ejecuta la funcion para leer los datos de un registro
                if ($result['dataset'] = $estadoCuenta->SelectOneEstadoCuenta()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Registro inexistente'; // Se muestra en caso de no encontrar registro con ese id
                    }
                }
            } else {
                $result['exception'] = 'Registro incorrecto';
            }
            break;
        case 'update':  // Caso para actualizar un registro
            // Validamos el form donde se encuentran los inputs para poder obtener sus valores
            $_POST = $estadoCuenta->validateForm($_POST);
            // Obtenemos el valor de los input mediante los metodos set del modelo 
            if ($estadoCuenta->setId($_POST['idestado'])) {
                if ($estadoCuenta->setResponsable($_POST['responsable'])) {
                    if ($estadoCuenta->setSociedad($_POST['sociedad'])) {
                        if ($estadoCuenta->setCliente($_POST['cliente'])) {
                            if ($estadoCuenta->setCodigo($_POST['codigo'])) {
                                if ($estadoCuenta->setFactura($_POST['factura'])) {
                                    if ($estadoCuenta->setAsignacion($_POST['asignacion'])) {
                                        if ($estadoCuenta->setFechaContable($_POST['fechacontable'])) {
                                            if ($estadoCuenta->setClase($_POST['clase'])) {
                                                if ($estadoCuenta->setVencimiento($_POST['vencimiento'])) {
                                                    if ($estadoCuenta->setDivisa($_POST['divisa'])) {
                                                        if ($estadoCuenta->setTotal($_POST['total'])) {
                                                            if ($estadoCuenta->updateEstado()) {
                                                                $result['status'] = 1;
                                                                // Se muestra un mensaje de exito en caso de registrarse correctamente
                                                                $result['message'] = 'Cliente actualizado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();;
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Total incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Divisa incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Fecha de vencimiento incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Clase incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha contable incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Asignación incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Factura incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Código incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Cliente incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Sociedad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Responsable incorrecto';
                }
            } else {
                $result['exception'] = 'Id incorrecto';
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
