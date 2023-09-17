<?php

namespace Controllers;
use Mpdf\Mpdf;
use MVC\Router;


class ReporteCOntroller{
    public static function pdf (Router $router){
        $mpdf = new Mpdf([
            "orientation" => "P",
            "defalt_font_size" => "14",
            "default_fon" => "arial",
            "format" => "Letter",
            "mode" => "utf-8"
        ]);
        $mpdf->SetMargins(45,45,20);
        $htmlHeader = $router->load('reporte/header');
        $htmlFooter = $router->load('reporte/footer');
        $html = $router->load('reporte/pdf');

        $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }
}