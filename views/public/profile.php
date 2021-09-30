<?php
include('../../app/helpers/public.php');
Public_Page::headerTemplate('SigmaQ - Configuración personal');
?>

<style>
    .fondoProfile{
        background: #D3D3D3;
    }

    .botonesProfile{
    width:100%;
    }
    .centrar{
        text-align: center;

    }
    .espace{
        padding-top:8px;
    }
    .espacex2{
        padding-top:45px;
    }
    .espacex3{
        padding-top:180px;
    }
    .inferior{
        padding-bottom:100px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-6 espacex2">
            <div class="container">
                <h3 class="centrar">Modificar datos</h3>  
                <form method="post" id="save-form" enctype="multipart/form-data">     
                    <div class="row espacex2">
                        <div class="col-6">
                            <label for="txtEmpresa" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="txtEmpresa" name="txtEmpresa" >
                        </div>
                        <div class="col-6">
                            <label for="txtTelefono" class="form-label">Télefono</label>
                            <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" >
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-6">
                            <label for="txtCorreo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
                        </div>
                        <div class="col-6">
                            <label for="txtUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" >
                        </div>
                    </div><br>
                </form><br><br>
                <div class="row">
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button onclick="modificarDatos()" class="btn btn-primary botonesProfile centrar" type="button">Modificar perfil</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-6 espacex2">
            <div class="container">
                <h3 class="centrar">Cambiar contraseña</h3> 
                <form method="post" id="password-form" enctype="multipart/form-data">   
                    <div class="row espacex2">
                        <div class="d-grid gap-2 col-md-4 col-sm-12 mx-auto">
                            <label for="txtClaveActual" class="form-label">Clave actual</label>
                            <input type="password" id="txtClaveActual" name="txtClaveActual" class="form-control" aria-describedby="claveActual">
                            <div id="claveActual" class="form-text">
                            Tu contraseña debe tener una longitud mínima de 6 caracteres y un máximo de 30, puede contener letras numeros y espacios
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-md-4 col-sm-12 mx-auto">
                            <label for="txtClaveNueva" class="form-label">Nueva clave</label>
                            <input type="password" id="txtClaveNueva" name="txtClaveNueva" class="form-control" aria-describedby="claveNueva">
                            <div id="claveNueva" class="form-text">
                            Tu contraseña debe tener una longitud mínima de 6 caracteres y un máximo de 30, puede contener letras numeros y espacios
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-md-4 col-sm-12 mx-auto">
                            <label for="txtClaveConfirmar" class="form-label">Confirmar clave</label>
                            <input type="password" id="txtClaveConfirmar" name="txtClaveConfirmar" class="form-control" aria-describedby="claveConfirmar">
                            <div id="claveConfirmar" class="form-text">
                            Tu contraseña debe tener una longitud mínima de 6 caracteres y un máximo de 30, puede contener letras numeros y espacios
                            </div>
                        </div>
                    </div>
                </form><br><br><br><br>
                <div class="row espace inferior">
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button onclick="actualizarContraseña()" class="btn btn-primary botonesProfile centrar" type="button">Modificar contraseña</button>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
                                                 
<?php
Public_Page::footerTemplate('profile');
?>