// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/clientes.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    //Ejecutamos la función cuando cargue la pagina
    readProfile();
});

// Función para obtener y mostrar las categorías existentes en la base.
const readProfile = () =>{  
    // Se realiza solicitud a la API de usuarios enviando como parametro el metodo readProfile para obtener los datos del usuario activo
    fetch(API_USUARIOS + 'readProfile', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se agregan los datos obtenidos a los inputs del formulario
                    document.getElementById('txtEmpresa').value = response.dataset.empresa;
                    document.getElementById('txtTelefono').value = response.dataset.telefono;
                    document.getElementById('txtCorreo').value = response.dataset.correo;
                    document.getElementById('txtUsuario').value = response.dataset.usuario;
                } else {
                    // Se muestra mensaje de error en caso de no ejecutarse la sentencia
                    sweetAlert(3, 'Error al cargar los datos', null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para obtener y mostrar las categorías existentes en la base.
const modificarDatos = () =>{  
    fetch(API_USUARIOS + 'editProfile', {
        method: 'post',
        body: new FormData(document.getElementById('save-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'main.php');
                } else {
                    // Se verifica si el token falló (ya sea por tiempo o por uso).
                    if (response.recaptcha) {
                        // Si se completa la accion redirigimos al menu principal
                        sweetAlert(2, response.exception, 'main.php');
                    } else {
                        sweetAlert(2, response.exception, null);
                    }
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para obtener y mostrar las categorías existentes en la base.
const actualizarContraseña = () =>{  
    fetch(API_USUARIOS + 'changePassword', {
        method: 'post',
        body: new FormData(document.getElementById('password-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'main.php');
                } else {
                    // Se verifica si el token falló (ya sea por tiempo o por uso).
                    if (response.recaptcha) {
                        // Si se completa la accion redirigimos al menu principal
                        sweetAlert(2, response.exception, 'main.php');
                    } else {
                        sweetAlert(2, response.exception, null);
                    }
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}
