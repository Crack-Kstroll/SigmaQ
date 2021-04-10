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
            <title>SigmaQ - Bienvenido</title>

            <link rel="stylesheet" href="../../resources/css/dashboard_styles.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../resources/js/dashboard.js">
        </head>
        <body>
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        </body>
        </html>
        ');
    }
}
?>