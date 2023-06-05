<?php

use App\Models\dataalternatif;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SAWController;
use App\Http\Controllers\DLabController;
use App\Http\Controllers\DSubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DPrakController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\DAslabController;
use App\Http\Controllers\DDosenController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DKriteriaController;
use App\Http\Controllers\DPenilaianController;
use App\Http\Controllers\DAlternatifcontroller;

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
})->name('home');

// route(redirect('login','dashboard'));

Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'register_action'])->name('register.action');
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'login_action'])->name('login.action');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route::middleware('guest')->group(function () {
//     Route::get('/login',[UserController::class, 'login'])->name('login');
//     Route::post('/login',[UserController::class, 'login_action'])->name('login.action');
// });

Route::prefix('dashboard')->group(
    function(){
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/datauser', UserController::class);
        Route::resource('/dataaslab', DAslabController::class);
        Route::resource('/datadosen', DDosenController::class);
        Route::resource('/datalab', DLabController::class);
        Route::resource('/dataprak', DPrakController::class);
        Route::resource('/dataalternatif', DAlternatifcontroller::class);
        Route::resource('/datakriteria', DKriteriaController::class);
        Route::resource('/datasub', DSubController::class);
        Route::resource('/datapenilaian', DPenilaianController::class);  
        Route::resource('/proses', SAWController::class); 
        Route::resource('/hasil', HasilController::class);
    }
);


Route::get('/reportaslab',[DAslabController::class, 'reportpdf']);
Route::get('/reportdosen',[DDosenController::class, 'reportpdf']);
Route::get('/reportpenilaian',[DPenilaianController::class, 'reportpdf']);
Route::get('/reportalternatif',[DAlternatifcontroller::class, 'reportpdf']);
Route::get('/reportkriteria',[DKriteriaController::class, 'reportpdf']);
Route::get('/reporthasil',[HasilController::class, 'reportpdf']);




