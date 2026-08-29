<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'managers' => ManagerController::class,
    'tasks' => TaskController::class,
]);
