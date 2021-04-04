<?php
//Clase para definir las plantillas de las páginas web del sitio público
class Public_Page {
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        print('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="utf-8">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link type="text/css" rel="stylesheet" href="../../resources/css/public_styles.css" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>'.$title.'</title>
            </head>
            
            <body>
                <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                    <a href="#" class="navbar-brand">Brand</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="../dashboard/index.php" class="nav-item nav-link active">Sitio Privado</a>
                            <a href="#" class="nav-item nav-link">Profile</a>
                            <a href="#" class="nav-item nav-link">Messages</a>
                            <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a>
                        </div>
                    <div class="navbar-nav ml-auto">
                        <a href="#" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </nav>
            <main>
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
                </main>
                <!--Pie del documento-->
                <footer class="bg-dark">
                  <h1>Pie de pagina</h1>
                </footer>
                <!--Importación de archivos JavaScript al final del cuerpo para una carga optimizada-->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script src="../../app/controllers/public/'.$controller.'"></script>
            </body>
            </html>
        ');
    }
}
?>