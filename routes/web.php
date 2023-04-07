<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HmoController;
use App\Http\Controllers\ClaimController;

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
    return view(strtolower('welcome'));
});

Route::resource(strtolower('hmos'), HmoController::class);
Route::resource(strtolower('claims'), ClaimController::class);
Route::get('/attachments/{attachment}', [ClaimsController::class, 'getAttachment'])->name('claims.attachments');
Route::get('claims/{id}/download', 'ClaimController@download')->name('claims.download');

