<?php
//Clase para definir las plantillas de las páginas web del sitio público
class Public_Page {
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        print('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$title.'</title>
                <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="../../resources/css/public_styles.css">
                <link rel="shortcut icon" href="../../resources/static/icons/Q-sigma-rojo.png" type="image/x-icon">
            </head>
            <body>
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar--header">
                    <a class="navbar-brand" href="#">
                        <img class="nav--logo" src="../../resources/static/icons/logo-sigma-blanco.png" alt="">
                    </a>
                    <img src="../../resources/static/icons/usuario.png" alt="" class="nav--user__icon">
                </nav>
                
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar--options">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        MENÚS
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor02">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Estados de cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Status de pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Índice de entrega</a>
                        </li>
                    </div>
                </nav>
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate() {
        print('
                    <footer class="footer">
                        <div class="info">
                            <p class="redes-sociales__text">Síguenos en nuestras redes sociales</p>
                            <div class="redes-sociales">
                                <a href=""><img class="redes-sociales__icon" src="../../resources/static/icons/facebook.png" alt=""></a>
                                <a href=""><img class="redes-sociales__icon" src="../../resources/static/icons/linkedin.png" alt=""></a>
                                <a href=""><img class="redes-sociales__icon" src="../../resources/static/icons/twitter.png" alt=""></a>
                            </div>
                        </div>
                        <div class="copyright">
                            <p>®2021 - SigmaQ todos los derechos reservados</p>
                        </div>
                    </footer>
                    
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
                </body>
            </html>
        ');
    }
}
?>