<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function getPayment()
    {
        $payments = Payment::all();

        return view('application.payment.payment', compact('payments'));
    }

    public function processingPayment(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'apellidos' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'celular' => 'required|numeric',
            'calleyNumero' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'colonia' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'cp' => 'required|numeric',
            'municipio' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'estado' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'pais' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ-]))+$/',
            'numeroTarjeta' => 'required|numeric',
            'mesExpiracion' => 'required|numeric',
            'anyoExpiracion' => 'required|numeric',
            'cvt' => 'required|numeric',
        ]);

        $response = Http::post('https://sandbox.pagofacil.tech//Wsrtransaccion/index/format/json?method=transaccion&data[nombre]='.$request['nombre'].'&data[apellidos]='.$request['apellidos'].'&data[numeroTarjeta]='.$request['numeroTarjeta'].'&data[cvt]='.$request['cvt'].'&data[cp]='.$request['cp'].'&data[mesExpiracion]='.$request['mesExpiracion'].'&data[anyoExpiracion]='.$request['anyoExpiracion'].'&data[monto]='.$request['data']['monto'].'&data[idSucursal]='.'560d73f2a001c6d40dd805ab9ccafdeabf37cec3'.'&data[idUsuario]='.'a2bce1f48cf7d11fae7d662d8bf7513355adf96f'.'&data[idServicio]=3'.'&data[email]='.$request['email'].'&data[telefono]='.$request['telefono'].'&data[celular]='.$request['celular'].'&data[calleyNumero]='.$request['calleyNumero'].'&data[colonia]='.$request['colonia'].'&data[municipio]='.$request['municipio'].'&data[estado]='.$request['estado'].'&data[pais]='.$request['pais'].'&data[idPedido]='.$request['data']['idPedido'].'&data[param1]='.$request['data']['param1'].'&data[param2]='.$request['data']['param2'].'&data[param3]='.$request['data']['param3'].'&data[param4]='.$request['data']['param4'].'&data[param5]='.$request['data']['param5'].'&data[httpUserAgent]='.'/'.'&data[ip]='.$request['data']['ip'].'');

        Payment::create([
            'autorizado' => $response['WebServices_Transacciones']['transaccion']['autorizado'],
            'transaccion' => $response['WebServices_Transacciones']['transaccion']['transaccion'],
            'nombre' => $response['WebServices_Transacciones']['transaccion']['data']['nombre'],
            'apellidos' => $response['WebServices_Transacciones']['transaccion']['data']['apellidos'],
            'numeroTarjeta' => "XXXX-XXXX-XXXX-".substr($request['numeroTarjeta'], -4, 4),
            'tipoTC' => $response['WebServices_Transacciones']['transaccion']['TipoTC'],
            'monto' => $response['WebServices_Transacciones']['transaccion']['data']['monto']
        ]);

        //return $response;

        return redirect()->route('payment');
    }

    public function endpointGetPayments()
    {
        $payments = Payment::all();

        return \Response::json($payments);
    }

    public function endpointGetPaymentTarjet($tarjet)
    {
        switch ($tarjet) {
            case 'visa':
                $payments = Payment::where('TipoTC', 'Visa')->get();
                return \Response::json($payments);
            break;

            case 'master':
                $payments = Payment::where('TipoTC', 'Master Card')->get();
                return \Response::json($payments);
            break;

            case 'american':
                $payments = Payment::where('TipoTC', 'American Express')->get();
                return \Response::json($payments);
            break;
        }
    }

    public function endpointGetPaymentAmount($amount)
    {
        $payments = Payment::where('monto', $amount)->get();
        return \Response::json($payments);
    }

    public function endpointGetPayment(Payment $payment)
    {
        return \Response::json($payment);
    }

    public function endpointDeletePayment(Payment $payment)
    {
        $payment->delete();

        return \Response::json($payment);
    }
}
