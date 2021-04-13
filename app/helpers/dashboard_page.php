<?php
//Clase para definir las plantillas de las páginas web del sitio privado
class Dashboard_Page 
{
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) 
    {
        print('
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$title.'</title>
                <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="../../resources/css/dashboard_styles.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
                <link rel="shortcut icon" href="../../resources/static/icons/Q-sigma-rojo.png" type="image/x-icon">
            </head>
        <body>
    <div class="d-flex" id="contenedorDashboard"> <!-- Contenedor principal del dashboard -->
        <div class="fondoNegro border-right" id="sidebar-wrapper">  <!-- Contenedor del sidebar del dashboard-->
            <div id="logoSidebar" class="container-fluid fondoNegro"> <!-- Seccion del logo de SigmaQ -->
                <a href="index.php">
                    <img src="../../resources/img/dashboardLogo.png" alt="">
                </a>
                <hr style="border-color: white;">
            </div>   <!-- Cierra seccion logo --> 
            <div class="container-fluid"> <!-- Seccion de infomacion de usuario -->
                <div id="informacion" class="row">
                    <div class="col-4 fondoNegro">
                        <img src="../../resources/img/profileCastro.png" alt="fotoPerfil">
                    </div>
                    <div class="col-8 fondoNegro espacioInformacion">
                        <h6 class="textoGris">Bienvenido</h6>
                        <h6 class="textoBlanco">Diego Castro</h6>  
                    </div>
                </div>
            </div>   <!-- Cierra seccion informacion de usuario -->
            <div class="list-group list-group-flush fondoNegro espacioOpciones"> <!-- Seccion de opciones del sidebar acceso a mantenimientos -->
                <div class="card-header fondoAcordeon" id="headingOne"> 
                    <button class="btn text-left textoBlanco sinBorde" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                        Mantenimientos
                    </button>            
                </div>      
                <a href="mtoUsuarios.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                    <img class="tamañoIconos" src="../../resources/img/iconUsuario.png" alt=""> 
                        Usuarios
                </a>
                <a href="mtoClientes.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                    <img class="tamañoIconos" src="../../resources/img/iconClientes.png" alt=""> 
                    Clientes
                </a>
                <a href="mtoIndice.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                    <img class="tamañoIconos" src="../../resources/img/iconSeguimiento.png" alt=""> 
                    Indice de entrega
                </a>
                <a href="mtoEstado.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                    <img class="tamañoIconos" src="../../resources/img/iconEstadoCuenta.png" alt=""> 
                    Estados de cuenta
                </a>
                <a href="mtoPedidos.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                    <img class="tamañoIconos" src="../../resources/img/iconPedidos.png" alt=""> 
                    Estatus de pedidos
                </a>                              
            </div>  <!-- Cierra seccion de opciones del sidebar -->  
            <div class="container-fluid a fondoAcordeon"> <!-- Seccion de la opcion cerrar sesion-->
                <a href="login_dashboard.php" class="list-group-item fondoAcordeon textoBlanco sinBorde">
                    <img class="tamañoIconos" src="../../resources/img/iconCerrarSesion.png" alt=""> 
                    Cerrar Sesion
                </a>
            </div>  <!-- Cierra seccion cerrar sesion -->
        </div>
        ');
    }
    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="'.$controller.'"></script> <!-- Direccion del archivo Javascript de la pagina correspondiente -->
        </body>
        </html>
        ');
    }
}
?>