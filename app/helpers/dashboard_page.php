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
            <link rel="stylesheet" href="../../resources/css/dashboard_styles.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
        </head>
        <body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="fondoNegro border-right" id="sidebar-wrapper">     
            <div id="logoSidebar" class="container-fluid fondoNegro">
                <a href="index.php">
                    <img src="../../resources/img/dashboardLogo.png" alt="">
                </a>
                <hr style="border-color: white;">
            </div>    
            <div class="container-fluid">
                <div id="informacion" class="row">
                    <div class="col-4 fondoNegro">
                        <img src="../../resources/img/profileCastro.png" alt="fotoPerfil">
                    </div>
                    <div class="col-8 fondoNegro espacioInformacion">
                        <h6 class="textoGris">Bienvenido</h6>
                        <h6 class="textoBlanco">Diego Castro</h6>  
                    </div>
                </div>
            </div>
    
            <div class="list-group list-group-flush fondoNegro espacioOpciones">
          
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
            </div>
         
            <div class="container-fluid a fondoAcordeon">
                <a href="LogIn.php" class="list-group-item fondoAcordeon textoBlanco sinBorde">
                    <img class="tamañoIconos" src="../../resources/img/iconCerrarSesion.png" alt=""> 
                    Cerrar Sesion
                </a>
            </div>  
        </div>

    <style>
        .fondoNegro{
            background-color:black;
        }
    
        #informacion img{
            max-width:70px;
            max-height:70px;
            padding-top:0px;
            padding-left:0px;
        }
        
        #informacion h6{
            padding-top:5px;
            padding-right:0px;
            font-size:12px;
        }
    
        .espacioInformacion{
            padding-top:8px;
        }
    
        #logoSidebar{
    
            justify-content: center;
            padding-top:20px;
            padding-bottom:15px;
        }
    
        #logoSidebar img{
            width:240px;
            height:130px;
        }
        
        .textoGris{
            color: #D3D3D3; 
            font-size:16px;
        }
    
        .textoBlanco{
            color:white; 
            font-size:16px;
        }
    
        .fondoAcordeon{
            background-color:#2B2929;
        }
    
        .fondoOpciones{
            background-color:#7D7D7D;
            border: white 3px solid;
        }
    
        .sinBorde{
            border:0;
        }
    
        #informacion{
            padding-bottom:10px;
            background-color:black;
        }
    
        #sidebar-wrapper{
            min-height: 100vh;
        }
    
        .a{
            position: absolute;
            bottom: 0;
            width:33.50vh;
        }
    
        .espacioOpciones{
            padding-top:20px;
        }
    
        .tamañoIconos{
            height:30px;
            width:40px;
            padding-right:10px;
        }
    
        .fondo{background-color:white; }
    
    </style>

    <div id="contenido" class="container-fluid fondo">
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="'.$controller.'"></script>
        </body>
        </html>
        ');
    }
}
?>