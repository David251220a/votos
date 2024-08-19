<?php

use App\Http\Controllers\acc_ResetController;
use App\Http\Controllers\acc_UsuarioController;
use App\Http\Controllers\ConsejalController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\IntendenteController;
use App\Http\Controllers\PadronController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/factura', function () {
    $factura = [
        "fecha" => "2024-07-17 17:25:26",
        "cdcAsociado" => "",
        "documentoAsociado" => [
            "remision" => false,
            "tipoDocumentoAsoc" => "1",
            "cdcAsociado" => "22",
            "establecimientoAsoc" => "011",
            "puntoAsoc" => "005",
            "numeroAsoc" => "0005761",
            "tipoDocuemntoIm" => "1",
            "fechaDocIm" => "2023-07-02",
            "timbradoAsoc" => "16183101"
        ],
        "punto" => "001",
        "establecimiento" => "001",
        "numero" => "0000060",
        "descripcion" => "2",
        "tipoDocumento" => 1,
        "tipoEmision" => 1,
        "tipoTransaccion" => 1,
        "receiptid" => "test60",
        "condicionPago" => 1,
        "moneda" => "PYG",
        "cambio" => 0,
        "cliente" => [
            "ruc" => "4873651-1",
            "nombre" => "SERGIO LOPEZ",
            "direccion" => "AVENIDA GEORG SCHAEFFLER",
            "numCasa" => 430,
            "diplomatico" => false
        ],
        "codigoSeguridadAleatorio" => "819250260",
        "items" => [
            [
                "descripcion" => "test product",
                "codigo" => "0011",
                "tipoIva" => "I.V.A. 10%",
                "unidadMedida" => 77.0,
                "ivaTasa" => 10,
                "ivaAfecta" => 1,
                "cantidad" => 1,
                "precioUnitario" => 1000.0,
                "precioTotal" => 1000.0,
                "baseGravItem" => 909,
                "liqIvaItem" => 91
            ]
        ],
        "pagos" => [
            [
                "name" => "cash",
                "tipoPago" => "1",
                "monto" => 1000.0
            ]
        ],
        "totalPago" => 1000,
        "totalRedondeo" => 0,
        "codigo" => 1222,
        "pais" => "PYG"
    ];

    // Retorna la estructura en formato JSON
    return response()->json($factura);
});

Route::group([
    'middleware' => 'auth',
], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('acceso/usuario', acc_UsuarioController::class);
    Route::resource('acceso/reset', acc_ResetController::class);
    
    Route::get('/consejal', [ConsejalController::class, 'index'])->name('consejal.index');
    Route::post('/consejal', [ConsejalController::class, 'store'])->name('consejal.store');

    Route::get('/intendente', [IntendenteController::class, 'index'])->name('intendente.index');
    Route::post('/intendente', [IntendenteController::class, 'store'])->name('intendente.store');

    Route::get('/padron', [PadronController::class, 'index'])->name('padron.index');
    Route::post('/padron', [PadronController::class, 'store'])->name('padron.store');
    Route::post('/referente/{searchtext}', [PadronController::class, 'referente'])->name('referente.post');
    Route::get('/padron/{codPadron}/pdf', [PadronController::class, 'pdf'])->name('padron.pdf');

    Route::get('/consulta/votos', [ConsultaController::class, 'votos'])->name('consulta.votos');
    Route::get('/consulta/local', [ConsultaController::class, 'local'])->name('consulta.local');
    Route::get('/consulta/lista', [ConsultaController::class, 'lista'])->name('consulta.lista');
    Route::get('/consulta/referente', [ConsultaController::class, 'referente'])->name('consulta.referente');

    Route::get('/mapa', [ConsultaController::class, 'mapa'])->name('consulta.mapa');
    Route::post('/mapa', [ConsultaController::class, 'mapa_store'])->name('consulta.mapa_store');

    
});


