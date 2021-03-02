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
            <h3>Crear pago</h3>
            <div class="collapsee" id="collapseExample">
                <form action="{{ route('payment.processing') }}" method="POST">
                    <div class="row">
                        <div align="center" class="col-md-6 p-5">
                            <label>Nombre del tarjetahabiente</label>
                            <br>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                            {!! $errors->first('nombre','<br><small class="text-danger">Error: El campo nombre es requerido y solo acepta letras y espacios</small><br>') !!}
                            <br>
                            <label>Apellidos del tarjetahabiente</label>
                            <br>
                            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
                            {!! $errors->first('apellidos','<br><small class="text-danger">Error: El campo apellidos es requerido y solo acepta letras y espacios</small><br>') !!}
                            <br>
                            <label>Correo del tarjetahabiente</label>
                            <br>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                            {!! $errors->first('email','<br><small class="text-danger">Error: El campo email es requerido y solo email</small><br>') !!}
                            <br>
                            <label>teléfono del tarjetahabiente</label>
                            <br>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
                            {!! $errors->first('telefono','<br><small class="text-danger">Error: El campo telefono es requerido y solo acepta numeros sin espacios</small><br>') !!}
                            <br>
                            <label>Número de celular del tarjetahabiente</label>
                            <br>
                            <input type="text" name="celular" class="form-control" value="{{ old('celular') }}" required>
                            {!! $errors->first('celular','<br><small class="text-danger">Error: El campo celular es requerido y solo acepta numeros sin espacios</small><br>') !!}
                            <br>
                        </div>
                        <div align="center" class="col-md-6 p-5">
                            <label>Calle y número del tarjetahabiente.</label>
                            <br>
                            <input type="text" name="calleyNumero" class="form-control" value="{{ old('calleyNumero') }}" required>
                            {!! $errors->first('calleyNumero','<br><small class="text-danger">Error: El campo calle es requerido y solo acepta letras y/o numeros</small><br>') !!}
                            <br>
                            <label>Colonia del tarjetahabiente.</label>
                            <br>
                            <input type="text" name="colonia" class="form-control" value="{{ old('colonia') }}" required>
                            {!! $errors->first('colonia','<br><small class="text-danger">Error: El campo colonia es requerido y solo acepta letras</small><br>') !!}
                            <br>
                            <label>Código postal del tarjetahabiente</label>
                            <br>
                            <input type="text" name="cp" class="form-control" value="{{ old('cp') }}" required>
                            {!! $errors->first('cp','<br><small class="text-danger">Error: El campo código postal es requerido y solo acepta números</small><br>') !!}
                            <br>
                            <label>Municipio del tarjetahabiente</label>
                            <br>
                            <input type="text" name="municipio" class="form-control" value="{{ old('municipio') }}" required>
                            {!! $errors->first('municipio','<br><small class="text-danger">Error: El campo municipio es requerido y solo acepta letras</small><br>') !!}
                            <br>
                            <label>Estado del tarjetahabiente</label>
                            <br>
                            <input type="text" name="estado" class="form-control" value="{{ old('estado') }}" required>
                            {!! $errors->first('estado','<br><small class="text-danger">Error: El campo estado es requerido y solo acepta letras</small><br>') !!}
                            <br>
                            <label>País del tarjetahabiente</label>
                            <br>
                            <input type="text" name="pais" class="form-control" value="{{ old('pais') }}" required>
                            {!! $errors->first('pais','<br><small class="text-danger">Error: El campo pais es requerido y solo acepta letras</small><br>') !!}
                            <input type="hidden" name="data[idPedido]">
                            <input type="hidden" name="data[param1]">
                            <input type="hidden" name="data[param2]">
                            <input type="hidden" name="data[param3]">
                            <input type="hidden" name="data[param4]">
                            <input type="hidden" name="data[param5]">
                            <input type="hidden" name="data[plan]">
                            <input type="hidden" name="data[mensualidades]">
                            <input type="hidden" name="data[ip]">
                        </div>
                        <div align="center" class="col-md-12 p-5">
                            <input type="text" name="numeroTarjeta" class="form-control float-left" style="width: 70%;" placeholder="Número de la tarjeta">
                            <input type="text" name="mesExpiracion" class="form-control float-left" style="width: 10%;" placeholder="MM">
                            <input type="text" name="anyoExpiracion" class="form-control float-left" style="width: 10%;" placeholder="YY">
                            <input type="text" name="cvt" class="form-control float-left" style="width: 10%;" placeholder="CVC">
                            {!! $errors->first('numeroTarjeta','<br><small class="text-danger">Error: El campo número de tarjeta es requerido y solo acepta números</small><br>') !!}
                            {!! $errors->first('mesExpiracion','<br><small class="text-danger">Error: El campo mes es requerido y solo acepta numeros</small><br>') !!}
                            {!! $errors->first('anyoExpiracion','<br><small class="text-danger">Error: El campo año es requerido y solo acepta numeros</small><br>') !!}
                            {!! $errors->first('cvt','<br><small class="text-danger">Error: El campo cvt es requerido y solo acepta numeros</small><br>') !!}
                            <br>
                        </div>
                    </div>
                    <br>
                    <br>
                    <label>El monto (MXP) del cargo a la tarjeta</label>
                    <br>
                    <input type="number" name="data[monto]" class="form-control w-25" min="10" required>
                    <br>
                    <input type="submit" class="btn btn-primary bg-info" value="Pagar">
                    <br>
                    <br>
                    <br>
                    <br>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>
</html>
