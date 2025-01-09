<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PizzaController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/employees', EmployeeController::class);

Route::resource('admin/pizzas', PizzaController::class);
