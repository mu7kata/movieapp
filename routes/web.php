<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Movie;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    $movies = Movie::all();
    return view('movies', ['movies' => $movies]);
});

Route::post('/movie', function (Request $request) {
    $Validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($Validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($Validator);
    }
    $movie = new Movie;

    $movie->title = $request->name;
    $movie->save();
    return redirect('/');
});

Route::delete('/movie/{movie}', function (Movie $movie) {
    $movie->delete();
    return redirect('/');
});
