<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pagofacil</title>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="/img/favicon.ico" rel="icon" type="image/x-icon">
</head>
<body>
<div align="center">
    <div class="container">
        <div class="container shadow min-vh-100">
            <br>
            <br>
            <br>
            <h3>Pago {{ $payment->id }}</h3>
            <br>
            <br>
            <table class="table w-50">
                <tbody>
                <tr>
                    <td>Autorizado: {{ $payment->autorizado }}</td>
                </tr>
                <tr>
                    <td>Transacción: {{ $payment->transaccion }}</td>
                </tr>
                <tr>
                    <td>Nombre: {{ ucwords($payment->nombre) }}</td>
                </tr>
                <tr>
                    <td>Apellidos: {{ ucwords($payment->apellidos) }}</td>
                </tr>
                <tr>
                    <td>Número tarjeta: {{ $payment->numeroTarjeta }}</td>
                </tr>
                <tr>
                    <td>Tipo de tarjeta: {{ $payment->TipoTC }}</td>
                </tr>
                <tr>
                    <td>Monto: {{ "$".$payment->monto }}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <a href="/" class="btn btn-info text-white">Regresar a pagos</a>
        </div>
        <br>
        <br>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>
</html>
