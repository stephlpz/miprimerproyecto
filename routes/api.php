<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hola', function (Request $request)
{
    return "hola";
});

Route::post('/getproducts', 'ControllerProduct@getProducts');

use App\Http\Controllers\ControllerProduct;
Route::get('/getproducts', [ControllerProduct::class, 'getProducts']);
Route::post('/saveProducts', [ControllerProduct::class, 'saveProducts']);

Route::post('/createProduct', [ControllerProduct::class,'createProduct']);
Route::put('updateProduct/{id}', [ControllerProduct::class,'updateProduct']);
Route::delete('deleteProduct/{id}',[ControllerProduct::class,'deleteProduct']);
