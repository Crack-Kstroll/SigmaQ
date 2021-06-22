<?php
include('../../app/helpers/dashboard.php');
Dashboard_Page::headerTemplate('Edicion de perfil','dashboard');
?>

<style>
.fondoProfile{
    background: #D3D3D3;
}

.botonesProfile{
   width:100%;
}
</style>

<div class="container-fluid fondoProfile">
    <div class="container "><br><br>
        <center><h3>Modificar datos</h3></center>    
        <br>
        <form method="post" id="save-form" enctype="multipart/form-data">     
            <div class="row">
                <div class="col-6">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" >
                </div>
                <div class="col-6">
                    <label for="txtApellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="txtApellido" name="txtApellido" >
                </div>
            </div><br>
            <div class="row">
                <div class="col-6">
                    <label for="txtDui" class="form-label">DUI</label>
                    <input type="text" class="form-control" id="txtDui" name="txtDui">
                </div>
                <div class="col-6">
                    <label for="txtCorreo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" >
                </div>
            </div><br>
            <div class="row">
                <div class="col-6">
                    <label for="txtTelefono" class="form-label">Telefono</label>
                    <input type="phone" class="form-control" id="txtTelefono" name="txtTelefono">
                </div>
                <div class="col-6">
                    <label for="txtUsuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="txtUsuario" name="txtUsuario">
                </div>
            </div>
        </form><br><br>
        <div class="row">
            <div class="d-grid gap-2 col-12 mx-auto">
                <center><button onclick="modificarDatos()" class="btn btn-primary botonesProfile" type="button">Modificar perfil</button></center>
            </div>
        </div><br><hr>
    </div>

    <div class="container ">
        <br>
        <center><h3>Cambiar contraseña</h3></center>    
        <br>
        <form method="post" id="password-form" enctype="multipart/form-data">   
            <div class="row">
                <div class="d-grid gap-2 col-4 mx-auto">
                    <label for="txtClaveActual" class="form-label">Clave actual</label>
                    <input type="password" id="txtClaveActual" name="txtClaveActual" class="form-control" aria-describedby="claveActual">
                    <div id="claveActual" class="form-text">
                    Tu contraseña debe tener una longitud minima de 6 caracteres y un maximo de 30, puede contener letras numeros y espacios
                    </div>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <label for="txtClaveNueva" class="form-label">Nueva clave</label>
                    <input type="password" id="txtClaveNueva" name="txtClaveNueva" class="form-control" aria-describedby="claveNueva">
                    <div id="claveNueva" class="form-text">
                    Tu contraseña debe tener una longitud minima de 6 caracteres y un maximo de 30, puede contener letras numeros y espacios
                    </div>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <label for="txtClaveConfirmar" class="form-label">Clave actual</label>
                    <input type="password" id="txtClaveConfirmar" name="txtClaveConfirmar" class="form-control" aria-describedby="claveConfirmar">
                    <div id="claveConfirmar" class="form-text">
                    Tu contraseña debe tener una longitud minima de 6 caracteres y un maximo de 30, puede contener letras numeros y espacios
                    </div>
                </div>
            </div>
        </form>
        <br><br>
        <div class="row">
            <div class="d-grid gap-2 col-12 mx-auto">
                <center><button class="btn btn-primary botonesProfile" type="button">Modificar contraseña</button></center>
            </div>
        </div>

    </div>
</div>

<?php
Dashboard_Page::footerTemplate('profile');
?>