<?php
include('../../app/helpers/dashboard_page.php');
Dashboard_Page::headerTemplate('Portal Clientes');
?>

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

</style>

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="fondoNegro border-right" id="sidebar-wrapper">
        
        <div id="logoSidebar" class="container-fluid fondoNegro">
            <a href="#">
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
    
   
                            <a href="Administradores.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                                <img class="tamañoIconos" src="../../resources/img/iconUsuario.png" alt=""> 
                                Administradores
                            </a>
                            <a href="Clientes.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                                <img class="tamañoIconos" src="../../resources/img/iconClientes.png" alt=""> 
                                Clientes
                            </a>
                            <a href="Categorias.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                                <img class="tamañoIconos" src="../../resources/img/iconSeguimiento.png" alt=""> 
                                Indice de entrega
                            </a>
                            <a href="Catalogo.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
                                <img class="tamañoIconos" src="../../resources/img/iconEstadoCuenta.png" alt=""> 
                                Estados de cuenta
                            </a>
                            <a href="Inventario.php" class="list-group-item list-group-item-action fondoOpciones textoBlanco">
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
</div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <!-- PONER EL CONTENIDO AQUI -->
    
    </div>
    <!-- /#page-content-wrapper -->
</div>

<?php
Dashboard_Page::footerTemplate('index.js');
?>