<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\Test2Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Middleware\Cors;

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
Route::options('/{dummy}',function(){
    $response = new Response();
    $response->header('Access-Control-Allow-Origin','*');
    return $response;
})->where('dummy','/.*/');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',[TestController::class,'index']);

Route::get('/test2',[Test2Controller::class,'index']);

Route::get('/data',function(){
    return[
        'data' => [
            1,
            'abc',
            3.00
        ],
    ];
})->middleware(Cors::class);