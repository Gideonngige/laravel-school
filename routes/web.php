<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/school', function(){
    return view('school.home');

});
Route::get('/login',  [SchoolController::class, 'index']);
Route::post('/login',  [SchoolController::class, 'validate'])->name('form.submit');
Route::get('/portal',  [SchoolController::class, 'portal'])->name('portal');
Route::post('/admin', [SchoolController::class, 'admin'])->name('admin');
Route::get('/add', [SchoolController::class, 'addget']);
Route::post('/add', [SchoolController::class, 'add'])->name('add');
Route::get('/marks', [SchoolController::class, 'marksget']);
Route::post('/marks', [SchoolController::class, 'marks'])->name('marks');
Route::post('/pay', [SchoolController::class, 'payget']);
Route::post('/pay', [SchoolController::class, 'pay'])->name('pay');
Route::get('/message', [SchoolController::class, 'message'])->name('message');
