const inputs = document.querySelectorAll('.input');

function focusFunc(){
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc(){
    let parent = this.parentNode.parentNode;
    if(this.value== "") {
        parent.classList.remove('focus');
    }

}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
})

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENT = '../../app/api/dashboard/clientes.php?action=';

// Metodo para cargar todos los datos de la categoria seleccionada al presionar el boton
function cargarDatos() {
    if(document.getElementById("usuario").value == ''){
        sweetAlert(3, 'Debe ingresar su usuario', null);
    }
    else{
        if(document.getElementById("clave").value == ''){
            sweetAlert(3, 'Debe ingresar la contraseña', null);
        }
        else{
            fetch(API_CLIENT + 'logIn', {
                method: 'post',
                body: new FormData(document.getElementById('session-form'))
                
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            sweetAlert(1, response.message, 'main.php');
                        } else {
                            sweetAlert(2, response.exception, null);
                        }
                    });
                } else {
                    console.log(request.status + ' ' + request.statusText);
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    }   
    
    
}