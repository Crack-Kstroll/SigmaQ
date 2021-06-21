<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Cliente;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['codigoadmin'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
           
            case 'logOut'://metodo para cerrar sesion
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
                
            case 'readProfile'://metodo para leer el perfil del cliente que ha iniciado sesion
                if ($result['dataset'] = $cliente->readProfile($_SESSION['codigoadmin'])) {
                        $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                }
            break;
                                
                        case 'register':
                            $_POST = $cliente->validateForm($_POST);
                                    if ($cliente->setNombre($_POST['txtNombre'])) {
                                        if ($cliente->setApellidos($_POST['txtApellido'])) {
                                            if ($cliente->setCorreo($_POST['txtCorreo'])) {
                                                if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                                    if ($cliente->setNickname($_POST['txtUsuario'])) {    
                                                        if ($cliente->setDui($_POST['txtDUI'])) {
                                                            if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                                                if ($cliente->setClave($_POST['txtClave'])) {
                                                                    if ($cliente->register()) {
                                                                        $result['status'] = 1;
                                                                        $result['message'] = 'Registro exitoso';
                                                                    } else {
                                                                        $result['exception'] = Database::getException();
                                                                    }
                                                                } else {
                                                                    $result['exception'] = $cliente->getPasswordError();
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Claves diferentes';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Nacimiento incorrecto';
                                                        } 
                                                    } else {
                                                        $result['exception'] = 'Usuario incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Teléfono incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Correo incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Apellidos incorrectos';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombres incorrectos';
                                    }
                            break;

                    case 'editProfile':
                            $_POST = $cliente->validateForm($_POST);
                                    if ($cliente->setNombre($_POST['txtNombre'])) {
                                        if ($cliente->setApellido($_POST['txtApellido'])) {
                                            if ($cliente->setCorreo($_POST['txtCorreo'])) {
                                                if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                                    if ($cliente->setDui($_POST['txtDui'])) {    
                                                        if ($cliente->setUsuario($_POST['txtUsuario'])) {     
                                                            if ($cliente->editProfile($_SESSION['codigoadmin'])) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Perfil actualizado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }   
                                                        } else {
                                                            $result['exception'] = 'Usuario incorrecto';
                                                        } 
                                                    } else {
                                                        $result['exception'] = 'Dui incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Teléfono incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Correo incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Apellidos incorrectos';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombres incorrectos';
                                    }
                            break;
                        case 'changePassword'://metodo para cambiar la clave del cliente
                            if ($cliente->setId($_SESSION['idcliente'])) {
                                $_POST = $cliente->validateForm($_POST);
                                if ($cliente->checkPassword($_POST['clave_actual'])) {
                                    if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                        if ($cliente->setClave($_POST['clave_nueva_1'])) {
                                            if ($cliente->changePassword()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña cambiada correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = $cliente->getPasswordError();
                                        }
                                    } else {
                                        $result['exception'] = 'Claves nuevas diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Clave actual incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto';
                            }
                            break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                        if ($cliente->setNombre($_POST['txtNombre'])) {
                            if ($cliente->setApellidos($_POST['txtApellido'])) {
                                if ($cliente->setCorreo($_POST['txtCorreo'])) {
                                    if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                        if ($cliente->setNickname($_POST['txtUsuario'])) {    
                                            if ($cliente->setDui($_POST['txtDUI'])) {
                                                if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                                    if ($cliente->setClave($_POST['txtClave'])) {
                                                        if ($cliente->register()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Registro exitoso';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = $cliente->getPasswordError();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Claves diferentes';
                                                }
                                            } else {
                                                $result['exception'] = 'Nacimiento incorrecto';
                                            } 
                                        } else {
                                            $result['exception'] = 'Usuario incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                break;
                case 'logIn'://metodo para el inicio de sesion del cliente
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->checkUser($_POST['usuario'])) {
                            if ($cliente->checkPassword($_POST['clave'])) {
                                if ($cliente->checkState($_POST['usuario'])) {
                                    $_SESSION['codigoadmin'] = $cliente->getId();
                                    $_SESSION['usuario'] = $cliente->getUsuario();
                                    $_SESSION['nombre'] = $cliente->getNombre();
                                    $_SESSION['apellido'] = $cliente->getApellido();
                                    $result['status'] = 1;
                                    $result['message'] = 'Autenticación correcta, bienvenido';
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        $result['exception'] = 'El usuario se encuentra inactivo';
                                    }
                                }             
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Clave incorrecta';
                                }
                            }
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        }
                    break;         
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}