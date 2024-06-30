<?php


use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//    return view('welcome');
// });


Route::get('/', [HomeController::class, 'landingpage']);

Route::get('/landing', [HomeController::class, 'landingpage']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/marketplace', [HomeController::class, 'marketplace']);
Route::get('/features', [HomeController::class,'features']);
Route::get('/lib', [HomeController::class,'lib']);
Route::post('/lib', [BookController::class,'store']);


Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/books/{id}/edit', [BookController::class, 'edit']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);
