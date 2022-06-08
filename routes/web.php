<?php

use App\Common;
use App\Http\Controllers\Admin\xxxxController;
use App\Http\Controllers\Admin\AttributeController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth'],'prefix' => BASE_ADMIN_PATH,'as'=>BASE_ADMIN_PATH.'.'], function () {

    Route::resource('attributes',AttributeController::class);
});










require __DIR__.'/auth.php';

Route::resource('gene',App\Http\Controllers\gene\GeneController::class);
Route::get('geneDelete',[App\Http\Controllers\gene\GeneController::class,'delete']);
