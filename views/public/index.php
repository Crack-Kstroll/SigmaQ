<?php
include('../../app/helpers/login.php');
Login_Page::headerTemplate('Login | Clientes');
?>
        <img class="fondo" src="../../resources/img/background/fondoPublic.png" alt="">
        <div class="container">
        <!-- IMAGEN DE FONDO -->
            <div class="img">
                <img src="../../resources/img/brand/logoSinFondo.png" alt="dashboard02">
            </div>
            <!-- AQUÍ VA EL LOGIN -->
            <div class="login-container">
                <form action="login_clientes.php">
                    <img class="Avatar" src="../../resources/img/svgs/undraw_profile_pic_ic5t.svg" alt="">
                    <h2>Bienvenido</h2>
                    <!-- INPUTS -->
                    <div class="input-div one">
                        <div>
                            <h5>Usuario</h5>
                            <input type="text" class="input">
                        </div>
                    </div>
                    <div class="input-div two">
                        <div>
                            <h5>Contraseña</h5>
                            <input type="password" class="input">
                        </div>
                    </div>
                    <div style="display: flex; justify-content:center">
                        <a href="main.php" class="btn">
                            INGRESAR
                            <!-- <input type="submit" class="btn" value="Login"> -->
                        </a>
                    </div>

                </form>
            </div>
        </div>
<?php
    Login_Page::footerTemplate('dashboard/login.js');
?>