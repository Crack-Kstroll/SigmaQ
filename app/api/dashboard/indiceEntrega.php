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
            //Caso para mostrar los el índice de entrega
            case 'readAll':
                if($result['dataset'] = $indice->selectIndice()) {
                    $result['status'] = 1;
                } else {
                    if(Database::getException()) {
                        $result['exception'] = Database::getException(); 
                    } else {
                        $result['exception'] = 'No hay índices registradas';
                    }
                }
            break;
            //Caso para insertar un registro
            case 'create':
                //Validamos los datos del formulario
                $_POST = $indice->validateForm($_POST);
                //Pasamos la información al modelo, mediante los setters
                if($indice->setResponsable($_POST['responsable'])) {
                    if($indice->setCliente($_POST['cliente'])) {
                        if($indice->setOrganizacion($_POST['organizacion'])) {
                            if($indice->setIndice($_POST['indice'])) {
                                if($indice->setTotalCompromiso($_POST['totalcompromiso'])) {
                                    if($indice->setCumplidos($_POST['cumplidos'])) {
                                        if($indice->setNoCumplidos($_POST['nocumplidos'])) {
                                            if($indice->setNoConsiderados($_POST['noconsiderados'])) {
                                                if($indice->setIncumNoEntregados($_POST['incumnoentregados'])) {
                                                    if($indice->setIncumPorCalidad($_POST['incumporcalidad'])) {
                                                        if($indice->setIncumPorFecha($_POST['incumporfecha'])) {
                                                            if($indice->setIncumPorCantidad($_POST['incumporcantidad'])) {
                                                                if($indice->insertIndice()) {
                                                                    $result['status'] = 1;
                                                                    // Se muestra un mensaje de exito en caso de registrarse correctamente
                                                                    $result['message'] = 'Índice registrado correctamente';
                                                                } else {
                                                                    if(Database::getException()){
                                                                        $result['exception'] = Database::getException();
                                                                    } else {
                                                                        $result['exception'] = 'Ocurrió un problema al insertar el registro';
                                                                    }
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Incumpletos por cantidad erróneos';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Incompletos por fecha erróneos';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Incompletos por calidad erróneos';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Incompletos no entregados erróneos';
                                                }
                                            } else {
                                                $result['exception'] = 'No considerados incorrectos';
                                            }
                                        } else {
                                            $result['exception'] = 'No cumplidos incorrectos';
                                        }
                                    } else {
                                        $result['exception'] = 'Cumplidos incorrectos';
                                    }
                                } else {
                                    $result['exception'] = 'Compromisos totales incorrectos';
                                }
                            } else {
                                $result['exception'] = 'Índice incorrecto';    
                            }
                        } else {
                            $result['exception'] = 'Organización incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Cliente incorrecto';    
                    }
                } else {
                    $result['exception'] = 'Responsable incorrecto';
                }
            break;
            case 'delete':
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $indice->validateForm($_POST);      
                // Obtenemos el valor de los input mediante los metodos set del modelo 
                if ($indice->setIdIndice($_POST['id'])) {
                    // Cargamos los datos del registro que se desea eliminar
                    if ($data = $indice->readOneIndice()) {
                        // Ejecutamos funcion para desactivar un usuario
                        if ($indice->desableIndice()) {
                            $result['status'] = 1;
                            // Mostramos mensaje de exito
                            $result['message'] = 'Índice desactivado correctamente'; 
                        // En caso de que alguna validacion falle se muestra el mensaje con el error 
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Índice inexistente';
                    }
                } else {
                    $result['exception'] = 'Codigo incorrecto';
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