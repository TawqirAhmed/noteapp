<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\NotesComponent;

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
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return redirect()->route('notes');
})->name('dashboard');


Route::group(['middleware' => 'auth'], function(){

    Route::get('/notes',NotesComponent::class)->name('notes');

});