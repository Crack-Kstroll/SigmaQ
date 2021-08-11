<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/usuarios.php');

// Se comprueba si el nombre de la acción a realizar coincide con alguno de los casos, de lo contrario mostrara un mensaje de error.
if (isset($_GET['action'])) 
{
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión que se llenaron en el login.
    session_start();
    // Se instancia la clase del modelo correspondiente.
    $cliente = new Usuario;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Si existe el codigo del administrador las acciones disponibles seran diferentes 
    if (isset($_SESSION['codigoadmin'])) {
        // Se compara la acción a realizar cuando un usuario ha iniciado sesión.
        switch ($_GET['action'])
        {
            // Caso para cerrar sesion dentro del sistema
            case 'logOut': 
                //Ejecutamos la funcion para cerrar sesion
                if (session_destroy()) { 
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    // En caso de ocurrir fallar la funcion mostramos el mensaje
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión'; 
                }
            break;    
            // Caso para leer el perfil del cliente que ha iniciado sesion mediante el codigo de administrador
            case 'readProfile': 
                // Se ejecuta la funcion para obtener los datos del perfil
                if ($result['dataset'] = $cliente->readProfile($_SESSION['codigoadmin'])) { 
                    $result['status'] = 1; 
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente'; // En caso fallar la obtencion del error se muestra el error
                    }
                }
            break;     
            // Caso verificar si existen usuarios activos en la base de datos  
            case 'readIndex':  
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
            // Caso para editar los datos de un usuario que ha iniciado sesion 
            case 'editProfile': 
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST); 
                // Obtenemos el valor de los input mediante los metodos set del modelo 
                if ($cliente->setNombre($_POST['txtNombre'])) {
                    if ($cliente->setApellido($_POST['txtApellido'])) {
                        if ($cliente->setCorreo($_POST['txtCorreo'])) {
                            if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                if ($cliente->setDui($_POST['txtDui'])) {    
                                    if ($cliente->setUsuario($_POST['txtUsuario'])) {
                                        // Ejecutamos el metodo para editar perfil enviando el codigo como parametro    
                                        if ($cliente->editProfile($_SESSION['codigoadmin'])) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Perfil actualizado correctamente'; // En caso de exito mostramos el mensaje
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }  
                                        // En caso de ocurrir algun error con la obtencion de datos se mostraran los siguentes mensajes 
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
            // Caso para cambiar la contraseña del usuario que ha iniciado sesion
            case 'changePassword': 
                if ($cliente->setId($_SESSION['codigoadmin'])) {
                    // Validamos el form donde se encuentran los inputs para poder obtener sus valores{
                    $_POST = $cliente->validateForm($_POST); 
                    // Validamos que ninguno de los inputs esten vacios 
                    if ($_POST['txtClaveActual'] != '' || $_POST['txtClaveConfirmar'] != '' || $_POST['txtClaveNueva'] != '') {
                        // Validamos que la contraseña actual sea correcta
                        if ($cliente->checkPassword($_POST['txtClaveActual'])) {
                            // Validamos que la clave nueva y la confirmacion de clave coincida
                            if ($_POST['txtClaveNueva'] == $_POST['txtClaveConfirmar']) {
                                // Obtenemos el valor del input mediante la funcion del modelo 
                                if ($cliente->setClave($_POST['txtClaveConfirmar'])) {
                                    // Ejecutamos la funcion del modelo cambiar clave enviando la variable de sesion como parametro
                                    if ($cliente->changePassword($_SESSION['codigoadmin'])) {
                                        $result['status'] = 1; // Colocamos status 1 porque muestra el icono de exito en el mensaje de alerta
                                        $result['message'] = 'Clave actualizada correctamente'; // En caso de exito mostramos el siguiente mensaje
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = $cliente->getPasswordError();
                                }
                            // Mostramos errores segun la validacion que no sea correcta 
                            } else {
                                $result['exception'] = 'Las nuevas claves no coinciden';
                            }
                        } else {
                            $result['exception'] = 'Clave actual incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Complete los campos solicitados';
                    }     
                } else {
                    $result['exception'] = 'Error al asignar codigo admin'; 
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
                        $result['exception'] = 'No hay usuarios registrados';  // Mostramos mensaje de error 
                    }
                }
            break;
            // Caso para realizar la busqueda filtrada
            case 'search':   
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
                if(isset($_POST['tipo'])) {
                    if($cliente->setTipo($_POST['tipo'])) {
                        // Verificamos si el contenido de los inputs no es nulo        
                        if ($cliente->validateNull($_POST['txtId'])) {
                            // Obtenemos el valor de los input mediante los metodos set del modelo             
                            if ($cliente->setId($_POST['txtId'])) {
                                if ($cliente->validateNull($_POST['txtNombre'])) {
                                    if ($cliente->setNombre($_POST['txtNombre'])) {
                                        if ($cliente->validateNull($_POST['txtApellido'])) {
                                            if ($cliente->setApellido($_POST['txtApellido'])) {
                                                if ($cliente->validateNull($_POST['txtTelefono'])) {
                                                    if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                                        if ($cliente->validateNull($_POST['txtUsuario'])) {
                                                            if ($cliente->setUsuario($_POST['txtUsuario'])) {
                                                                if ($cliente->validateNull($_POST['txtDui'])) {
                                                                    if ($cliente->setDui($_POST['txtDui'])) {
                                                                        if ($cliente->validateNull($_POST['txtCorreo'])){
                                                                            if ($cliente->setCorreo($_POST['txtCorreo'])) { 
                                                                                // Validamos que la clave coincida con la confirmacion de clave                      
                                                                                if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                                                                    if ($cliente->validateNull($_POST['txtClave'])) {
                                                                                        if ($cliente->setClave($_POST['txtClave'])) {
                                                                                            if ($cliente->validateNull($_POST['txtDireccion'])) {
                                                                                                if ($cliente->setDireccion($_POST['txtDireccion'])) {
                                                                                                    // Se ejecuta la funcion para ingresar el registro
                                                                                                    if ($cliente->createRow()) {
                                                                                                        $result['status'] = 1;
                                                                                                        // Se muestra un mensaje de exito en caso de registrarse correctamente
                                                                                                        $result['message'] = 'Usuario registrado correctamente';
                                                                                                    // Se muestran los mensajes de error segun la validacion que falle 
                                                                                                    } else {
                                                                                                        $result['exception'] = Database::getException();;
                                                                                                    }  
                                                                                                } else {
                                                                                                    $result['exception'] = 'La direccion supera el limite de caracteres del campo';
                                                                                                }
                                                                                            } else {
                                                                                                $result['exception'] = 'Ingrese la direccion del usuario';
                                                                                            }                                                        
                                                                                        } else {
                                                                                            $result['exception'] = $cliente->getPasswordError();
                                                                                        }
                                                                                    } else {
                                                                                        $result['exception'] = 'Ingrese la clave del usuario';
                                                                                    }                                                                          
                                                                                } else {
                                                                                    $result['exception'] = 'Claves nuevas diferentes';
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = 'El correo tiene formato incorrecto';
                                                                            } 
                                                                        } else {
                                                                            $result['exception'] = 'Ingrese la direccion del usuario';
                                                                        }                                                                                     
                                                                    } else {
                                                                        $result['exception'] = 'El dui posee formato incorrecto';
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Ingrese el dui del usuario';
                                                                }                                                                                     
                                                            } else {
                                                                $result['exception'] = 'El usuario tiene formato incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Ingrese el alias del usuario';
                                                        }                                              
                                                    } else {
                                                        $result['exception'] = 'El telefono posee formato incorrecto';
                                                    } 
                                                } else {
                                                    $result['exception'] = 'Ingrese el telefono del usuario';
                                                }                                                                                          
                                            } else {
                                                $result['exception'] = 'El apellido contiene caracteres erróneos';
                                            }
                                        } else {
                                            $result['exception'] = 'Ingrese el apellido del usuario';
                                        }      
                                    } else {
                                        $result['exception'] = 'El nombre contiene caracteres erróneos';
                                    }   
                                } else {
                                    $result['exception'] = 'Ingrese el nombre del usuario';
                                }                                                                                       
                            } else {
                                $result['exception'] = 'El codigo debe ser numerico';
                            }                
                        } else {
                            $result['exception'] = 'Ingrese el codigo del usuario';
                        } 
                    } else {
                        $result['exception'] = 'Escoja un tipo de usuario';    
                    }
                } else {
                    $result['exception'] = 'Escoja un tipo de usuario';
                }                
            break;
            // Caso para leer los datos de un solo registro parametrizado mediante el identificador
            case 'readOne': 
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
                if(isset($_POST['tipo'])) {
                    if($cliente->setTipo($_POST['tipo'])) {
                        if ($cliente->setCodigo($_POST['txtIdx'])) {    
                            if ($cliente->validateNull($_POST['txtId'])) {
                                if ($cliente->setId($_POST['txtId'])) {
                                    if ($cliente->validateNull($_POST['txtNombre'])) {
                                        if ($cliente->setNombre($_POST['txtNombre'])) {
                                            if ($cliente->validateNull($_POST['txtApellido'])) {
                                                if ($cliente->setApellido($_POST['txtApellido'])) {
                                                    if ($cliente->validateNull($_POST['txtTelefono'])) {
                                                        if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                                            if ($cliente->validateNull($_POST['txtUsuario'])) {
                                                                if ($cliente->setUsuario($_POST['txtUsuario'])) {
                                                                    if ($cliente->validateNull($_POST['txtDui'])) {
                                                                        if ($cliente->setDui($_POST['txtDui'])) {
                                                                            if ($cliente->validateNull($_POST['txtCorreo'])) {
                                                                                if ($cliente->setCorreo($_POST['txtCorreo'])) { 
                                                                                    if ($cliente->validateNull($_POST['txtDireccion'])) {
                                                                                        if ($cliente->setDireccion($_POST['txtDireccion'])) {                                                                                                 
                                                                                            if ($cliente->validateNull($_POST['txtClave'])){
                                                                                                if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                                                                                    if ($cliente->setClave($_POST['txtClave'])) {
                                                                                                        // Se ejecuta la funcion para actualizar el registro
                                                                                                        if ($cliente->updateRow()) {
                                                                                                            $result['status'] = 1;
                                                                                                            // Se muestra mensaje de exito
                                                                                                            $result['message'] = 'Usuario modificado correctamente';       
                                                                                                        // En caso que exista algun error con alguna validacion se mostrara el mensaje de error
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
                                                                                                // Se ejecuta la funcion para actualizar el registro (Sin cambiar clave)
                                                                                                if ($cliente->updateRow()) {
                                                                                                    $result['status'] = 1;
                                                                                                    // Se muestra mensaje de exito
                                                                                                    $result['message'] = 'Usuario modificado correctamente';       
                                                                                                // En caso que exista algun error con alguna validacion se mostrara el mensaje de error
                                                                                                } else {
                                                                                                    $result['exception'] = Database::getException();;
                                                                                                }  
                                                                                            } 
                                                                                        } else {
                                                                                            $result['exception'] = 'La direccion supera el limite de caracteres del campo';
                                                                                        }
                                                                                    } else {
                                                                                        $result['exception'] = 'Ingrese la direccion del usuario';
                                                                                    }                                                                                       
                                                                                } else {
                                                                                    $result['exception'] = 'El correo tiene formato incorrecto';
                                                                                } 
                                                                            } else {
                                                                                $result['exception'] = 'Ingrese la direccion del usuario';
                                                                            }                                                                                     
                                                                        } else {
                                                                            $result['exception'] = 'El dui posee formato incorrecto';
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = 'Ingrese el dui del usuario';
                                                                    }                                                                                     
                                                                } else {
                                                                    $result['exception'] = 'El usuario tiene formato incorrecto';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Ingrese el alias del usuario';
                                                            }                                              
                                                        } else {
                                                            $result['exception'] = 'El telefono posee formato incorrecto';
                                                        } 
                                                    } else {
                                                        $result['exception'] = 'Ingrese el telefono del usuario';
                                                    }                                                                                          
                                                } else {
                                                    $result['exception'] = 'El apellido contiene caracteres erróneos';
                                                }
                                            } else {
                                                $result['exception'] = 'Ingrese el apellido del usuario';
                                            }      
                                        } else {
                                            $result['exception'] = 'El nombre contiene caracteres erróneos';
                                        }   
                                    } else {
                                        $result['exception'] = 'Ingrese el nombre del usuario';
                                    }                                                                                       
                                } else {
                                    $result['exception'] = 'El codigo debe ser numerico';
                                }                
                            } else {
                                $result['exception'] = 'Ingrese el codigo del usuario';
                            } 
                        } else {
                            $result['exception'] = 'Codigo incorrecto';
                        } 
                    } else {
                        $result['exception'] = 'Escoja un tipo de usuario';    
                    }
                } else {
                    $result['exception'] = 'Escoja un tipo de usuario';
                } 
                          
            break;
            case 'delete': // Caso para eliminar un registro 
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST); 
                // Se valida que el id del usuario que inicio sesion no sea el mismo que se desea eliminar 
                if ($_POST['id'] != $_SESSION['codigoadmin']) {
                    // Obtenemos el valor de los input mediante los metodos set del modelo 
                    if ($cliente->setId($_POST['id'])) {
                        // Cargamos los datos del registro que se desea eliminar
                        if ($data = $cliente->readRow()) {
                            // Ejecutamos funcion para desactivar un usuario
                            if ($cliente->desactivateUser()) {
                                $result['status'] = 1;
                                // Mostramos mensaje de exito
                                $result['message'] = 'Usuario desactivado correctamente'; 
                            // En caso de que alguna validacion falle se muestra el mensaje con el error 
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'El usuario es inexistente';
                        }
                    } else {
                        $result['exception'] = 'Codigo del administrador incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede desactivar a si mismo';
                }
            break;
            case 'activate': // Caso para eliminar un registro 
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST); 
                // Se valida que el id del usuario que inicio sesion no sea el mismo que se desea eliminar 
                if ($_POST['id'] != $_SESSION['codigoadmin']) {
                    // Obtenemos el valor de los input mediante los metodos set del modelo 
                    if ($cliente->setId($_POST['id'])) {
                        // Cargamos los datos del registro que se desea eliminar
                        if ($data = $cliente->readRow()) {
                            // Ejecutamos funcion para activar un usuario
                            if ($cliente->activateUser()) {
                                $result['status'] = 1;
                                // Mostramos mensaje de exito
                                $result['message'] = 'Usuario activado correctamente'; 
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
                } else {
                    $result['exception'] = 'No se puede eliminar a si mismo';
                }
            break;
            // Caso para cargar los datos de la grafica general de usuarios usuarios con mas acciones realizadas
            case 'graficaUsuarios':
                // Ejecutamos la funcion para cargar los datos de la base
                if ($result['dataset'] = $cliente->graficaUsuarios()) {
                    $result['status'] = 1;
                } else {
                    // Se ejecuta si existe algun error en la base de datos 
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
            break;
            // Caso para cargar los datos de la grafica parametrizada de la cantidad de acciones realizadas por cada usuario
            case 'graficaParam':
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST);    
                // Ejecutamos la funcion para cargar los datos de la base
                if ($result['dataset'] = $cliente->graficaParam($_POST['id'])) {
                    $result['status'] = 1;
                } else {
                    // Se ejecuta si existe algun error en la base de datos 
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
            break;
            case 'logIn': // Caso para el inicio de sesion del usuario
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST);
                // Ejecutamos la funcion que verifica si existe el usuario en la base de datos
                if ($cliente->checkUser($_POST['usuario'])) {
                    // Ejecutamos la funcion que verifica el usuario se encuentra activo
                    if ($cliente->checkState($_POST['usuario'])) {
                        // Ejecutamos la funcion que verifica si la clave es correcta
                        if ($cliente->checkPassword($_POST['clave'])) {
                            // Asignamos los valores a las variables de sesion de los datos obtenidos de las consultas
                            $_SESSION['codigoadmin'] = $cliente->getId();
                            $_SESSION['usuario'] = $cliente->getUsuario();
                            $_SESSION['nombre'] = $cliente->getNombre();
                            $_SESSION['apellido'] = $cliente->getApellido();
                            if ($cliente->getTipo() != 1) {
                                $_SESSION['tipo'] = 'Admin';
                            } else {
                                $_SESSION['tipo'] = 'Root';
                            }
                            $_SESSION['intentos'] = 0;
                            $result['status'] = 1;
                            // Mostramos mensaje de bienvenido al usuario
                            $result['message'] = 'Autenticación correcta, bienvenido';
                        // En caso exista un error de validacion se mostrara su respectivo mensaje
                        } else {
                            // Creamos una variable de sesion para guardar los intentos del usuario
                            $_SESSION['intentos'] = $_SESSION['intentos']+1 ;
                            if ($_SESSION['intentos'] == 5) {
                                // Ejecutamos la funcion que verifica si la clave es correcta
                                if ($cliente->desactivateAdmin($_POST['usuario'])) {
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
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    // Mensaje de clave incorrecta
                                    $result['exception'] = 'La clave ingresada es incorrecta';
                                }
                            }    
                        }             
                    } else {
                        if (Database::getException()){
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
                        // Mensaje de usuario incorrecto
                        $result['exception'] = 'Usuario incorrecto';
                    }
                }
            break;
            default:
                // En caso de que el caso ingresado no sea ninguno de los anteriores se muestra el siguiente mensaje 
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } 
    else 
    {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) 
        {
            case 'logIn': // Caso para el inicio de sesion del usuario
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST);
                // Ejecutamos la funcion que verifica si existe el usuario en la base de datos
                if ($cliente->checkUser($_POST['usuario'])) {
                    // Ejecutamos la funcion que verifica el usuario se encuentra activo
                    if ($cliente->checkState($_POST['usuario'])) {
                        // Ejecutamos la funcion que verifica si la clave es correcta
                        if ($cliente->checkPassword($_POST['clave'])) {
                            // Asignamos los valores a las variables de sesion de los datos obtenidos de las consultas
                            $_SESSION['codigoadmin'] = $cliente->getId();
                            $_SESSION['usuario'] = $cliente->getUsuario();
                            $_SESSION['nombre'] = $cliente->getNombre();
                            $_SESSION['apellido'] = $cliente->getApellido();
                            $_SESSION['intentos'] = 0;
                            if ($cliente->getTipo() != 1) {
                                $_SESSION['tipo'] = 'Admin';
                            } else {
                                $_SESSION['tipo'] = 'Root';
                            }
                            $result['status'] = 1;
                            // Mostramos mensaje de bienvenido al usuario
                            $result['message'] = 'Autenticación correcta, bienvenido';
                            // En caso exista un error de validacion se mostrara su respectivo mensaje
                        } else {
                            // Creamos una variable de sesion para guardar los intentos del usuario
                            $_SESSION['intentos'] = $_SESSION['intentos']+1 ;
                            if ($_SESSION['intentos'] == 5) {
                                // Ejecutamos la funcion que verifica si la clave es correcta
                                if ($cliente->desactivateAdmin($_POST['usuario'])){
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
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    // Mensaje de clave incorrecta
                                    $result['exception'] = 'La clave ingresada es incorrecta';
                                }
                            }    
                        }             
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
                        // Mensaje de usuario incorrecto
                        $result['exception'] = 'Usuario incorrecto';
                    }
                }
            break;
            case 'readIndex':  // Caso verificar si existen usuarios activos en la base de datos
                // Reseteamos el codigo del administrador para evitar errores del sistema
                $_SESSION['codigoadmin'] = 'null';
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
            case 'register':
                // Validamos el form donde se encuentran los inputs para poder obtener sus valores
                $_POST = $cliente->validateForm($_POST);
                // Obtenemos el valor de los input mediante los metodos set del modelo 
                if ($cliente->setId($_POST['txtId'])) {
                    if ($cliente->setTipo(1)) {
                        if ($cliente->setNombre($_POST['txtNombre'])) {
                            if ($cliente->setApellido($_POST['txtApellido'])) {
                                if ($cliente->setTelefono($_POST['txtTelefono'])) {
                                    if ($cliente->setUsuario($_POST['txtUsuario'])) {
                                        if ($cliente->setDui($_POST['txtDui'])) {
                                            if ($cliente->setCorreo($_POST['txtCorreo'])) { 
                                                // Validamos que la clave coincida con la confirmacion de clave                      
                                                if ($_POST['txtClave'] == $_POST['txtClave2']) {
                                                    if ($cliente->setClave($_POST['txtClave'])) {
                                                        if ($cliente->setDireccion($_POST['txtDireccion'])) {
                                                            // Se ejecuta la funcion para ingresar el registro
                                                            if ($cliente->createRow()) {
                                                                $result['status'] = 1;
                                                                // Se muestra un mensaje de exito en caso de registrarse correctamente
                                                                $result['message'] = 'Usuario registrado correctamente';
                                                            // Se muestran los mensajes de error segun la validacion que falle 
                                                            } else {
                                                                $result['exception'] = Database::getException();;
                                                            }  
                                                        } else {
                                                            $result['exception'] = 'Direccion incorrecta';
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
                                            $result['exception'] = 'Dui incorrecto';
                                        }                                                                            
                                    } else {
                                        $result['exception'] = 'Usuario incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }                                                                       
                            } else {
                                $result['exception'] = 'Apellido incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        } 
                    } else {
                        $result['exception'] = 'Tipo incorrecto';
                    }                                                                                
                } else {
                    $result['exception'] = 'Codigo incorrecto';
                }
            break;                      
            default:
                // En caso de que el caso ingresado no sea ninguno de los anteriores se muestra el siguiente mensaje 
                $result['exception'] = 'Acción no disponible fuera de la sesión';
            break; 
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} 
else 
{
    // En caso que no exista ninguna accion al hacer la peticion se muestra el siguiente mensaje
    print(json_encode('Recurso no disponible'));
}