<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\VentaPaqueteController;
use App\Http\Controllers\VentaServicioController;


//DEFENSA INTERNA
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\VentaController;
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

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
});

//REPORTE
Route::get('reporte', [ReporteController::class, 'index']);
//  Route::get('reporte/searchmascota', [ReporteController::class, 'searchmascota']);
Route::get('reporte/buscagrupo/{id}', [ReporteController::class, 'buscagrupo']);

//LDEFENSA INTERNA
Route::get('lote', [LoteController::class, 'index']);
Route::post('lote/cargaloted', [LoteController::class, 'cargaLoteD']);

//CLIENTE +
Route::get('cliente', [ClienteController::class, 'index']);
Route::post('cliente', [ClienteController::class, 'store']);
Route::get('cliente/create', [ClienteController::class, 'create']);
Route::post('cliente/delete/{id}', [ClienteController::class, 'destroy']);

// Reserva
Route::get('reserva', [ReservaController::class, 'index']);
Route::post('reserva', [ReservaController::class, 'store']);
Route::get('reserva/create', [ReservaController::class, 'create']);

Route::get('reserva/{id}/reservaventa', [ReservaController::class, 'reservaVenta']);

Route::post('reserva/delete/{id}', [ReservaController::class, 'destroy']);

//venta
Route::get('venta', [VentaController::class, 'index']);
Route::post('venta', [VentaController::class, 'store']);
Route::get('venta/create', [VentaController::class, 'create']);
Route::post('venta/delete/{id}', [VentaController::class, 'destroy']);

//-------------------------------------------------------------------------------------------------------------------------

//PROPIEDAD
Route::get('propiedad', [PropiedadController::class, 'index']);
Route::get('propiedad/create', [PropiedadController::class, 'create']);
Route::post('propiedad', [PropiedadController::class, 'store']);
Route::get('propiedad/{id}/edit', [PropiedadController::class, 'edit']);
Route::post('propiedad/actualizar/{id}', [PropiedadController::class, 'update']);
Route::post('propiedad/delete/{id}', [PropiedadController::class, 'destroy']);

//PROPIETARIO
Route::get('propietario', [PropietarioController::class, 'index']);
Route::get('propietario/create', [PropietarioController::class, 'create']);
Route::post('propietario', [PropietarioController::class, 'store']);
Route::get('propietario/{id}/edit', [PropietarioController::class, 'edit']);
Route::post('propietario/actualizar/{id}', [PropietarioController::class, 'update']);
Route::post('propietario/delete/{id}', [PropietarioController::class, 'destroy']);

//VENDEDOR
Route::get('vendedor', [VendedorController::class, 'index']);
Route::get('vendedor/create', [VendedorController::class, 'create']);
Route::post('vendedor', [VendedorController::class, 'store']);
Route::get('vendedor/{id}/edit', [VendedorController::class, 'edit']);
Route::post('vendedor/actualizar/{id}', [VendedorController::class, 'update']);
Route::post('vendedor/delete/{id}', [VendedorController::class, 'destroy']);


//PAQUETE
Route::get('paquete', [PaqueteController::class, 'index']);
Route::get('paquete/create', [PaqueteController::class, 'create']);
Route::post('paquete', [PaqueteController::class, 'store']);
Route::get('paquete/{id}/edit', [PaqueteController::class, 'edit']);
Route::post('paquete/actualizar/{id}', [PaqueteController::class, 'update']);
Route::post('paquete/delete/{id}', [PaqueteController::class, 'destroy']);
Route::get('paquete/{id}/paqueteservicio', [PaqueteController::class, 'mostrarservicios']);

//VENTA PAQUETE
Route::get('ventapaquete', [VentaPaqueteController::class, 'index']);
Route::get('ventapaquete/create', [VentaPaqueteController::class, 'create']);
Route::post('ventapaquete', [VentaPaqueteController::class, 'store']);
Route::get('ventapaquete/{id}/edit', [VentaPaqueteController::class, 'edit']);
Route::post('ventapaquete/actualizar/{id}', [VentaPaqueteController::class, 'update']);
Route::post('ventapaquete/delete/{id}', [VentaPaqueteController::class, 'destroy']);
Route::get('tablapaquete', [VentaPaqueteController::class, 'getpaquete']);
Route::get('ventapaquete/{id}/order_pdf', [VentaPaqueteController::class, 'pdfgenerate']);

//VENTA SERVICIO
Route::get('ventaservicio', [VentaServicioController::class, 'index']);
Route::get('ventaservicio/create', [VentaServicioController::class, 'create']);
Route::post('ventaservicio', [VentaServicioController::class, 'store']);
Route::get('ventaservicio/{id}/edit', [VentaServicioController::class, 'edit']);
Route::post('ventaservicio/actualizar/{id}', [VentaServicioController::class, 'update']);
Route::post('ventaservicio/delete/{id}', [VentaServicioController::class, 'destroy']);





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

