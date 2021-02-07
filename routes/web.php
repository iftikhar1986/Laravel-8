<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;  //Using Eloquent ORM Read Users Data
use Illuminate\Support\Facades\DB;  //Query Builder Read Users Data

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

//Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {


    //Using Eloquent ORM Read Users Data
   $users = User::all();


   //Query Builder Read Users Data
 //  $users = DB::table('users')->get();

    return view('dashboard',compact('users'));
})->name('dashboard');
