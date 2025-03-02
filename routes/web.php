<?php

use App\Exports\ExportExcel;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SplreqController;

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
Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/index', [SplreqController::class, 'index'])->name('index');

Route::get('/addSPL', function () {
    // dd(auth()->user()); 
    if (auth()->user()->role == 0) {
        return view('Req.create');
    } else {
        abort(403, 'Unauthorized action.');
    }
})->middleware('auth');

Route::post('/addSPL', [SplreqController::class, 'store']);
Route::get('download', function () {
    return (new ExportExcel)->download('Laporan Surat Perintah Lembur.xlsx');
});
Route::delete('/spl/{id}', [SplreqController::class, 'destroy'])->name('spl.destroy');
Route::get('/spl/print/{id}', [SplreqController::class, 'print'])->name('spl.print');
Route::post('/spl/approve/{id}', [SplreqController::class, 'approve'])->name('spl.approve');
Route::post('/spl/reject/{id}', [SplreqController::class, 'reject'])->name('spl.reject');
Route::get('/spl/report', [SplreqController::class, 'report'])->name('spl.report');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
