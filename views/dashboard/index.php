<?php
include('../../app/helpers/login.php');
Login_Page::headerTemplate('Login | Administradores');
?>
        <img class="fondo" src="../../resources/img/background/fondoDashboard.png" alt="dashboard01">
        <div class="container">
        <!-- IMAGEN DE FONDO -->
            <div class="img">
                <img src="../../resources/img/brand/logoSinFondo.png" alt="dashboard02">
            </div>
            <!-- AQUÍ VA EL LOGIN -->
            <div class="login-container">
                <form method="post" id="session-form">
                    <img class="Avatar" src="../../resources/img/svgs/undraw_user_black-theme.svg" alt="dashboard03">
                    <h2>Bienvenido</h2>
                    <!-- INPUTS -->
                    <div class="input-div one">
                        <div>
                            <h5>Usuario</h5>
                            <input type="text" id="usuario" name="usuario" class="input">
                        </div>
                    </div>
                    <div class="input-div two">
                        <div>
                            <h5>Contraseña</h5>
                            <input type="password" id="clave" name="clave" class="input">
                        </div>
                    </div>
                    <div style="display: flex; justify-content-center">
                        <a onclick="cargarDatos()" class="btnDashboard">
                            INGRESAR
                        </a>
                    </div>  
                </form>
            </div>
        </div>
<?php
    Login_Page::footerTemplate('dashboard/login.js');
?>