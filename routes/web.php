<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/test', function(){
  Mail::to('jonathanyont@gmail.com')->send(
    new JobPosted()
  );
  return 'Done';
});

Route::get('/', fn () => view('home'));
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class);
Route::get('/jobs', [JobController::class, 'index'])->middleware('auth');
Route::get('jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('jobs/{job}', [JobController::class, 'show'])->middleware('auth');
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

Route::get('/jobs', [JobController::class, 'index'])->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);