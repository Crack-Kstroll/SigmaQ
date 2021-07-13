<?php
//Clase para definir las plantillas de las páginas web del sitio privado
class Dashboard_Page 
{
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title,$css)
    {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$title.'</title>
                <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="../../resources/css/'.$css.'.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
                <link rel="shortcut icon" href="../../resources/img/brand/qRoja.png" type="image/x-icon">
            </head>
        <body>
        ');
        $filename = basename($_SERVER['PHP_SELF']);
        if (isset($_SESSION['nombre'])) {
            if ($filename != 'index.php' && $filename != 'register.php') 
            {
                print('
                <div class="d-flex" id="contenedorDashboard"> <!-- Contenedor principal del dashboard -->
                <div class="fondoNegro border-right" id="sidebar-wrapper">  <!-- Contenedor del sidebar del dashboard-->
                    <div id="logoSidebar" class="container-fluid fondoNegro"> <!-- Seccion del logo de SigmaQ -->
                        <a href="main.php">
                            <img src="../../resources/img/brand/dashboardLogo.png" alt="">
                        </a>
                        <hr style="border-color: white;">
                    </div>   <!-- Cierra seccion logo --> 
                    <div class="container-fluid"> <!-- Seccion de infomacion de usuario -->
                        <div class="container espacioInfo">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="letraBlanca espacioInformacion">Bienvenido</h6>
                                </div>
                                <div class="col-sm-7">
                                    <a href="profile.php"><img class="config" src="../../resources/img/icons/config.png" alt=""> </a>
                                </div>
                            </div>
                        </div>
                        <div class="container espacioInfo">
                            <h6 id="datosAdmin" class="letraBlanca">' . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . '</h6>
                        </div>
                    </div>   <!-- Cierra seccion informacion de usuario -->
                    <div class="list-group list-group-flush fondoNegro espacioOpciones"> <!-- Seccion de opciones del sidebar acceso a mantenimientos -->
                        <div class="card-header fondoAcordeon" id="headingOne"> 
                            <button class="btn text-left textoBlanco sinBorde" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                                Mantenimientos
                            </button>            
                        </div>      
                        <a href="usuarios.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                            <img class="tamañoIconos" src="../../resources/img/icons/iconUsuario.png" alt=""> 
                                Usuarios
                        </a>
                        <a href="clientes.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                            <img class="tamañoIconos" src="../../resources/img/icons/clientes.png" alt=""> 
                            Clientes
                        </a>
                        <a href="indice.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                            <img class="tamañoIconos" src="../../resources/img/icons/seguimiento.png" alt=""> 
                            Índice de entrega
                        </a>
                        <a href="estado.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                            <img class="tamañoIconos" src="../../resources/img/icons/estadoCuenta.png" alt=""> 
                            Estados de cuenta
                        </a>
                        <a href="pedidos.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                            <img class="tamañoIconos" src="../../resources/img/icons/pedidos.png" alt=""> 
                            Estatus de pedidos
                        </a>                              
                    </div>  <!-- Cierra seccion de opciones del sidebar -->  
                    <div class=" position-relative ">
                        <a onclick="logOut()" class="list-group-item fondoAcordeon textoBlanco sinBorde position-absolute w-100 logOut-bottom">
                            <img class="tamañoIconos" src="../../resources/img/icons/cerrarSesion.png" alt=""> 
                            Cerrar Sesión
                        </a>
                    </div>
                </div> <!-- Cierra el contenedor sidebar -->
                ');
            } 
            else 
            {
                header('location: main.php');
            }
        } 
        else 
        {
            header('location: index.php');
        }
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) 
    {
        print('
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
            <script type="text/javascript" src="../../app/controllers/initialization.js"></script>
            <script type="text/javascript" src="../../app/controllers/paginacion.js"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/dashboard/account.js"></script>
            <script type="text/javascript" src="../../app/controllers/dashboard/'.$controller.'.js"></script> <!-- Direccion del archivo Javascript de la pagina correspondiente -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </body>
        </html>
        ');
    }
}
?>