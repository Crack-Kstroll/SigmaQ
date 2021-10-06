<?php
require('../../helpers/report.php');
require('../../models/pedidos.php');

// Creamos un atributo para almacenar el numero de registros
$numero = 0;
// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReportL('Reporte de los pedidos de cada cliente');
// Se instancia el módelo Cliente para obtener los datos.
$categoria = new Pedidos;

// Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
if ($categoria->setCliente($_GET['id'])) {
    // Se verifica si existen registros para mostrar, de lo contrario se imprime un mensaje.
    if ($dataCategorias = $categoria->readOneClientes()) {
        // Se recorren los registros fila por fila.
        foreach ($dataCategorias as $rowCategoria) {
            // Creamos un atributo para almacenar el numero de registros
            $cantidad = 0;
            // Se establece un color de relleno para mostrar el nombre del usuario del cliente.
            $pdf->SetFillColor(0,0,0);
            // Se establece la fuente para el nombre del usuario del cliente.
            $pdf->SetFont('Helvetica', 'B', 12);
            $pdf->SetTextColor(255);
            // Se imprime una celda con el usuario del cliente.
            $pdf->Cell(0, 10, utf8_decode('Usuario del cliente: '.$rowCategoria['usuario']), 1, 1, 'C', 1);
            // Se establece el codigo para obtener las acciones del cliente, de lo contrario se imprime un mensaje de error.
            if ($categoria->setCliente($rowCategoria['codigocliente'])) {
                // Se verifica si existen registros para mostrar, de lo contrario se imprime un mensaje.
                if ($dataProductos = $categoria->readClientePedidos()) {
                    // Se establece un color de relleno para los encabezados.
                    $pdf->SetFillColor(230,231,232);
                    // Se establece la fuente para los encabezados.
                    $pdf->SetFont('Helvetica', 'B', 11);
                    $pdf->SetTextColor(9,9,9);
                    // Se imprimen las celdas con los encabezados.
                    $pdf->Cell(41, 10, utf8_decode('Código'), 1, 0, 'C', 1);
                    $pdf->Cell(41, 10, utf8_decode('POS'), 1, 0, 'C', 1);
                    $pdf->Cell(41, 10, utf8_decode('OC'), 1, 0, 'C', 1);
                    $pdf->Cell(42, 10, utf8_decode('Registro'), 1, 0, 'C', 1);
                    $pdf->Cell(42, 10, utf8_decode('Entrega'), 1, 0, 'C', 1);
                    $pdf->Cell(42, 10, utf8_decode('Confirmación'), 1, 1, 'C', 1);
                    // Se establece la fuente para los datos de los clientes.
                    $pdf->SetFont('Helvetica', '', 11);
                    // Se recorren los registros fila por fila.
                    foreach ($dataProductos as $rowProducto) {
                        // Se van sumando el numero de registros para mostrarse en la tabla
                        $numero = $numero + 1;
                        $pdf->SetTextColor(9,9,9);
                        // Se imprimen las celdas con los datos de los clientes.
                        $pdf->Cell(41, 10, utf8_decode($rowProducto['codigo']), 1, 0, 'C');
                        $pdf->Cell(41, 10, utf8_decode($rowProducto['pos']), 1, 0, 'C');
                        $pdf->Cell(41, 10, utf8_decode($rowProducto['oc']), 1, 0, 'C');
                        $pdf->Cell(42, 10, $rowProducto['fecharegistro'], 1, 0, 'C');
                        $pdf->Cell(42, 10, $rowProducto['fechaentregada'], 1, 0, 'C');
                        $pdf->Cell(42, 10, $rowProducto['fechaconfirmadaenvio'], 1, 1, 'C');
                    }
                    // Se agrega un salto de línea para mostrar el contenido principal del documento.
                    $pdf->Ln(2);
                    $pdf->Cell(20);
                    $pdf->SetFont('Arial', 'B', 10);
                    // Imprimos el numero total de acciones realizado
                    $pdf->Cell(280, 10, utf8_decode('Número total de acciones: ') .$numero, 0, 1, 'C');
                } else {
                    // Colocamos el color del texto a mostrar
                    $pdf->SetTextColor(9,9,9);
                    $pdf->Cell(0, 10, utf8_decode('No hay acciones de este usuario'), 1, 1);
                }
            } else {
                // Colocamos el color del texto a mostrar
                $pdf->SetTextColor(9,9,9);
                $pdf->Cell(0, 10, utf8_decode('Usuario incorrecto o inexistente'), 1, 1);
            }
        }
    } else {
        // Colocamos el color del texto a mostrar
        $pdf->SetTextColor(9,9,9);
        $pdf->Cell(0, 10, utf8_decode('No hay categorías para mostrar'), 1, 1);
    }
} else {
    // Redirigimos a la pagina principal
    // header('location: ../../../views/dashboard/clientes.php');
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>