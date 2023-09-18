<h1 style="text-align: center;">REPORTE DE VENTAS DE LA TIENDA DE CORNELIO</h1>
<table style="margin: 0 auto; border-collapse: collapse; width: 50%;">
    <thead>
        <tr>
            <th style="border: 1px solid black; text-align: center;">Fecha</th>
            <th style="border: 1px solid black; text-align: center;">Cantidad</th>
            <th style="border: 1px solid black; text-align: center;">Producto</th>
            <th style="border: 1px solid black; text-align: center;">Cliente</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ventas as $venta) : ?>
            <tr>
                <td style="border: 1px solid black; text-align: center;"><?= $venta->fecha ?></td>
                <td style="border: 1px solid black; text-align: center;"><?= $venta->cantidad ?></td>
                <td style="border: 1px solid black; text-align: center;"><?= $venta->producto ?></td>
                <td style="border: 1px solid black; text-align: center;"><?= $venta->cliente ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
