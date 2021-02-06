<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;

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

Route::get('/home', function () {
    echo "This is Home Page";
});

Route::get('/about', function () {
    return view('about');
});    //})->middleware('check');

//Route::get('/contact','ContactController@index' );  Using in 6 and 7 Laravel


//Using in Laraval 8
Route::get('/contact', [ContactController::class, 'index'])->name('abc');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {


    //Using Eloquent ORM Read Users Data
    $users = User::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
