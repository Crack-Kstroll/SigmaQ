<?php
//Clase para definir las plantillas de las páginas web del sitio privado
class Dashboard_Page {
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        print('
            
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
               
        ');
    }
}
?>