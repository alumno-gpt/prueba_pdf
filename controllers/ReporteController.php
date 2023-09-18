<?php
namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Venta;
use Exception;

class ReporteController {
    public static function pdf(Router $router){
        $venta_fecha_inicio = $_GET['venta_fecha_inicio'];
        $venta_fecha_fin = $_GET['venta_fecha_fin'];

        // Obtener los datos de ventas utilizando la funcion buscar
        $ventas = VentaController::buscarAPI($venta_fecha_inicio, $venta_fecha_fin);

        // Crear un objeto mPDF
        $mpdf = new Mpdf([
            "orientation" => "P",
            "default_font_size" => 14,
            "default_font" => "arial",
            "format" => "Letter",
            "mode" => 'utf-8'
        ]);
        $mpdf->SetMargins(30, 35, 55);

        $html = $router->load('reporte/pdf', [
            'ventas' => $ventas
          
        ]);



        // Configurar encabezado y pie de página
        $htmlHeader = $router->load('reporte/header');
        $htmlFooter = $router->load('reporte/footer');
        $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->SetHTMLFooter($htmlFooter);

        // Agregar el contenido HTML al PDF
        $mpdf->WriteHTML($html);

        // Generar el PDF y mostrarlo o descargarlo
        $mpdf->Output();
    }

    public static function generarPDF(Router $router)
{
    $datos = json_decode(file_get_contents('php://input'));

    // Cargar una vista HTML con los datos
    $html = $router->load('reporte/pdf', [
        'ventas' => $datos 
    ]);

    $mpdf = new Mpdf();

    $htmlHeader = $router->load('reporte/header');
    $htmlFooter = $router->load('reporte/footer');
    $mpdf->SetHTMLHeader($htmlHeader);
    $mpdf->SetHTMLFooter($htmlFooter);

    // Agregar el contenido HTML al PDF
    $mpdf->WriteHTML($html);

    // Generar el PDF y mostrarlo o descargarlo
    $mpdf->Output();
}

 }