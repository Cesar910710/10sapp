<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Flights;
use Illuminate\Http\Request;


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

//Route::get('flight', Flights::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
    return auth('sanctum')->user()->id;
});

Route::middleware('auth:sanctum')->get('/flight', Flights::class);
