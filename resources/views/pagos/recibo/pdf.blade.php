<!DOCTYPE html>
<html>
<head>
    <title>Recibo de Pago</title>
    <link rel="stylesheet" type="text/css" href="{{ public_path('css/pdf.css') }}">
</head>
<body>
    <div class="invoice-container">
        <h1 class="invoice-title">Recibo de Pago</h1>
        <div class="customer-details">
            <p>Nombre del Usuario: {{ $userName }}</p>
        </div>
        <table class="invoice-table">
            <tr>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Haz adquirido una suscripción a Mis Primeros Auxilios</td>
                <td>1 mes</td>
                <td>33,728 COP</td>
                <td>$8.00 USD</td>
            </tr>
        </table>
        
        <p class="total">Total: ${{ $monto }}</p>
        <p class="notes">Gracias por su pago.</p>
        <p class="footer">© {{ date('Y') }} Tu Empresa</p>
    </div>
</body>
</html>
