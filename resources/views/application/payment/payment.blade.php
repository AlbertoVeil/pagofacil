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
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div align="center">
        <div class="container">
            <div class="container shadow min-vh-100">
                <br>
                <br>
                @if(session()->has('success'))
                    <div class="row">
                        <div class="alert alert-success" style="width: 100%;" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Notificación: </strong>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="row">
                        <div class="alert alert-danger" style="width: 100%;" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Notificación: </strong>
                            {{ session()->get('error') }}
                        </div>
                    </div>
                @endif
                <br>
                <h3>Pagos</h3>
                <br>
                <br>
                <a href="/create-pay" class="btn btn-info bg-info text-white float-left">Crear pago</a>
                <br>
                <br>
                <table id="myTable" class="table table-hover">
                    <thead class="bg-info text-white">
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-center">Autorizado</th>
                        <th class="text-center">Transaccion</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Número de Tarjeta</th>
                        <th class="text-center">Tipo de tarjeta</th>
                        <th class="text-center">Monto</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td class="text-left">
                                <label>{{ $payment->id }}</label>
                            </td>
                            <td class="text-center">
                                @switch($payment->autorizado)
                                    @case(0)
                                        <label class="text-danger">No autorizado</label>
                                    @break
                                    @case(1)
                                        <label class="text-success">Autorizado</label>
                                    @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                <label>{{ $payment->transaccion }}</label>
                            </td>
                            <td class="text-center">
                                <label>{{ ucwords($payment->nombre, "")." ".ucwords($payment->apellidos, "") }}</label>
                            </td>
                            <td class="text-center">
                                <label>{{ $payment->numeroTarjeta }}</label>
                            </td>
                            <td class="text-center">
                                <label>{{ $payment->TipoTC }}</label>
                            </td>
                            <td class="text-center">
                                <label>{{ "$".$payment->monto }}</label>
                            </td>
                            <td class="text-left" style="width: 140px;">
                                <a href="{{ route('payment.show', $payment->id) }}" class="as-none">
                                    <button type="submit" class="btn btn-outline-info float-left">Ver</button>
                                </a>
                                <form action="{{ route('payment.delete', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger float-right">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <br>
            </div>
            <br>
            <br>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "order": [[ 0, "desc" ]],
                "pageLength": 20,
                "language": idioma_espanol
            });
        } );

        var idioma_espanol = {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     /*"Mostrar MENU"*/"",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "",
            "sInfoEmpty":      "",
            "sInfoFiltered":   "",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    </script>
</body>
</html>
