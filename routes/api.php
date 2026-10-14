<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DokterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/dokter', [DokterController::class, 'index']);
Route::post('/dokter', [DokterController::class, 'store']);
Route::put('/dokter/{id}', [DokterController::class, 'update']);
Route::delete('/dokter/{id}', [DokterController::class, 'destroy']);

//==========================================================POLI

Route::get('/poli', [PoliController::class, 'index']);
Route::post('/poli', [PoliController::class, 'store']);
Route::get('/poli/{id}', [PoliController::class, 'show']);
Route::put('/poli/{id}', [PoliController::class, 'update']);
Route::delete('/poli/{id}', [PoliController::class, 'destroy']);
//===========================================================JADWAL
Route::get('/jadwal', 'JadwalController@index');
Route::post('/jadwal', 'JadwalController@store');
Route::get('/jadwal/{id}', 'JadwalController@show');
Route::put('/jadwal/{id}', 'JadwalController@update');
Route::delete('/jadwal/{id}', 'JadwalController@destroy');


//=====================================================staff
Route::get('/staff', [StaffController::class, 'index']);
Route::post('/staff', [StaffController::class, 'store']);
Route::get('/staff/{id}', [StaffController::class, 'show']);
Route::put('/staff/{id}', [StaffController::class, 'update']);
Route::delete('/staff/{id}', [StaffController::class, 'destroy']);
//======================================================dokter

