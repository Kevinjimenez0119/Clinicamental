<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('usuarios', 'UserController');

Route::resource('doctores', 'DoctorController');

Route::resource('historias', 'HistoriaController');

Route::resource('vps', 'VpsController');

Route::resource('vitals', 'VitalsController');

Route::resource('problemas', 'ProblemasController');

Route::resource('sintomas', 'SintomasController');

Route::resource('traslados', 'TrasladosController');

Route::resource('reportes', 'ReportesController');

Route::resource('pdf', 'PdfController');




