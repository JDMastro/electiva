<?php

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

use App\Models\Contracts\StartupContract;

Route::get('/', function (StartupContract $startupContract) {
    $startups = $startupContract->with(['kindstartup', 'avg'])->paginate(21);

    return View('welcome')->with('startups',$startups);
    //return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
