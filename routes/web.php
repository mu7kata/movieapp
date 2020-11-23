<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Movie;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
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
    $movies = Movie::get();
    return view('movies', ['movies' => $movies]);
})->middleware('auth');

Route::post('/movie', function (Request $request) {
    $Validator = Validator::make($request->all(), 
    ['name=>requiredlmax:255',
    ]);

    if ($Validator->fails()) {
        return redirect('/')
            ->withinput()
            ->withErrors($Validator);
    }

    $movie = new Movie;
    $movie->title = $request->name;
    $movie->save();
    return redirect('/');
});

Route::delete('/movie/{movie}',function(Movie $movie){
$movie->delete();
return redirect('/');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
